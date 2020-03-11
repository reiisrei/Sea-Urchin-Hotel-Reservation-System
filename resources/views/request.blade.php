@extends('layouts.app')
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
@section('content')
<script type="text/javascript">
function alphaOnly(event) {
var key = event.keyCode;
return ((key >= 65 && key <= 90) || key == 8);
};
</script>
<div class="breadcrumb breadcrumb-1 pos-center">

</div>
</br></br>
<div class="pos-center marginb20">
    <h2>Guest Detail</h2>
    <img src="theme/img/shape.png">
</div>
</br></br>
<div class="container">
    <div class=" text-center ">
        @if(session('message'))
        <div class="alert alert-warning">
            {{session('message')}}
        </div>
        @endif
        @if(session('email'))
        <div class="alert alert-success">
            {{session('email')}}
        </div>
        @endif
        @if(!empty($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach
            @endif
            {!! Form::open(['url' => '/summary/nexts']) !!}
            <input type="hidden" name="checkInDate" value="{{ Session::get('checkInDate') }}">
            <input type="hidden" name="checkOutDate" value="{{ Session::get('checkOutDate') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            {{ Form::label('firstName', 'First Name: ',['style' => 'color:black']) }}
                            {{-- {{Form::text('firstName', '', ['class' => 'form-control input-lg', 'placeholder' => 'First Name', 'autofocus' , 'tabindex' => '1' , 'required'])}} --}}
                            <input type="text" placeholder="First Name" maxlength="20" minlength="5" name="firstName" class="form-control input-lg" required onkeydown="return alphaOnly(event);" />
                            {{ Form::label('lastName', 'Last Name: ',['style' => 'color:black']) }}
                            {{-- {{Form::text('lastName', '', ['class' => 'form-control input-lg', 'placeholder' => 'Last Name', 'autofocus' , 'tabindex' => '2' , 'required'])}} --}}
                            <input type="text" placeholder="Last Name" maxlength="20" minlength="5" name="lastName" class="form-control input-lg" required onkeydown="return alphaOnly(event);" />
                            {{ Form::label('phoneNumber', 'Phone Number: ',['style' => 'color:black' , 'required']) }}
                            <input type="number" placeholder="Phone Number" name="phoneNumber" class="form-control input-lg" required maxlength="11" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" />
                            {{-- {{Form::number('phoneNumber', '', ['class' => 'form-control input-lg', 'placeholder' => 'Phone Number', 'autofocus' , 'tabindex' => '3'  , 'required', 'onkeydown' => 'javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))' /])}} --}}
                            {{ Form::label('emailAddress', 'Email address: ',['style' => 'color:black']) }}
                            {{Form::email('emailAddress', '', ['class' => 'form-control input-lg', 'placeholder' => 'Email Address', 'autofocus' , 'tabindex' => '4' , 'required'])}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            {{ Form::label('message', 'Please state your arrival time and other request/s: ',['style' => 'color:black']) }}
                            {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Your message here...', 'cols' => '30', 'rows' => '7', 'maxlength' => '2500'])}}
                            {{ Form::label('paymentMethod', 'Payment Method: ',['style' => 'color:black']) }}
                            {{Form::select('paymentMethod',['1' =>'Bank', '2' => 'Paypal'], null, ['class' => 'form-control input-lg', 'autofocus' , 'tabindex' => '5'])}}
                            <br/><input type="submit" value="BOOK NOW" style="width:310px;background-color:#5d0b0b">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                          <div class="sidebar">
                            <div class="white-box">
                                <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">RESERVATION DETAILS</h4>
                                <table width="100%">
                                  <tr>
                                    <td>Arrival Date:</td>
                                    <td style="text-align:right"><input type="text" name="arrivalDate" style="width: 90px;border:none; border-color: transparent" value="{{ Session::get('checkInDate') }}" readonly></td>
                                  </tr>
                                  <tr>
                                    <td>Departure Date:</td>
                                    <td style="text-align:right"><input type="text" name="departureDate" style="width: 90px;border:none; border-color: transparent" value="{{ Session::get('checkOutDate') }}" readonly></td>
                                  </tr>
                                  <tr>
                                    <td>No. of Nights:</td>
                                    <td style="text-align:right"><input type="text" name="n_nights" style="width: 10px;border:none; border-color: transparent" value="{{ Session::get('n_nights') }}" readonly> Night</td>
                                  </tr>
                                  <tr>
                                    <td>Default Currency</td>
                                    <td style="text-align:right">PHP</td>
                                  </tr>
                                  <tr>
                                    <td>Current Currency</td>
                                    <td style="text-align:right">PHP</td>
                                  </tr>
                                </table>
                            </div>
                            <div class="white-box">
                                <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">ROOMS DETAILS</h4>
                                @if ( !empty(Session::get('n_standard')))
                                  <div>
                                      <ul>
                                        <li class="pull-left"><strong>Standard Room - Regular Online Rate</strong></li></br>
                                        <li class="pull-right"><h4 style="color:darkorange">&#8369;<input type="text" name="totalStandard" style="width: 100px;border:none; border-color: transparent" value="{{ number_format(Session::get('totalStandard'),2) }}" readonly></h4></li>
                                        <li class="pull-left">Number of night(s): <input type="text" name="n_nights" style="width: 10px;border:none; border-color: transparent" value="{{ Session::get('n_nights') }}" readonly> </li></br>
                                        <li class="pull-left">Number of person(s): <input type="text" name="n_personStandard" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_personStandard') }}" readonly></li></br>
                                        <li class="pull-left">Number of room(s):  <input type="text" name="n_standard" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_standard') }}" readonly></li><hr />
                                      </ul>
                                  </div>
                                  @endif

                                @if (  !empty(Session::get('n_quad')))
                                <div>
                                    <ul id="quad">
                                      <li class="pull-left"><strong>Quad Room - Regular Online Rate</strong></li></br>
                                      <li class="pull-right"><h4 style="color:darkorange">&#8369;<input type="text" name="totalQuad" style="width: 100px;border:none; border-color: transparent" value="{{ number_format(Session::get('totalQuad'),2) }}" readonly></h4></li>
                                      <li class="pull-left">Number of night(s): <input type="text" name="n_nights" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_nights') }}" readonly> </li></br>
                                      <li class="pull-left">Number of person(s): <input type="text" name="n_personQuad" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_personQuad') }}" readonly></li></br>
                                      <li class="pull-left">Number of room(s): <input type="text" name="n_quad" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_quad') }}" readonly></li><hr />
                                    </ul>
                                </div>
                              @endif

                              @if ( !empty(Session::get('n_family')))
                                <div>
                                    <ul  id="family">
                                      <li class="pull-left"><strong>Family Room - Regular Online Rate</strong> </li></br>
                                      <li class="pull-right"><h4 style="color:darkorange">&#8369;<input type="text" name="totalFamily" style="width: 100px;border:none; border-color: transparent" value="{{ number_format(Session::get('totalFamily'),2) }}" readonly></h4></li>
                                      <li class="pull-left">Number of night(s): <input type="text" name="n_nights" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_nights') }}" readonly> </li></br>
                                      <li class="pull-left">Number of person(s): <input type="text" name="n_personFamily" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_personFamily') }}" readonly></li></br>
                                      <li class="pull-left">Number of room(s): <input type="text" name="n_family" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_family') }}" readonly></li><hr />
                                    </ul>
                                </div>
                              @endif
                                @if ( !empty(Session::get('n_barkada')))
                                  <div>
                                      <ul>
                                        <li class="pull-left"><strong>Barkada's Room - Regular Online Rate</strong> </li></br>
                                        <li class="pull-right"><h4 style="color:darkorange">&#8369;<input type="text" name="totalBarkada" style="width: 100px;border:none; border-color: transparent" value="{{ number_format(Session::get('totalBarkada'),2) }}" readonly></h4></li>
                                        <li class="pull-left">Number of night(s): <input type="text" name="n_nights" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_nights') }}" readonly> </li></br>
                                        <li class="pull-left">Number of person(s): <input type="text" name="n_personBarkada" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_personBarkada') }}" readonly></li></br>
                                        <li class="pull-left">Number of room(s): <input type="text" name="n_barkada" style="width: 60px;border:none; border-color: transparent" value="{{ Session::get('n_barkada') }}" readonly></li><hr />
                                      </ul>
                                  </div>
                                @endif
                            </div>

                            <div class="white-box">
                                <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">RESERVATION SUMMARY</h4>
                                <table width="100%">
                                  <tr class="bordered">
                                    <td><h6>Room Cost:</h6></td>
                                    <td><h6> <input type="text" name="roomCost" style="width: 60px;border:none; border-color: transparent" value="{{  number_format(Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard'), 2) }}" readonly></h6></td>
                                  </tr>
                                  <tr class="bordered">
                                    <td><h6>Tax & Other Fee(12.00%):</h6></td>
                                    <td><h6> <input type="text" name="otherFee" style="width: 60px;border:none; border-color: transparent" value="{{  number_format((Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) * .12, 2) }}" readonly></h6></td>
                                  </tr>
                                  <tr class="bordered">
                                    <td><h6>Total Reservation Cost:</h6></td>
                                    <td><h6><input type="text" name="totalCost" style="width: 60px;border:none; border-color: transparent" value="{{ (Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) + (Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) * .12}}" readonly></h6></td>
                                  </tr>
                                  <tr class="bordered">
                                    <td><h6>Total amount payable in the hotel:</h6></td>
                                    <td><h6>{{ number_format(((Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) + (Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) * .12) / 2 , 2)}} </h6></td>
                                  </tr>
                                  <tr class="bordered">
                                    <td><h6><br>Payment upon reservation:</h6></td>
                                    <td><h6 style="color:darkorange"><br>{{ number_format(((Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) + (Session::get('totalBarkada') + Session::get('totalFamily')  + Session::get('totalQuad')  + Session::get('totalStandard')) * .12) / 2 , 2)}}</h6></td>
                                  </tr>
                                </table>
                            </div>

                          </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
