<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RedirectResponse;
use App\booking;
use App\availableRoom;
use App\roomType;
use App\amenities;
use App\payment;
use App\roomReserved;
use App\Mail\ReservationDetail;
use Carbon\Carbon;
use App\Client;
use Session;
use DateTime;
class CheckReserveController extends Controller
{

  public function check(Request $request){
    $bookingNum = booking::where('bookingID', '=', $request->boookingNum)->first();

    if(!empty($request->input('boookingNum'))) {
      if (is_null($bookingNum)) {
        Session::flash('flash_message', 'Booking Number Does Not Exist');
        return redirect('checkreserve');
      }else {
        $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate,n_person
                              FROM room_reserveds
                              Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
                              where room_reserveds.bookingID = '$request->boookingNum'
                              GROUP BY category;");
        //code here
        $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('bookingID', '=', $request->boookingNum)->first();
        $current = Carbon::now('Asia/Shanghai');
        $title = 'Sea Urchin Hotel - Client Detail';
        $request->session()->put('boookingNum', $request->boookingNum);
        return view('detail')
        ->with('roomsReserved', $roomsReserved)
        ->with('bookingDetail', $bookingDetail)
        ->with('current', $current)
        ->with('title', $title);
        $request->session()->forget('key');
        session()->flash('previous-route', 'Route::current()->getName()');
      }
    }else {
      Session::flash('flash_message', 'Enter Your Booking Number');
      return redirect()->back();
    }
  }





public function getPayment(Request $request){
  $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('bookingID', '=', $request->session()->get('boookingNum'))->first();
  if(!empty($request->session()->get('boookingNum'))){
   //code here
   $title = 'Sea Urchin Hotel - Payment';
   return view('payment')
   ->with('bookingDetail', $bookingDetail)
   ->with('title', $title);
   }else {
     Session::flash('flash_message', 'Enter Your Booking Number');
     return redirect()->back();
   }

}


  public function send(Request $request){
        $this->validate($request, [
        'paymentMethod' => 'required',
        'bookingNumber' => 'required',
        'invoiceNumber' => 'required',
        'accountName' => 'required',
        'ammountPaid' => 'required',
        'datePaid' => 'required',
        'payment_image' => 'image|max:1999|required'
      ]);
      //file upload
      if ($request->hasFile('payment_image')) {
        //Get filename with the extesion
        $filenameWithExt = $request->file('payment_image')->getClientOriginalName();
        //Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('payment_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
        $path = $request->file('payment_image')->storeAs('public/payment_images',$fileNameToStore);
      }else {
        $fileNameToStore = 'noimage.jpg';
      }


      $datePaid = Carbon::createFromFormat('d/m/Y', $request->input('datePaid'));

      $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('bookingID', '=', $request->session()->get('boookingNum'))->first();
      DB::table('payments')
            ->where('paymentID', $bookingDetail->payment->paymentID)
            ->update(['paymentMethod' => $request->input('paymentMethod'),'invoiceNumber' => $request->input('invoiceNumber'), 'accountName' => $request->input('accountName'), 'ammountPaid' => $request->input('ammountPaid'), 'datePaid' => $datePaid, 'payment_image' => $fileNameToStore , 'comments' => $request->input('comment') ]);

      DB::table('bookings')
            ->where('bookingID',  $bookingDetail->bookingID)
            ->update(['paymentReceived' => '0','status' => 'Waiting For Approval']);
      //Eto ang nag send ng email sa client ng booking number at payment instruction
      //kaninong email isend? eh wala naman email address field. At pano malalaman kung sino nagbayad neto
      //  \Mail::to($client_info->emailAddress)->send(new ReservationDetail);
      $email = $bookingDetail->client->emailAddress;
      $name = $bookingDetail->client->fullNmae;
      //send mail
      \Mail::send('email.paymentApproval', ['name' => $name, ], function ($message) use ($email){

          $message->to($email)->subject('Thank you for your payment');
      });
      // Redirect
      $request->session()->flash('status', 'Check Your Email for Instructions');
      payment::query()->where('paymentID', $bookingDetail->payment->paymentID)->update(['unread' => 1]);
        $title = 'Sea Urchin Hotel - Payment';
       return redirect('/')
        ->with('title', $title)
        ->with('bookingDetail', $bookingDetail)
        ->with('status', 'Payment Sent. Please wait for approval of payment. Thank you');
      }


      public function cancel(Request $request)
      {
        $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('bookingID', '=', $request->session()->get('boookingNum'))->first();
        $current = Carbon::now('Asia/Shanghai')->toDateString();
        DB::table('bookings')
              ->where('bookingID',  $bookingDetail->bookingID)
              ->update(['status' => 'Canceled', 'comment' => $request->input('comment')]);
        $request->session()->flash('message.level', 'danger');
        Session::flash('flash_message', 'Booking Canceled');
        $title = 'Sea Urchin Hotel - Client Detail';
        return redirect('/');


      }

      public function rebook(Request $request){
        $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('bookingID', '=', $request->session()->get('boookingNum'))->first();
        $current = Carbon::now('Asia/Shanghai')->toDateString();
        $myDateTime = DateTime::createFromFormat('m/d/Y', $request->input('checkindate'));
        $myDateTime2 = DateTime::createFromFormat('m/d/Y', $request->input('checkoutdate'));
        DB::table('bookings')
              ->where('bookingID',  $bookingDetail->bookingID)
              ->update(['status' => 'Rebooking Requested', 'comment' => $request->input('reason'), 'reb_checkIn' => $myDateTime->format('Y-m-d'), 'reb_checkOut' => $myDateTime2->format('Y-m-d')]);

        $request->session()->flash('message.level', 'danger');
        Session::flash('flash_message', 'Please Wait for approval.');
        $title = 'Sea Urchin Hotel - Client Detail';
        return redirect('/');
      }


  }
