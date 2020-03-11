@extends('admin.layouts.admin')

@section('content')
  <h1>Check Out Form</h1>
  <hr>
<div class="container center">
@if(session('success'))
  <div class="alert alert-success text-center">
    {{session('success')}}
  </div>
@endif
</div>
{!! Form::open(['action' => ['BookingController@checkout', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data', 'target' => '_blank']) !!}

<div class="container">
    <div class="row">
        <div class="col-lg">
          <p class="lead text-left">Name: {{ $booking->client->fullNmae }}</p>
          <p class="lead text-left">Phone Number: {{ $booking->client->phoneNumber }}</p>
          <p class="lead text-left">Email: {{ $booking->client->emailAddress }}</p>
          <p class="lead text-left">Check In Date: {{ $booking->checkInDate }}<u></u></p>
          <p class="lead text-left">Check Out Date: {{ $booking->checkOutDate }}<u></u></p>
          <div class="well">

              @foreach ($roomsReserved as $key => $room)
                <hr>
                <ul style="list-style-type:none;">
              <li>Room Type: <strong style="text-transform: capitalize;">{{ $room->type }} Room - Regular Online Rate</strong> <h4 style="color:darkorange">&#8369;{{ number_format(($room->nightRate * $room->num_rooms) * $booking->numNights,2) }}</li>
                <li>Number Of Rooms: {{ $room->num_rooms }}</li>
                <li>Number Of Nights: {{ $booking->numNights }}</li>
                <li>Number Of Person: {{ $room->n_person }}</li>
                </ul>
                <hr>
              @endforeach

          </div>

        </div>
        <div class="col-lg">
          <p class="lead text-left">Room Cost: &#8369; {{ number_format($totalRoomPrice,2) }}</p>
          <p class="lead text-left">Tax & Other Fee(12.00%): &#8369; {{ number_format($totalRoomPrice * .12,2) }}</p>
          <p class="lead text-left">Total Reservation Cost: &#8369; {{ number_format($totalRoomPrice + ($totalRoomPrice * .12),2) }}</p>
          <p class="lead text-left">Damages: &#8369; <span style="color:green"><strong>{{ number_format($booking->payment->damages,2) }}</strong></span><b></b></p>
          <p class="lead text-left">Amenities Charge: &#8369; <span style="color:green"><strong> {{ number_format($booking->payment->amenitiesCharges,2) }}</strong></span><b></b></p>
          <p class="lead text-left">Service Asset(Pillow,Towel etc.): &#8369; <span style="color:green"><strong> {{ number_format($booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel ,2) }}</strong></span><b></b></p>
          <p class="lead text-left">Discount: &#8369; <span style="color:red"><strong>{{ number_format(($booking->payment->discount / 100) * (($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)) ,2) }} ({{$booking->payment->discount}}%) </strong></span><b></b></p>
          <p class="lead text-left">Total: &#8369; <span style="color:green"><strong> {{ number_format((($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)) - ($booking->payment->discount / 100) * (($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)),2) }}</strong></span><b></b></p>
          <p class="lead text-left">Downpayment:   &#8369; <span style="color:red"><strong>{{ number_format($booking->payment->ammountPaid,2) }}</strong></span><b></b></p>
          <p class="lead text-left">Balance: &#8369; <span style="color:red"><strong>{{ number_format(((($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)) - ($booking->payment->discount / 100) * (($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel))) - $booking->payment->ammountPaid,2) }}</strong></span><b></b></p>

          <p class="lead text-left">Payment Method: {{ $booking->payment->paymentMethod }}</b></p>

          <p class="lead text-left">Payment ID: <a href="/managepayments/{{ $booking->payment->paymentID }}">{{ $booking->payment->paymentID }}</a></b></p>

          <p class="lead text-left"><strong>Status: <span style="color:red;">{{ $booking->status }}</span></strong></b></p>
          @if ($booking->status == 'Canceled' or $booking->status == 'Rebooking Requested')
                <p class="lead text-left">Reason: {{ $booking->comment }}</b></p>
          @endif

        </div>
        <div class="col-lg">

          <div class="container forms">
              <div class="row"></br></br>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    {{ Form::label('total', 'Total: ',['style' => 'color:black']) }}
                    {{Form::text('total', number_format((($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)) - $booking->payment->discount,2), ['class' => 'form-control input-lg', 'placeholder' => 'Total', 'autofocus' , 'tabindex' => '1' ])}}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    {{ Form::label('balance', 'Balance: ',['style' => 'color:black']) }}
                     {{Form::text('balance', number_format((($totalRoomPrice + ($totalRoomPrice * .12)) + ($booking->payment->damages + $booking->payment->amenitiesCharges + $booking->payment->bedSheet + $booking->payment->pillow + $booking->payment->towel)) - $booking->payment->ammountPaid,2) , ['class' => 'form-control input-lg', 'placeholder' => 'Amenities Price', 'autofocus' , 'tabindex' => '2'])}}
                  </div>
                </div>
              </div>
              <div class="form-group">
                  {{ Form::hidden('_method','PUT') }}
                {{Form::submit('Check Out', ['class'=> 'btn btn-primary py-3 px-5', 'tabindex' => '4'])}}
              </div>
                  {!! Form::close() !!}
          </div>

        </div>
    </div>
</div>

@endsection
