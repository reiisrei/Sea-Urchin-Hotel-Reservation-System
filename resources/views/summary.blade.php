@extends('layouts.app')

@section('content')
<div class="breadcrumb breadcrumb-1 pos-center">
    <h1>BOOKING SUMMARY</h1>
</div>
</br></br>
<div class="pos-center marginb20">
    <h2>Summary</h2>
    <img src="theme/img/shape.png">
</div>
</br></br>
<div class="container">
    <div class=" text-center ">
        {!! Form::open(['url' => '/summary/nexts']) !!}
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="lead text-left">Name: {{ Session::get('firstName') }} {{ Session::get('lastName') }}</p>
                    <p class="lead text-left">Phone Number: {{ Session::get('phoneNumber') }}</p>
                    <p class="lead text-left">Email: {{ Session::get('emailAddress') }}</p>
                    <p class="lead text-left">Check In Date: <u>{{ Session::get('checkindate') }}</u></p>
                    <p class="lead text-left">Check Out Date: <u>{{ Session::get('checkoutdate') }}</u></p>
                    <p class="lead text-left">Number Of Rooms: {{ Session::get('n_rooms') }}</p>
                    <p class="lead text-left">Number Of Nights: {{ $n_nights }}</p>
                    <p class="lead text-left">Number Of Adults: {{ Session::get('n_adult') }}</p>
                    <p class="lead text-left">Number Of Children: {{ Session::get('n_children') }}</p>
                    <p class="lead text-left">Extra: {{ $a_type->title }}</p>


                </div>
                <div class="col-lg-4">
                    <p class="lead text-left">Room Type: {{ $type->title }} </p>
                    <p class="lead text-left">Room Price: &#8369; {{ number_format($price, 2) }}</p>
                    <p class="lead text-left">Amenities Price: &#8369; {{ number_format($a_type->amount, 2) }}</p>
                    <p class="lead text-left">Total: <b>&#8369; {{ number_format($totalprice, 2)  }}</b></p>
                    <p class="lead text-left">Please pay before: {{ $ReservationExpires->toFormattedDateString() }} </b></p>
                    <div class="form-group">
                        {{ Form::select('paymentMethod', array('1' => 'Bank Deposit', '2' => 'Paypal'), null, ['class' => 'form-control input-lg','placeholder' => 'Select Payment Method', 'required', 'tabindex' => '1']) }}
                    </div>
                    </br></br>
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
                    </br></br>{{Form::submit('Confirm', ['class'=> 'btn btn-primary py-3 px-5 float-left'])}}
                        {{-- <a href="{{ URL::previous()}}" class="btn btn-primary py-3 px-5"><i class="fa fa-backspace"></i>Go Back</a> --}}
                    {{-- Input::get('type') --}}
                </div>

                <div class="col-lg-4 col-sm-6 clearfix">
                    <div class="home-room-box clearfix">
                        <div class="room-image">
                            <img alt="Room Images" class="img-responsive" src="/storage/cover_images/{{ $type->cover_image }}">
                            <div class="home-room-details">
                                <h5><span class="pull-left">{{ isset($type->title) ? $type->title: "Standard Room"}}</span><strong class="pull-right">Good for {{ isset($type->capacity) ? $type->capacity: "2"}} Person</strong></h5>
                                <div class="pull-left">
                                    <ul>
                                        <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                                        <li title="Parking Space"><i class="fa fa-car"></i></li>
                                        <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                                        <li title="Televisions"><i class="fa fa-television"></i></li>
                                        <li title="Shower"><i class="fa fa-shower"></i></li>
                                        <li title="Breakfast"><i class="fa fa-spoon"></i></li>
                                    </ul>
                                </div>
                                <div class="pull-right room-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star inactive"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="room-details">
                            <p>{{ isset($type->description) ? $type->description : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          "}}</p>
                        </div>
                        <div class="room-bottom">
                            <div class="pull-left">
                                <h4>{{number_format($type->nightRate)}}<span class="room-bottom-time">/ Day</span></h4>
                            </div>
                            <div class="pull-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
