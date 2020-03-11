<?php

namespace App\Http\Controllers;
use App\roomType;
use App\booking;
use App\payment;
use App\Advertisment;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;
class PagesController extends Controller
{

    public function getHome(){
      $standard = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 1)->first(); //Get specific data in the database
      $quad = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 2)->first();
      $family = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 3)->first();
      $title = 'Sea Urchin Hotel - Home';
      return view('home')
      ->with('standard', $standard)
      ->with('quad', $quad)
      ->with('family', $family)
      ->with('title', $title);
    }

    public function getThetour(){
      $IslandHopping = Advertisment::select('title','intro','caption','cover_image','main_image','description')->where('id', 1)->first(); //Get specific data in the database
      $GovernorIsland = Advertisment::select('title','intro','caption','cover_image','main_image','description')->where('id', 2)->first();
      $MarcosIsland = Advertisment::select('title','intro','caption','cover_image','main_image','description')->where('id', 3)->first();
      $ZipLine = Advertisment::select('title','intro','caption','cover_image','main_image','description')->where('id', 4)->first();
      $Snorkeling = Advertisment::select('title','intro','caption','cover_image','main_image','description')->where('id', 5)->first();
      $BananaBoat = Advertisment::select('title','intro','caption','cover_image','main_image','description')->where('id', 6)->first();
      $title = 'Sea Urchin Hotel - The Hundred Island Tour';

      return view('thetour')
      ->with('IslandHopping', $IslandHopping)
      ->with('GovernorIsland', $GovernorIsland)
      ->with('MarcosIsland', $MarcosIsland)
      ->with('ZipLine', $ZipLine)
      ->with('Snorkeling', $Snorkeling)
      ->with('BananaBoat', $BananaBoat)
      ->with('title', $title);
    }

    public function getCheckreserve(){
      $title = 'Sea Urchin Hotel - Check Reservation';
      return view('checkreserve')->with('title', $title);
    }

    public function getPhoto(){
      $title = 'Sea Urchin Hotel - Photo Gallery';
      return view('photo')->with('title', $title);
    }

    public function getCalendar(){
      $title = 'Sea Urchin Hotel - Calendar';
      return view('fullCalendar')->with('title', $title);
    }

    public function getRequest(){
      $title = 'Sea Urchin Hotel - Booking Request';
      return view('request')->with('title', $title);
    }


    public function getTherooms(){
      $standard = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 1)->first(); //Get specific data in the database
      $quad = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 2)->first();
      $family = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 3)->first();
      $barkada = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 4)->first();
      $function = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 5)->first();

      $title = 'Sea Urchin Hotel - The Rooms';
      return view('therooms')
      ->with('standard', $standard)
      ->with('quad', $quad)
      ->with('family', $family)
      ->with('barkada', $barkada)
      ->with('function', $function)
      ->with('title', $title);
    }

    public function getContact(){
      $title = 'Sea Urchin Hotel - Contact';
      return view('contact')->with('title', $title);
    }


    //admin
    public function getDashboard(){
      $title = 'Sea Urchin Hotel - Dashboard';
      $message_count = Message::where('status', 1)->count();
      $booking_count = booking::where('unread', 1)->count();
      $payment_count = payment::whereNotNull('payment_image')->where('unread', 1)->count();
      return view('admin.dashboard')
      ->with('message_count', $message_count)
      ->with('booking_count', $booking_count)
      ->with('payment_count', $payment_count)
      ->with('title', $title);
    }
    public function getLogin(){
      $title = 'Sea Urchin Hotel - Login';
      return view('login')->with('title', $title);
    }

    public function getGallery(){
      $title = 'Admin - Gallery';
      return view('admin.gallery')->with('title', $title);
    }

    public function getRooms(){
      $title = 'Admin - Manage Rooms';
      return view('admin.rooms')->with('title', $title);
    }
















    public function getReports(){
      $bookings = booking::with('client','amenities', 'payment', 'roomType')->where('paymentReceived', '1')->whereNotNull('actualCheckIn')->whereNotNull('actualCheckOut')->where('total', '!=' , 0)->get();
      $totalAmount = 0;
      $clientCount =0;
      $title = 'Admin - Reports';
      return view('admin.reports')
      ->with('totalAmount', $totalAmount)
      ->with('clientCount', $clientCount)
      ->with('bookings', $bookings)
      ->with('title', $title);
    }
    public function printReport(Request $request){
      $from = date($request->startDate);
      $to = date($request->endDate);
      $bookings = booking::with('client','amenities', 'payment', 'roomType')->whereBetween('created_at', [$from, $to])->where('paymentReceived', '1')->whereNotNull('actualCheckIn')->whereNotNull('actualCheckOut')->where('total', '!=' , 0)->get();

      $totalAmount = booking::whereBetween('created_at', [$from, $to])->where('paymentReceived', '1')->where('paymentReceived', '1')->whereNotNull('actualCheckIn')->whereNotNull('actualCheckOut')->where('total', '!=' , 0)->sum('total');
      $clientCount = booking::whereBetween('created_at', [$from, $to])->where('paymentReceived', '1')->where('paymentReceived', '1')->whereNotNull('actualCheckIn')->whereNotNull('actualCheckOut')->where('total', '!=' , 0)->count('clientID');
      $title = 'Admin - Reports';
      return view('admin.printReport')
      ->with('bookings', $bookings)
      ->with('totalAmount', $totalAmount)
      ->with('clientCount', $clientCount)
      ->with('title', $title);
    }
















    public function getCreate(){
      $title = 'Admin - Create';
      return view('admin.create')->with('title', $title);
    }

    public function getStandard(){
      $title = 'Standard Room';
      return view('category.standard')->with('title', $title);
    }
    public function getBarkada(){
      $title = 'Barkada Room';
      return view('category.barkada')->with('title', $title);
    }
    public function getQuad(){
      $title = 'Quad Room';
      return view('category.quad')->with('title', $title);
    }
    public function getFamily(){
      $title = 'Family Room';
      return view('category.family')->with('title', $title);
    }
    public function getFunction(){
      $title = 'Function Hall';
      return view('category.function')->with('title', $title);
    }
    public function getAvailrooms(){
      $title = 'Sea Urchin Hotel - Available Rooms';
      return view('availrooms')->with('title', $title);
    }
    public function getCheckedIn(){
      $current = Carbon::now();
      $bookings = booking::with('client','amenities', 'payment', 'roomType')->where('status', 'Checked-In')->orderBy('created_at', 'desc')->get();
      $title = 'Sea Urchin Hotel - Check In';
      return view('admin.checkedin')
      ->with('bookings', $bookings)
      ->with('title', $title);
    }
    public function getCheckedOut(){
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      $bookings = booking::with('client','amenities', 'payment', 'roomType')->where('status', 'Checked-In')->where('checkOutDate','=', $current)->orderBy('created_at', 'desc')->get();
      $title = 'Sea Urchin Hotel - Check Out';
      return view('admin.checkedout')
      ->with('bookings', $bookings)
      ->with('current', $current)
      ->with('title', $title);
    }

    public function getnewBooking(){
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      $title = 'Sea Urchin Hotel - New Booking';
      return view('admin.newBooking')
      ->with('current', $current)
      ->with('title', $title);
    }

    public function getIncoming(){
      $current = Carbon::now('Asia/Shanghai')->toDateString();
      $bookings = booking::with('client','amenities', 'payment', 'roomType')->where('status', 'Payment approved')->where('checkInDate','=', $current)->orderBy('created_at', 'desc')->get();
      $title = 'Sea Urchin Hotel - Incoming Client';
      return view('admin.incomingClient')
      ->with('bookings', $bookings)
      ->with('title', $title);
    }
}
