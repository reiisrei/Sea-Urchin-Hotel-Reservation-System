<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RedirectResponse;
use App\client;
use App\roomAmenity;
use App\reservation;
use App\booking;
use App\availableRoom;
use App\roomType;
use App\amenities;
use App\payment;
use App\roomReserved;
use App\Mail\ReservationDetail;
use Carbon\Carbon;
use Session;
use Redirect;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ReservationController extends Controller
{

  CONST IS_AVAILABLE_ROOM = 1 ;

  private $_room;

  /**
   * ReservationController constructor.
   */
  public function __construct()
  {
      $this->_room = new availableRoom();

  }

    /**
     * @param Request $request
     * @return mixed
     */



    public function checkAvailable(Request $request){
      $this->validate($request, [
          'start_date' => 'required',
          'end_date' => 'required',
        ]);
        $checkInDate = date("m-d-Y", strtotime($request->start_date));
        $checkOutDate = date("m-d-Y", strtotime($request->end_date));

        $request->session()->put('checkInDate', $checkInDate);
        $request->session()->put('checkOutDate', $checkOutDate);

        $checkInDate_1 = date("'Y-m-d'", strtotime($request->start_date));
        $checkOutDate_1 = date("'Y-m-d'", strtotime($request->end_date));



    $availableRooms = DB::select("SELECT
          category, COUNT(*) as count
          FROM available_rooms
          WHERE NOT EXISTS (
              -- room is booked on the requested dates (...not)
              SELECT 1
              FROM room_reserveds
              JOIN bookings ON room_reserveds.bookingID = bookings.bookingID
              WHERE room_reserveds.roomID = available_rooms.roomID
              AND $checkOutDate_1 >= checkInDate AND checkOutDate >= $checkInDate_1
              -- AND expiryDate > $checkOutDate_1
          )
          GROUP BY category");


        if(isset($availableRooms) && !empty($availableRooms)) {

        }else {
          Session::flash('error', 'There are no room available at that date.');
          return redirect('/');
         }
         $standardPrice = roomType::where('roomTypeID',1)->select('nightRate')->first()->nightRate;
         $quadPrice = roomType::where('roomTypeID',2)->select('nightRate')->first()->nightRate;
         $familyPrice = roomType::where('roomTypeID',3)->select('nightRate')->first()->nightRate;
         $barkadaPrice = roomType::where('roomTypeID',4)->select('nightRate')->first()->nightRate;
        /* end */
        $checkinDate = date_create($_POST['start_date']);
        $checkoutDate = date_create($_POST['end_date']);
        $interval = date_diff($checkinDate,$checkoutDate);

        $n_nights = $interval->format('%a');
        $request->session()->put('n_nights', $n_nights);
        ///
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;

        return view('availrooms')
        ->with('standardPrice',$standardPrice)
        ->with('quadPrice',$quadPrice)
        ->with('familyPrice',$familyPrice)
        ->with('barkadaPrice',$barkadaPrice)
        ->with('checkInDate',$checkInDate)
        ->with('checkOutDate',$checkOutDate)
        ->with('checkIn',$checkIn)
        ->with('checkOut',$checkOut)
        ->with('n_nights', $n_nights)
        ->with('availableRooms', $availableRooms);

    }

    public function checkNext(Request $request){
        //         $rules = array(
        //           'standard' => 'required_without_all:quad,family,barkada',
        //           'quad' => 'required_without_all:standard,family,barkada',
        //           'family' => 'required_without_all:quad,standard,barkada',
        //           'barkada' => 'required_without_all:standard,quad,family',
        //   );
        //   $validator = Validator::make(Input::all(), $rules);
        //
        // //   $this->validate($request, [
        // //   'standard' => 'required_without_all:quad,family,barkada',
        // //   'quad' => 'required_without_all:standard,family,barkada',
        // //   'family' => 'required_without_all:quad,standard,barkada',
        // //   'barkada' => 'required_without_all:standard,quad,family',
        // // ]);

          $request->session()->put('standard', $request->standard);
          $request->session()->put('n_standard', $request->n_standard);
          $request->session()->put('n_personStandard', $request->n_personStandard);
          $request->session()->put('totalStandard', $request->totalStandard);
          //get the put
          $n_standard = $request->session()->get('n_standard');
          $standard = $request->session()->get('standard');
          $n_personStandard = $request->session()->get('n_personStandard');
          $totalStandard = $request->session()->get('totalStandard');
          //end


          $request->session()->put('n_quad', $request->n_quad);
          $request->session()->put('n_personQuad', $request->n_personQuad);
          $request->session()->put('totalQuad', $request->totalQuad);
          $request->session()->put('quad', $request->quad);
          //get the put
          $n_quad = $request->session()->get('n_quad');
          $n_personQuad = $request->session()->get('n_personQuad');
          $totalQuad = $request->session()->get('totalQuad');
          $quad = $request->session()->get('quad');
          //end


          $request->session()->put('n_personFamily', $request->n_personFamily);
          $request->session()->put('n_family', $request->n_family);
          $request->session()->put('totalFamily', $request->totalFamily);
          $request->session()->put('family', $request->family);
          //get the put
          $n_family = $request->session()->get('n_family');
          $n_personFamily = $request->session()->get('n_personFamily');
          $totalFamily = $request->session()->get('totalFamily');
          $family = $request->session()->get('family');
          //end


          $request->session()->put('n_personBarkada', $request->n_personBarkada);
          $request->session()->put('n_barkada', $request->n_barkada);
          $request->session()->put('totalBarkada', $request->totalBarkada);
          $request->session()->put('barkada', $request->barkada);
          //get the put
          $n_barkada = $request->session()->get('n_barkada');
          $n_personBarkada = $request->session()->get('n_personBarkada');
          $totalBarkada = $request->session()->get('totalBarkada');
          $barkada = $request->session()->get('barkada');
          //end


          $request->session()->put('checkInDate', $request->checkInDate);
          $request->session()->put('checkOutDate', $request->checkOutDate);


          $n_nights = $request->session()->get('n_nights');
          return redirect('request')
          ->with('n_standard', $n_standard)
          ->with('n_quad', $n_quad)
          ->with('n_family', $n_family)
          ->with('n_barkada', $n_barkada);


    }

    //pag click ng confirm button, isave sa database at send ng email
    public function nexts(Request $request){
      $this->validate($request, [
          'firstName' => 'required|min:5|max:20',
          'lastName' => 'required|min:5|max:20',
          'phoneNumber' => 'required|min:11|max:11',
          'emailAddress' => 'required',
        ]);
      $current = Carbon::now('Asia/Shanghai');

      $myDateTime = DateTime::createFromFormat('m-d-Y', $request->checkInDate);
      $myDateTime2 = DateTime::createFromFormat('m-d-Y', $request->checkOutDate);
      // $checkInDate_1 = DateTime::createFromFormat('Y-d-m', $request->arrivalDate);
      // $checkOutDate_1 = date("Y-d-m", strtotime($_POST['checkOut']));
      $client_info = new client();

      $client_info->firstName = $request->firstName;
      $client_info->lastName = $request->lastName;
      $client_info->fullNmae = $request->firstName." ".$request->lastName;
      $client_info->phoneNumber = $request->phoneNumber;
      $client_info->emailAddress = $request->emailAddress;
      $client_info->save();


      if ($request->paymentMethod == "1") {
        $method = "Bank";
      }else {
        $method = "Paypal";
      }
      $payment_info = new payment();
      $payment_info->clientID = client::orderBy('clientID', 'desc')->first()->clientID;
      $payment_info->paymentMethod = $method;
      $payment_info->save();


      $booking_info = new booking();
            //foreing keys:
            //clientID
            $booking_info->clientID = client::orderBy('clientID', 'desc')->first()->clientID;

            //paymentID
            $booking_info->paymentID = payment::orderBy('paymentID', 'desc')->first()->paymentID;

            $booking_info->checkInDate = $myDateTime->format('Y-m-d');
            $booking_info->checkOutDate = $myDateTime2->format('Y-m-d');
            $booking_info->roomsCount = $request->n_standard+$request->n_quad+$request->n_family+$request->n_barkada;
            $booking_info->reservationDate = $current;
            $booking_info->expiryDate = $current->addDays(2);
            $booking_info->paymentReceived = 0;
            $booking_info->unread = 1;
            $booking_info->comment = $request->message;
            $booking_info->status = 'unpaid';

            $booking_info->numNights = $request->n_nights;
            $booking_info->bookExpire = $current->addDays(7);
            $booking_info->totalAmount = $request->totalCost;
            $booking_info->save();



      if ($request->n_standard != 0 ) {
        //roomTypeID
        for ($i=0; $i < $request->n_standard; $i++) {
          $roomReserved = new roomReserved();
          $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
          $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+1)->where('category', 'standard')->get()->first()->roomID;
          $roomReserved->n_person = $request->n_personStandard;
          $roomReserved->save();
        }
      }
      if ($request->n_quad != 0 ) {
        //roomTypeID
        for ($i=0; $i < $request->n_quad; $i++) {
          $roomReserved = new roomReserved();
          $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
          $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+8)->where('category', 'quad')->get()->first()->roomID;
          $roomReserved->n_person = $request->n_personQuad;
          $roomReserved->save();
        }
      }
      if ($request->n_family != 0) {
        //roomTypeID
        for ($i=0; $i < $request->n_family; $i++) {
          $roomReserved = new roomReserved();
          $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
          $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+16)->where('category', 'family')->get()->first()->roomID;
          $roomReserved->n_person = $request->n_personFamily;
          $roomReserved->save();
        }
      }
      if ($request->n_barkada != 0) {
        //roomTypeID
        for ($i=0; $i < $request->n_barkada; $i++) {
          $roomReserved = new roomReserved();
          $roomReserved->bookingID = booking::orderBy('bookingID', 'desc')->first()->bookingID;
          $roomReserved->roomID = availableRoom::select('roomID')->where('roomDoorNum', $i+23)->where('category', 'barkada')->get()->first()->roomID;
          $roomReserved->n_person = $request->n_personBarkada;
          $roomReserved->save();
        }
      }




      $name = $request->firstName." ".$request->lastName;
      $email = $request->emailAddress;
      $bookingNum = booking::orderBy('bookingID', 'desc')->first()->bookingID;
      $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate
                            FROM room_reserveds
                            Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
                            where room_reserveds.bookingID = '$bookingNum'
                            GROUP BY category;");


      $totalRoomPrice = booking::orderBy('bookingID', 'desc')->first()->totalAmount;

      $numNight = booking::orderBy('bookingID', 'desc')->first()->numNights;
      $checkInDate = booking::orderBy('bookingID', 'desc')->first()->checkInDate;;
      $checkOutDate = booking::orderBy('bookingID', 'desc')->first()->checkOutDate;
      $roomCount = booking::orderBy('bookingID', 'desc')->first()->roomsCount;
      $bookingExpire = booking::orderBy('bookingID', 'desc')->first()->bookExpire;
      $paymentMethod = booking::with('payment')->orderBy('bookingID', 'desc')->first()->paymentMethod;


      \Mail::send('email.reservationDetail', ['name' => $name, 'bookingNum' => $bookingNum, 'roomsReserved' => $roomsReserved, 'checkInDate' => $checkInDate, 'checkOutDate' => $checkOutDate, 'roomCount' => $roomCount, 'bookingExpire' => $bookingExpire, 'paymentMethod' => $paymentMethod, 'totalRoomPrice' => $totalRoomPrice, 'numNight' => $numNight], function ($message) use ($email,$roomsReserved){

          $message->to($email)->subject('Reservation Details');
      });

      if($method == "Paypal") {
        return redirect('https://www.paypal.com/ph/signin');
      }else {
        // Redirect sa homepage pag ka click ng "Confirm Button"
        $title = 'Sea Urchin Hotel - Booking Request Form';
        $request->session()->flash('status', 'Check Your Email for Instructions');
        return redirect('/')
        ->with('title', $title)
        ->with('email', 'Check Your Email for Instructions');
      }

      }
}
