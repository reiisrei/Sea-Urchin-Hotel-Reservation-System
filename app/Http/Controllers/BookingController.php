<?php

namespace App\Http\Controllers;
use App\booking;
use App\reservation;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Redirect;
use DateTime;
use App\client;
use App\payment;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bookings = booking::with('client','amenities', 'payment', 'roomType')->orderBy('created_at', 'desc')->get();
      $title = 'Admin - Bookings';
      $current = Carbon::now('Asia/Shanghai');
      booking::query()->update(['unread' => 0]);
      return view('admin.bookings')
      ->with('bookings', $bookings)
      ->with('current', $current)
      ->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }
//
//     public function Submit(Request $request)
//     {
//     $this->validate($request, [
//         'firsName' => 'required|min:3',
//         'lastName' => 'required|min:3',
//         'phoneNumber' => 'required',
//         'emailAddress' => 'required',
//       ]);
//
//     $current = Carbon::now('Asia/Shanghai');
//
//     $myDateTime = DateTime::createFromFormat('m-d-Y', $request->checkIn);
//     $myDateTime2 = DateTime::createFromFormat('m-d-Y', $request->checkOut);
//     // $checkInDate_1 = DateTime::createFromFormat('Y-d-m', $request->arrivalDate);
//     // $checkOutDate_1 = date("Y-d-m", strtotime($_POST['checkOut']));
//     $client_info = new client();
//
//     $client_info->firstName = $request->firsName;
//     $client_info->lastName = $request->lastName;
//     $client_info->fullNmae = $request->firsName." ".$request->lastName;
//     $client_info->phoneNumber = $request->phoneNumber;
//     $client_info->emailAddress = $request->emailAddress;
//     $client_info->save();
//
//         $checkinDate = date_create($_POST['checkIn']);
//           $checkoutDate = date_create($_POST['checkOut']);
//           $interval = date_diff($checkinDate,$checkoutDate);
//           $n_nights = $interval->format('%a');
//           $request->session()->put('n_nights', $n_nights);
// $totalCost
//         $booking_info = new booking();
//           //foreing keys:
//           //clientID
//           $booking_info->clientID = client::orderBy('clientID', 'desc')->first()->clientID;
//
//           //paymentID
//           $booking_info->paymentID = payment::orderBy('paymentID', 'desc')->first()->paymentID;
//
//           $booking_info->checkInDate = $request->checkIn;
//           $booking_info->checkOutDate = $request->checkOut;
//           $booking_info->roomsCount = $request->n_standard+$request->n_quad+$request->n_family+$request->n_barkada;
//           $booking_info->reservationDate = $current;
//           $booking_info->expiryDate = $current->addDays(2);
//           $booking_info->paymentReceived = 0;
//           $booking_info->unread = 1;
//           $booking_info->status = 'unpaid';
//
//           $booking_info->numNights = $request->numNights;
//           $booking_info->bookExpire = $current->addDays(7);
//           $booking_info->totalAmount = $request->totalCost;
//           $booking_info->save();
//
//
//
//     if ($request->n_standard != 0 ) {
//       //roomTypeID
//       for ($i=0; $i < $request->n_standard; $i++) {
//         $roomReserved = new roomReserved();
//         $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
//         $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+1)->where('category', 'standard')->get()->first()->roomID;
//         $roomReserved->n_person = $request->n_personStandard;
//         $roomReserved->save();
//       }
//     }
//     if ($request->n_quad != 0 ) {
//       //roomTypeID
//       for ($i=0; $i < $request->n_quad; $i++) {
//         $roomReserved = new roomReserved();
//         $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
//         $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+8)->where('category', 'quad')->get()->first()->roomID;
//         $roomReserved->n_person = $request->n_personQuad;
//         $roomReserved->save();
//       }
//     }
//     if ($request->n_family != 0) {
//       //roomTypeID
//       for ($i=0; $i < $request->n_family; $i++) {
//         $roomReserved = new roomReserved();
//         $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
//         $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+16)->where('category', 'family')->get()->first()->roomID;
//         $roomReserved->n_person = $request->n_personFamily;
//         $roomReserved->save();
//       }
//     }
//     if ($request->n_barkada != 0) {
//       //roomTypeID
//       for ($i=0; $i < $request->n_barkada; $i++) {
//         $roomReserved = new roomReserved();
//         $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
//         $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+23)->where('category', 'barkada')->get()->first()->roomID;
//         $roomReserved->n_person = $request->n_personBarkada;
//         $roomReserved->save();
//       }
//     }
//
//
//
//
//     $name = $request->firstName." ".$request->lastName;
//     $email = $request->emailAddress;
//     $bookingNum = booking::orderBy('bookingID', 'desc')->first()->bookingID;
//     $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate
//                           FROM room_reserveds
//                           Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
//                           where room_reserveds.bookingID = '$bookingNum'
//                           GROUP BY category;");
//
//
//     $totalRoomPrice = booking::orderBy('bookingID', 'desc')->first()->totalAmount;
//
//     $numNight = booking::orderBy('bookingID', 'desc')->first()->numNights;
//     $checkInDate = booking::orderBy('bookingID', 'desc')->first()->checkInDate;;
//     $checkOutDate = booking::orderBy('bookingID', 'desc')->first()->checkOutDate;
//     $roomCount = booking::orderBy('bookingID', 'desc')->first()->roomsCount;
//     $bookingExpire = booking::orderBy('bookingID', 'desc')->first()->bookExpire;
//     $paymentMethod = booking::with('payment')->orderBy('bookingID', 'desc')->first()->paymentMethod;
//
//
//     \Mail::send('email.reservationDetail', ['name' => $name, 'bookingNum' => $bookingNum, 'roomsReserved' => $roomsReserved, 'checkInDate' => $checkInDate, 'checkOutDate' => $checkOutDate, 'roomCount' => $roomCount, 'bookingExpire' => $bookingExpire, 'paymentMethod' => $paymentMethod, 'totalRoomPrice' => $totalRoomPrice, 'numNight' => $numNight], function ($message) use ($email,$roomsReserved){
//
//         $message->to($email)->subject('Reservation Details');
//     });
//
//     // Redirect sa homepage pag ka click ng "Confirm Button"
//     $title = 'Sea Urchin Hotel - Booking Request Form';
//     $request->session()->flash('status', 'Check Your Email for Instructions');
//     return redirect('/dashboard')
//     ->with('title', $title)
//     ->with('email', 'Check Your Email for Instructions');
//
//     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bookingID)
    {
        $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);

        $title = 'Admin - Bookings';
        $totalRoomPrice = $booking->totalAmount;

        $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate,n_person
                              FROM room_reserveds
                              Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
                              where room_reserveds.bookingID = '$bookingID'
                              GROUP BY category;");
      $totalAdditional = $booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel;

        $damages = $booking->payment->damages;
        $percent = $booking->payment->discount;
        $current = Carbon::now('Asia/Shanghai');  
        return view('admin.bookings.show')
        ->with('booking', $booking)
        ->with('totalRoomPrice', $totalRoomPrice)
        ->with('roomsReserved', $roomsReserved)
        ->with('totalAdditional', $totalAdditional)
        ->with('current', $current)
        ->with('damages', $damages)
        ->with('title', $title);
                $request->session()->forget('key');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);

      $title = 'Admin - Bookings';
      $totalRoomPrice = $booking->totalAmount;

      $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate,n_person
                            FROM room_reserveds
                            Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
                            where room_reserveds.bookingID = '$bookingID'
                            GROUP BY category;");
    $totalAdditional = $booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel;

      $damages = $booking->payment->damages;
      $percent = $booking->payment->discount;

        return view('admin.bookings.checkout')
        ->with('booking', $booking)
        ->with('totalRoomPrice', $totalRoomPrice)
        ->with('roomsReserved', $roomsReserved)
        ->with('totalAdditional', $totalAdditional)
        ->with('damages', $damages)
        ->with('title', $title);
                $request->session()->forget('key');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      DB::table('bookings')
            ->where('bookingID',  $booking->bookingID)
            ->update(['paymentReceived' => '1','status' => 'Checked-In', 'actualCheckIn' => $current]);
      $title = 'Admin - Bookings';
      $request->session()->flash('message.level', 'success');
      Session::flash('flash_message', 'Client Checked-In');
      return redirect()->back()
      ->with('booking', $booking)
      ->with('title', $title);

    }

    public function checkout(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate,n_person
                            FROM room_reserveds
                            Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
                            where room_reserveds.bookingID = '$bookingID'
                            GROUP BY category;");

      $totalRoomPrice = $booking->totalAmount;
      $numNight = $booking->numNights;
      $totalAdditional = $booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel;
      $bookingNum = $booking->bookingID;
      $percent = $booking->payment->discount;
      $discount = ($percent / 100) * ($booking->totalAmount + $booking->payment->damages);
      $email = $booking->client->emailAddress;
      $name = $booking->client->fullNmae;
      \Mail::send('email.officialReceipt', ['name' => $name, 'roomsReserved' => $roomsReserved, 'bookingNum' => $bookingNum, 'roomsReserved' => $roomsReserved, 'booking' => $booking, 'numNight' => $numNight, 'totalRoomPrice' => $totalRoomPrice, 'discount' => $discount, 'totalAdditional' => $totalAdditional], function ($message) use ($email){

          $message->to($email)->subject('Offical Receipt');
      });
      $total = (($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)) - $booking->payment->discount;
      DB::table('bookings')
            ->where('bookingID',  $booking->bookingID)
            ->update(['paymentReceived' => '1','status' => 'Checked-Out', 'actualCheckOut' => $current , 'Total' => $total]);
      $title = 'Official Receipt';
      $request->session()->flash('message.level', 'success');
      Session::flash('flash_message', 'Client Checked-Out');


      return view('admin.receipt.receipt')
      ->with('booking', $booking)
      ->with('bookingNum', $bookingNum)
      ->with('roomsReserved', $roomsReserved)
      ->with('totalRoomPrice', $totalRoomPrice)
      ->with('numNight', $numNight)
      ->with('totalAdditional', $totalAdditional)
      ->with('discount', $discount)
      ->with('title', $title);

    }

    public function approve(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      DB::table('bookings')
            ->where('bookingID',  $booking->bookingID)
            ->update(['paymentReceived' => '1','status' => 'Booking Approved']);

      $title = 'Admin - Bookings';
      $request->session()->flash('message.level', 'success');
      Session::flash('flash_message', 'Booking Approved');
      return redirect()->back()
      ->with('booking', $booking)
      ->with('title', $title);

    }

    public function cancel(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      $current = Carbon::now();
      DB::table('bookings')
            ->where('bookingID',  $booking->bookingID)
            ->update(['status' => 'Canceled']);
      $title = 'Admin - Bookings';
      $request->session()->flash('message.level', 'danger');
      Session::flash('flash_message', 'Booking Canceled');
      return redirect()->back()
      ->with('booking', $booking)
      ->with('title', $title);

    }
    public function updatePrice(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      if (!is_null($request->input('damages'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['damages' => $request->input('damages')]);
      }
      if (!is_null($request->input('amenitiesCharges'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['amenitiesCharges' => $request->input('amenitiesCharges')]);
      }
      if (!is_null($request->input('bedSheet'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['bedSheet' => $request->input('bedSheet') * 50]);
      }
      if (!is_null($request->input('pillow'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['pillow' => $request->input('pillow') * 50]);
      }
      if (!is_null($request->input('towel'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['towel' => $request->input('towel') * 50]);
      }

      if (!is_null($request->input('discount'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['discount' => $request->input('discount') ]);
      }
      if (!is_null($request->input('downPayment'))) {
        DB::table('payments')
              ->where('paymentID',  $booking->paymentID)
              ->update(['ammountPaid' => $request->input('downPayment') ]);
      }
      $title = 'Admin - Bookings';
      $request->session()->flash('message.level', 'danger');
      Session::flash('flash_message', 'Booking Canceled');
      return redirect()->back()
      ->with('booking', $booking)
      ->with('title', $title);

    }

    public function getReceipt(Request $request, $bookingID)
    {
      $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);

      return view('admin.receipt.receipt')
      ->with('bookingDetail', $bookingDetail)
      ->with('title', $title);

    }

    public function approveBooking(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      DB::table('payments')
            ->where('paymentID',  $booking->paymentID)
            ->update(['ammountPaid' => $request->input('downpayment')]);


      $current = Carbon::now('Asia/Shanghai')->toDateString();
      DB::table('bookings')
            ->where('bookingID',  $booking->bookingID)
            ->update(['paymentReceived' => '1','status' => 'Checked-In', 'actualCheckIn' => $current]);
      $request->session()->flash('message.level', 'success');

      $title = 'Admin - Bookings';
      return redirect()->back()
      ->with('booking', $booking)
      ->with('title', $title);

    }

    public function approveRebooking(Request $request, $bookingID)
    {
      $booking = booking::with('client','amenities', 'payment', 'roomType')->find($bookingID);
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      DB::table('bookings')
            ->where('bookingID',  $booking->bookingID)
            ->update(['checkInDate' => $booking->reb_checkIn,'checkOutDate' => $booking->reb_checkOut,'status' => 'Rebooking Approved']);

      $title = 'Admin - Bookings';
      $request->session()->flash('message.level', 'success');
      Session::flash('flash_message', 'Rebooking Approved');
      return redirect()->back()
      ->with('booking', $booking)
      ->with('title', $title);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
