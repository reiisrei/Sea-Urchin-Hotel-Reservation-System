@extends('layouts.app')

@section('content')
  <style media="screen">
      @media (min-width: 1200px)
    .containers {
      width: 1470px;
    }

  .white-box {
    background-color: #fff;

    border-radius: 5px;
    margin-bottom:  30px;
  }
  .sidebar {
    max-width: 350px;
    h2 {
      background-color: #cdcdcd;
      padding: 5px;
      font-size: 22px;
    }
  }

  .sticky-panel {
    position: fixed;
    top: 50px;
  }
  .modal {
  z-index:1;
  display:none;
  padding-top:10px;
  position:fixed;
  left:0;
  top:0;
  width:100%;
  height:100%;
  overflow:auto;
  background-color:rgb(0,0,0);
  background-color:rgba(0,0,0,0.8)
  }

  .modal-content{
  margin: auto;
  display: block;
      position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }


  .modal-hover-opacity {
  opacity:1;
  filter:alpha(opacity=100);
  -webkit-backface-visibility:hidden
  }

  .modal-hover-opacity:hover {
  opacity:0.60;
  filter:alpha(opacity=60);
  -webkit-backface-visibility:hidden
  }


  .close {
  text-decoration:none;float:right;font-size:24px;font-weight:bold;color:white
  }
  .container1 {
  width:200px;
  display:inline-block;
  }
  .modal-content, #caption {

      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
  }


  @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)}
      to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
      from {transform:scale(0)}
      to {transform:scale(1)}
  }
  tr.bordered {
      border-bottom: 1px solid #000;
  }
    </style>

<div class="breadcrumb breadcrumb-1 pos-center">
    <h1>Booking Detail - {{ $bookingDetail->bookingID }}</h1>
</div>
</br></br>
<div class="pos-center marginb20">
    <h2>Booking Detail</h2>
    <img src="theme/img/shape.png">
