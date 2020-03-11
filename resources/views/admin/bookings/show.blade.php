@extends('admin.layouts.admin')

@section('content')
<a href="/bookings" class="btn btn-primary"><i class="fa fa-backspace"></i> Back</a>
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
            @if ($booking->status == 'unpaid' and $booking->bookExpire <= $current)
                <p class="lead text-left"><strong>Status: <span style="color:red;">Booking Expired</span></strong></b></p>
              @else
            <p class="lead text-left"><strong>Status: <span style="color:red;">{{ $booking->status }}</span></strong></b></p>
            @endif

            @if ($booking->status == 'Canceled' or $booking->status == 'Rebooking Requested')
              @if ($booking->status == 'Rebooking Requested')
                  <p class="lead text-left">Rebook Check-In date: {{ $booking->reb_checkIn }}</b></p>
                  <p class="lead text-left">Rebook Check-Out date: {{ $booking->reb_checkOut }}</b></p>
                  {!! Form::open(['action' => ['BookingController@approveRebooking', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                  {{ Form::hidden('_method','PUT') }}
                  {{Form::submit('Approve Rebooking', ['class'=> 'btn btn-primary'])}}
                  {!! Form::close() !!}
              @endif
                  <p class="lead text-left">Reason: {{ $booking->comment }}</b></p>
            @endif

        </div>
        <div class="col-lg">
        @if ($booking->status == 'Checked-In')
          {!! Form::open(['action' => ['BookingController@updatePrice', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
            <h3>Additional Charge</h3>
            <div class="container forms">
                <div class="row"></br></br>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                      {{ Form::label('bedsheet', 'Bed sheet: ',['style' => 'color:black']) }}
                      {{Form::number('bedSheet', '', ['class' => 'form-control input-lg', 'placeholder' => 'Bed sheet', 'autofocus' , 'tabindex' => '1' ])}}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                      {{ Form::label('pillow', 'Pillow: ',['style' => 'color:black']) }}
                       {{Form::number('pillow', '', ['class' => 'form-control input-lg', 'placeholder' => 'Pillow', 'autofocus' , 'tabindex' => '2'])}}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                      {{ Form::label('towel', 'Towel: ',['style' => 'color:black']) }}
                       {{Form::number('towel', '', ['class' => 'form-control input-lg', 'placeholder' => 'Towel', 'autofocus' , 'tabindex' => '3'])}}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('damages', 'Damages: ',['style' => 'color:black']) }}
                  {{Form::number('damages', '', ['class' => 'form-control input-lg', 'placeholder' => 'Damages', 'autofocus' , 'tabindex' => '4'])}}</br>
                </div>
                <div class="form-group">
                  {{ Form::label('discount', 'Discount: ',['style' => 'color:black']) }}
                  {{Form::number('discount', '', ['class' => 'form-control input-lg', 'placeholder' => 'Discount', 'autofocus' , 'tabindex' => '5'])}}</br>
                </div>
                <div class="form-group">
                  {{ Form::label('amenitiesCharges', 'Amenities Charges: ',['style' => 'color:black']) }}
                  {{Form::number('amenitiesCharges', '', ['class' => 'form-control input-lg', 'placeholder' => 'Amenities Charges', 'autofocus' , 'tabindex' => '5'])}}</br>
                </div>
                <div class="form-group">
                  {{ Form::label('downPayment', 'Downpayment: ',['style' => 'color:black']) }}
                  {{Form::number('downPayment', '', ['class' => 'form-control input-lg', 'placeholder' => 'Downpayment', 'autofocus' , 'tabindex' => '5'])}}</br>
                </div>
                <div class="form-group">
                    {{ Form::hidden('_method','PUT') }}
                  {{Form::submit('Update', ['class'=> 'btn btn-primary py-3 px-5', 'tabindex' => '6'])}}
                </div>
                    {!! Form::close() !!}
            </div>
        @endif
        @if ($booking->status == 'Booking Approved')
          {!! Form::open(['action' => ['BookingController@approveBooking', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
            <h3>Payment</h3>
            <div class="container forms">
                <div class="form-group">
                  {{ Form::label('downpayment', 'Downpayment: ',['style' => 'color:black']) }}
                  {{Form::text('downpayment', '', ['class' => 'form-control input-lg', 'placeholder' => 'Downpayment', 'autofocus' , 'tabindex' => '4'])}}</br>
                </div>
                <div class="form-group">
                    {{ Form::hidden('_method','PUT') }}
                  {{Form::submit('Check-In client', ['class'=> 'btn btn-primary py-3 px-5', 'tabindex' => '6'])}}
                </div>
                    {!! Form::close() !!}
            </div>
        @endif

      </div>


    </div>
</div>
@endsection
