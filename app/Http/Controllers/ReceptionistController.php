<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use Carbon\Carbon;
use DB;
use Session;
class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function CheckIn(Request $request)
     {
       $bookingNum = booking::where('bookingID', '=', $request->boookingNum)->first();

       $current = Carbon::now('Asia/Shanghai')->toDateString();
       DB::table('bookings')
             ->where('bookingID', '=', $request->boookingNum)
             ->update(['paymentReceived' => '1','status' => 'Checked-In', 'actualCheckIn' => $current]);
       $title = 'Admin - Bookings';
       $request->session()->flash('message.level', 'success');
       Session::flash('flash_message', 'Client Checked-In');
       return redirect()->back()
       ->with('bookingNum', $bookingNum)
       ->with('title', $title);


     }
     // public function CheckOut($bookingID)
     // {
     //   // $bookingNum = booking::where('bookingID', '=', $request->boookingNum)->first();
     //   $booking = booking::with('client','amenities', 'payment', 'roomType')->with('bookingID', '=', $request->boookingNum)->find($bookingID);
     //
     //   $title = 'Admin - Bookings';
     //   $totalRoomPrice = $booking->totalAmount;
     //
     //   $roomsReserved = DB::select("SELECT available_rooms.category as type,count(category) as num_rooms, nightRate,n_person
     //                         FROM room_reserveds
     //                         Inner join available_rooms on room_reserveds.roomID=available_rooms.roomID
     //                         where room_reserveds.bookingID = '$bookingID'
     //                         GROUP BY category;");
     // $totalAdditional = $booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel;
     //
     //   $damages = $booking->payment->damages;
     //   $percent = $booking->payment->discount;
     //   $discount = ($percent / 100) * $totalRoomPrice;
     //     return view('admin.bookings.checkout')
     //     ->with('booking', $booking)
     //     ->with('totalRoomPrice', $totalRoomPrice)
     //     ->with('roomsReserved', $roomsReserved)
     //     ->with('totalAdditional', $totalAdditional)
     //     ->with('discount', $discount)
     //     ->with('damages', $damages)
     //     ->with('title', $title);
     //             $request->session()->forget('key');
     //
     // }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
    public function show($id)
    {
        //
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
      $discount = ($percent / 100) * $totalRoomPrice;
        return view('admin.bookings.checkout')
        ->with('booking', $booking)
        ->with('totalRoomPrice', $totalRoomPrice)
        ->with('roomsReserved', $roomsReserved)
        ->with('totalAdditional', $totalAdditional)
        ->with('discount', $discount)
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
    public function update(Request $request, $id)
    {
        //
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