</div>
<div class="container">
    <div class="col-lg-12 clearfix margint40 room-single-tab">
        <!-- Room Tab -->
        <div class="tab-style-1 ">
            <ul class="tabbed-area tab-style-nav clearfix">
                @if ($bookingDetail->status == 'unpaid' or $bookingDetail->status == 'Canceled' or $bookingDetail->status == 'Checked-In' or $bookingDetail->status == 'Checked-Out' or $bookingDetail->status == 'Rebooking Requested')
                <li class="active">
                    <h6><a href="#tab1s">Booking Summary</a></h6>
                </li>
                @else
                <li class="active">
                    <h6><a href="#tab1s">Booking Summary</a></h6>
                </li>
                <li class="">
                    <h6><a href="#tab2s">Cancellation</a></h6>
                </li>
                <li class="">
                    <h6><a href="#tab3s">Rebooking</a></h6>
                </li>
                @endif

            </ul>
            <div class="tab-content tab-style-content">
                <div class="tab-pane fade active in" id="tab1s">
                    <div class="col-lg-12 margint30">
                        <div class=" text-center ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="lead text-left">Name: {{ $bookingDetail->client->fullNmae }}</p>
                                        <p class="lead text-left">Phone Number: {{ $bookingDetail->client->phoneNumber }}</p>
                                        <p class="lead text-left">Email: {{ $bookingDetail->client->emailAddress }}</p>
                                        <p class="lead text-left">Please pay before: {{ date('m-d-Y', strtotime($bookingDetail->bookExpire)) }}</b></p>
                                        <p class="lead text-left">Payment Method: {{ $bookingDetail->payment->paymentMethod }}</b></p>
                                        @if ($bookingDetail->status == 'unpaid' and $bookingDetail->bookExpire <= $current)
                                          <p class="lead text-left"><strong>Status: <span style="color:red;">Booking Expired</span></strong></b></p>
                                          @else
                                          <p class="lead text-left"><strong>Status: <span style="color:red;">{{ $bookingDetail->status }}</span></strong></b></p>
                                        @endif

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="sidebar">
                                          <div class="white-box">
                                              <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">RESERVATION DETAILS</h4>
                                              <table width="100%">
                                                <tr>
                                                  <td class="pull-left">Arrival Date:</td>
                                                  <td style="text-align:right">{{ $bookingDetail->checkInDate }}</td>
                                                </tr>
                                                <tr>
                                                  <td class="pull-left">Departure Date:</td>
                                                  <td style="text-align:right">{{ $bookingDetail->checkOutDate }}</td>
                                                </tr>
                                                <tr>
                                                  <td class="pull-left">No. of Nights:</td>
                                                  <td style="text-align:right">{{$bookingDetail->numNights}} Night</td>
                                                </tr>
                                                <tr>
                                                  <td class="pull-left">Default Currency</td>
                                                  <td style="text-align:right">PHP</td>
                                                </tr>
                                                <tr>
                                                  <td class="pull-left">Current Currency</td>
                                                  <td style="text-align:right">PHP</td>
                                                </tr>
                                              </table>
                                          </div>
                                          <div class="white-box">
                                              <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">ROOMS DETAILS</h4>
                                              <div>
                                                <ul>
                                                @foreach ($roomsReserved as $key => $room)
                                                      <li class="pull-left"><strong>{{ $room->type }} Room - Regular Online Rate</strong> </li></br>
                                                      <li class="pull-right"><h4 style="color:darkorange">&#8369;{{ number_format(($room->nightRate * $room->num_rooms) * $bookingDetail->numNights,2) }}</h4></li>
                                                      <li class="pull-left">Number of night(s): {{ $bookingDetail->numNights }} </li></br>
                                                      <li class="pull-left">Number of person(s): {{ $room->n_person }}</li></br>
                                                      <li class="pull-left">Number of room(s): {{ $room->num_rooms }}</li><hr />
                                              @endforeach
                                              </ul>
                                              </div>
                                          </div>

                                          <div class="white-box">
                                              <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">RESERVATION SUMMARY</h4>
                                              <table width="100%">
                                                <tr class="bordered">
                                                  <td  class="pull-left"><h6>Room Cost:</h6></td>
                                                  <td><h6>{{ number_format($bookingDetail->totalAmount,2) }} </h6></td>
                                                </tr>
                                                <tr class="bordered">
                                                  <td class="pull-left"><h6>Tax & Other Fee(12.00%):</h6></td>
                                                  <td><h6> {{ number_format($bookingDetail->totalAmount * .12,2) }}</h6></td>
                                                </tr>
                                                <tr class="bordered">
                                                  <td class="pull-left"><h6>Total Reservation Cost: </h6></td>
                                                  <td><h6>{{ number_format($bookingDetail->totalAmount + ($bookingDetail->totalAmount * .12),2) }}</h6></td>
                                                </tr>
                                                <tr class="bordered">
                                                  <td class="pull-left"><h6>Total amount payable in the hotel:</h6></td>
                                                  <td><h6> {{ number_format(($bookingDetail->totalAmount + ($bookingDetail->totalAmount * .12)) / 2,2) }}</h6></td>
                                                </tr>
                                                <tr class="bordered">
                                                  <td class="pull-left"><h6><br>Payment upon reservation:</h6></td>
                                                  <td><h6 style="color:darkorange"><br>{{ number_format(($bookingDetail->totalAmount + ($bookingDetail->totalAmount * .12)) / 2,2) }}</h6></td>
                                                </tr>
                                              </table>
                                          </div>

                                        </div>
                                    </div>


                                    <div class="module module-multi module-series inset pull-left">
                                        <div class="module-title">
                                            <div class="title-inner">
                                                <span class="span-0">Important</span>
                                                <span class="span-1">&nbsp;Reminders</span>
                                            </div>
                                        </div>
                                        <div class="module-body">
                                            <div class="module-body-wrap">
                                                <div class="fragment-media  module-member">
                                                    <div class="media-body-wrap">
                                                        <div class="media-title">
                                                            Pay the total amount to avoid cancellation.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fragment-media  module-member">
                                                    <div class="media-body-wrap">
                                                        <div class="media-title">
                                                            Pay exactly the total amount,
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fragment-media  module-member">
                                                    <div class="media-body-wrap">
                                                        <div class="media-title">
                                                            excess will not be refunded.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="series-footer">
                                            &nbsp;
                                        </div>
                                    </div><br><br>
                                    @if (is_null($bookingDetail->payment->datePaid))
                                      @if ($bookingDetail->status == 'Rebooking Requested')
                                      @else
                                        @if ($bookingDetail->status == 'unpaid' and $bookingDetail->bookExpire <= $current)
                                          @else
                                            {!! Form::open(['url' => '/payment']) !!}
                                            {{Form::submit('Pay Now', ['class'=> 'btn btn-danger pull-left'])}}
                                            {!! Form::close() !!}
                                          @endif
                                      @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2s">
                    <div class="col-lg-4 margint30">
                        <div class="module module-multi module-series inset pull-left">
                            <div class="module-title">
                                <div class="title-inner">
                                    <span class="span-0">Important</span>
                                    <span class="span-1">&nbsp;Reminders</span>
                                </div>
                            </div>
                            <div class="module-body">
                                <div class="module-body-wrap">
                                    <div class="fragment-media  module-member">
                                        <div class="media-body-wrap">
                                            <div class="media-title">
                                                Pay the total amount to avoid cancellation.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fragment-media  module-member">
                                        <div class="media-body-wrap">
                                            <div class="media-title">
                                                Pay exactly the total amount,
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fragment-media  module-member">
                                        <div class="media-body-wrap">
                                            <div class="media-title">
                                                excess will not be refunded.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="series-footer">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 margint30 pull-right">
                        <h5><strong style="color:red">Cancellation Policy</strong></br></h5>
                        <p>Cancelling your reservation before { Date here } will result in no charge. Canceling your reservation after {Date here} or failing to show, will result in a charge of { $ } Failing to call or show before the check-out time
                            after the first night of a reservation will result in cancellation of the remainder of your reservation.</p></br>
                        <strong>Reason (Optional)</strong></br>

                        {!! Form::open(['url' => '/detail/cancel','enctype' => 'multipart/form-data']) !!}
                        {{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Your message here...', 'cols' => '30', 'rows' => '7', 'maxlength' => '2500'])}}
                        </br></br>{{Form::submit('Cancel Booking', ['class'=> 'btn btn-primary py-3 px-5','onclick' => 'return confirm("Canceling a booking is non refundable. Are you sure you want to continue?")'])}}
                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="tab-pane fade" id="tab3s">
                    <div class="col-lg-4 margint30">
                        <div class="module module-multi module-series inset pull-left">
                            <div class="module-title">
                                <div class="title-inner">
                                    <span class="span-0">Important</span>
                                    <span class="span-1">&nbsp;Reminders</span>
                                </div>
                            </div>
                            <div class="module-body">
                                <div class="module-body-wrap">
                                    <div class="fragment-media  module-member">
                                        <div class="media-body-wrap">
                                            <div class="media-title">
                                                Pay the total amount to avoid cancellation.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fragment-media  module-member">
                                        <div class="media-body-wrap">
                                            <div class="media-title">
                                                Pay exactly the total amount,
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fragment-media  module-member">
                                        <div class="media-body-wrap">
                                            <div class="media-title">
                                                excess will not be refunded.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="series-footer">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 margint30 pull-right">
                        <h5><strong style="color:red">Rebooking Policy</strong></h5>
                        <p>Rebooking your reservation before {{ $bookingDetail->checkInDate }} will result in no charge. Rebooking your reservation after {Date here} or failing to show, will result in a charge of { $ } Failing to call or show before the check-out time
                            after the first night of a reservation will result in Rebooking of the remainder of your reservation.</p>
                        {!! Form::open(['url' => '/detail/rebook']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('checkin', 'Check In Date: ',['style' => 'color:black']) }}
                                    {{ Form::text('checkindate', '' , ['id' => 'dpd1', 'placeholder' => 'Check In Date' , 'required', 'class' => 'form-control input-lg', 'tabindex' => '5','autocomplete' => 'off']) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('checkout', 'Check Out Date: ',['style' => 'color:black']) }}
                                    {{ Form::text('checkoutdate', '', ['id' => 'dpd2', 'placeholder' => 'Check Out Date' , 'required', 'class' => 'form-control input-lg', 'tabindex' => '6','autocomplete' => 'off']) }}
                                </div>
                            </div>
                        </div>

                        </br><strong>Reason (Optional)</strong></br>
                        {{Form::textarea('reason', '', ['class' => 'form-control', 'placeholder' => 'Your message here...', 'cols' => '30', 'rows' => '7', 'maxlength' => '2500'])}}
                      </br></br>{{Form::submit('Rebook', ['class'=> 'btn btn-danger float-left'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
