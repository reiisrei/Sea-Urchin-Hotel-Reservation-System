<?php

namespace App\Http\Controllers;
use App\payment;
use App\booking;
use App\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
class ManageBillingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $payments = Payment::whereNotNull('payment_image')->where('status','noStatus')->orderBy('created_at', 'desc')->paginate(5);
      $title = 'Admin - Manage Payments';
      payment::query()->update(['unread' => 0]);
      return view('admin.managepayments')
      ->with('payments', $payments)
      ->with('title', $title);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($paymentID)
    {
      $payment = payment::with('client')->find($paymentID);
      $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('paymentID', '=', $payment->paymentID)->first();
      $reservationDetail = reservation::with('booking')->where('bookingID', $bookingDetail->bookingID)->first();
      $title = 'Admin - Manage Payments';
      return view('admin.managepayment.show')
      ->with('payment', $payment)
      ->with('reservationDetail', $reservationDetail)
      ->with('bookingDetail', $bookingDetail)
      ->with('title', $title);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paymentID)
    {
      $payment = payment::with('client')->find($paymentID);
      $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('paymentID', '=', $payment->paymentID)->first();
      DB::table('bookings')
            ->where('bookingID',  $bookingDetail->bookingID)
            ->update(['paymentReceived' => '1','status' => 'Payment Approved']);
      DB::table('payments')
            ->where('paymentID', '=', $payment->paymentID)
            ->update(['status' => 'Approved']);
            $checkinDate = date_create($bookingDetail->checkInDate);
            $checkoutDate = date_create($bookingDetail->checkOutDate);
            $interval = date_diff($checkinDate,$checkoutDate);
            $n_nights = $interval->format('%a');
            //send mail
            $email = $bookingDetail->client->emailAddress;
            $name = $bookingDetail->client->fullNmae;
            $amountPaid = $payment->ammountPaid;
            $datePaid = $payment->datePaid;
            $paymentMethod = $payment->paymentMethod;
            $accountName = $payment->accountName;
            //
            $roomPrice = $bookingDetail->nightRate;

            $totalRoomPrice = $bookingDetail->totalAmount;

            \Mail::send('email.approvedPayment', ['name' => $name], function ($message) use ($email){

                $message->to($email)->subject('Payment Approved');
            });

            \Mail::send('email.downpaymentReceipt', ['name' => $name, 'amountPaid' => $amountPaid, 'datePaid' => $datePaid, 'paymentMethod' => $paymentMethod, 'accountName' => $accountName, 'totalRoomPrice' => $totalRoomPrice ], function ($message) use ($email){

                $message->to($email)->subject('Downpayment Receipt');
            });

            $request->session()->flash('message.level', 'success');
            Session::flash('flash_message', 'Booking Approved');
            return redirect('managepayments')
            ->with('payment', $payment);
    }

    public function deny(Request $request, $paymentID)
    {
      $payment = payment::with('client')->find($paymentID);
      $bookingDetail = booking::with('client','amenities', 'payment', 'roomType')->where('paymentID', '=', $payment->paymentID)->first();
      DB::table('reservations')
            ->where('bookingID',  $bookingDetail->bookingID)
            ->update(['paymentReceived' => '0','status' => 'Payment Denied']);
            Session::flash('flash_message', 'Payment Denied');
            $request->session()->flash('message.level', 'danger');
      DB::table('payments')
            ->where('paymentID', '=', $payment->paymentID)
            ->update(['status' => 'Denied']);
            //send mail
            $email = $bookingDetail->client->emailAddress;
            $name = $bookingDetail->client->fullNmae;
            \Mail::send('email.deniedPayment', ['name' => $name, ], function ($message) use ($email){

                $message->to($email)->subject('Payment Denied');
            });

            return redirect('managepayments')
            ->with('payment', $payment);
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
