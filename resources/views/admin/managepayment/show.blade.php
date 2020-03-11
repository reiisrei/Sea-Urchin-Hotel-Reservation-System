@extends('admin.layouts.admin')

@section('content')
  <a href="/managepayments" class="btn btn-primary"><i class="fa fa-backspace"></i> Back</a>
  <div class="container">
      <div class="row">
          <div class="col-lg">
            <p class="lead text-left">Payment ID: <strong>{{ $payment->paymentID }}</strong></p>
            <p class="lead text-left">Booking ID: <strong><a href="/bookings/{{ $bookingDetail->bookingID}}">{{ $bookingDetail->bookingID }}</a></strong></p>
            <p class="lead text-left">Payment Method: <strong>{{ $payment->paymentMethod }}</strong></p>
            <p class="lead text-left">Invoice Number: <strong>{{ $payment->invoiceNumber }}</strong></p>
          </div>
          <div class="col-lg">
            <p class="lead text-left">Account Name: <strong>{{ $payment->accountName }}</strong></p>
            <p class="lead text-left">Amount Paid: <strong>{{ $payment->ammountPaid }}</strong></p>
            <p class="lead text-left">Date Paid: <strong>{{ $payment->datePaid }}</strong></p>
            <p class="lead text-left">Status: <strong>{{ $bookingDetail->status }}</strong></p>
          </div>
          <div class="col-lg">
            <p class="lead text-left">Payment Image:</p>
            <a href="/storage/payment_images/{{ $payment->payment_image }}" target="_blank"> <img class=" img-fluid border border-primary" src="/storage/payment_images/{{ $payment->payment_image }}" alt="" ></a>

          </div>
      </div>
  </div>
@endsection
