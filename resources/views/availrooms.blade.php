@extends('layouts.app')
@section('content')
<?php
  // print_r('<pre>');
  // print_r($availableRooms);
  // print_r('</pre>');die();
  ?>
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

  </style>
<script type="text/javascript">

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
};



var n_standard = 0;
var n_quad = 0;
var n_family = 0;
var n_barkada = 0;

var totalQuad = 0;
var totalStandard = 0;
var totalFamily = 0;
var totalBarkada = 0;

var xSumStandard = 0;
var xSumQuad = 0;
var xSumFamily = 0;
var xSumBarkada = 0;

  function standardRoom(){
  n_standard = n_standard + Number($("#selectBoxStandard").val());
  n_personStandard = Number($("#n_adultStandard").val()) + Number($("#n_childrenStandard").val());
  totalStandard = {{$standardPrice * $n_nights }} * n_standard;
  var standard = 'Standard';
  document.getElementById("button2").disabled = false;
  if ($('select#selectBoxStandard option').length > 1 && Number($("#selectBoxStandard").val()) !== 0) {
    $('#selectBoxStandard').find("option:nth-last-child(-n+" + $('#selectBoxStandard').val() + ")").remove();
        $("#roomDetailStandard ul").html('<li><strong><input type="text" name="standard" style="width: 60px;border:none; border-color: transparent;"value='+standard+' readonly> Room - Regular Online Rate</strong> <strong><a href="javascript:removeStandard()" class="pull-right" style="color:red"><u>remove</u></a></strong></li>'+
        '<li class="pull-right"><h4 style="color:darkorange">PHP <input type="text" name="totalStandard" style="width: 70px;border:none; border-color: transparent;"value='+totalStandard+' readonly></h4></li>'+
        '<li>Number of night(s): {{$n_nights}} </li>'+
        '<li>Number of person(s): <input type="text" name="n_personStandard" style="width: 10px;border:none; border-color: transparent;"value='+n_personStandard+' readonly></li>'+
        '<li class="hr">Number of room(s): <input type="text" name="n_standard" style="width: 10px;border:none; border-color: transparent;"value='+n_standard+' readonly> </li><hr />'
      );
      document.getElementById("submit").disabled = false;
     return totalStandard;
  }else {
    alert("Select No. of rooms");
  }
}

   function quadRoom(){
   n_quad = n_quad + Number($("#selectBoxQuad").val());
   n_personQuad = Number($("#n_adultQuad").val()) + Number($("#n_childrenQuad").val());
   totalQuad = {{$quadPrice * $n_nights}} * n_quad;
   var quad = 'Quad';
   document.getElementById("button2").disabled = false;
   if ($('select#selectBoxQuad option').length > 1 && Number($("#selectBoxQuad").val()) !== 0) {
     $('#selectBoxQuad').find("option:nth-last-child(-n+" + $('#selectBoxQuad').val() + ")").remove();
         $("#roomDetailQuad ul").html('<li><strong><input type="text" name="quad" style="width: 35px;border:none; border-color: transparent;"value='+quad+' readonly> Room - Regular Online Rate</strong> <strong><a href="javascript:removeQuad()" class="pull-right" style="color:red"><u>remove</u></a></strong></li>'+
            '<li class="pull-right"><h4 style="color:darkorange">PHP <input type="text" name="totalQuad" style="width: 70px;border:none; border-color: transparent;"value='+totalQuad+' readonly></h4></li>'+
            '<li>Number of night(s): {{$n_nights}} </li>'+
            '<li>Number of person(s): <input type="text" name="n_personQuad" style="width: 10px;border:none; border-color: transparent;"value='+n_personQuad+' readonly></li>'+
            '<li class="hr">Number of room(s): <input type="text" name="n_quad" style="width: 10px;border:none; border-color: transparent;"value='+n_quad+' readonly></li><hr />'
          );
          return totalQuad;

  }else {
      alert("Select No. of rooms");
  }
}

function familyRoom()
{
  n_personFamily = Number($("#n_adultFamily").val()) + Number($("#n_childrenFamily").val());
  n_family = n_family + Number($("#selectBoxFamily").val());
  totalFamily = {{$familyPrice * $n_nights}} * n_family;
  var family = 'Family';
document.getElementById("button2").disabled = false;
  if ($('select#selectBoxFamily option').length > 1 && Number($("#selectBoxFamily").val()) !== 0) {
    $('#selectBoxFamily').find("option:nth-last-child(-n+" + $('#selectBoxFamily').val() + ")").remove();
        $("#roomDetailFamily ul").html('<li ><strong><input type="text" name="family" style="width: 40px;border:none; border-color: transparent;"value='+family+' readonly> Room - Regular Online Rate</strong> <strong><a href="javascript:removeFamily()" class="pull-right" style="color:red"><u>remove</u></a></strong></li>'+
            '<li class="pull-right"><h4 style="color:darkorange">PHP <input type="text" name="totalFamily" style="width: 70px;border:none; border-color: transparent;"value='+totalFamily+' readonly></h4></li>'+
            '<li>Number of night(s): {{$n_nights}} </li>'+
            '<li>Number of person(s): <input type="text" name="n_personFamily" style="width: 10px;border:none; border-color: transparent;"value='+n_personFamily+' readonly></li>' +
            '<li class="hr">Number of room(s): <input type="text" name="n_family" style="width: 10px;border:none; border-color: transparent;"value='+n_family+' readonly></li><hr />'
          );
          return totalFamily;
  }else {
    alert("Select No. of rooms");
  }
}

function barkadaRoom()
{
  n_personBarkada = Number($("#n_adultBarkada").val()) + Number($("#n_childrenBarkada").val());
  n_barkada = n_barkada + Number($("#selectBoxBarkada").val());
  totalBarkada = {{$barkadaPrice * $n_nights}} * n_barkada;
  var barkada = "Barkada's";
document.getElementById("button2").disabled = false;
  if ($('select#selectBoxBarkada option').length > 1 && Number($("#selectBoxBarkada").val()) !== 0) {
    $('#selectBoxBarkada').find("option:nth-last-child(-n+" + $('#selectBoxBarkada').val() + ")").remove();
        $("#roomDetailBarkda ul").html('<li ><strong><input type="text" name="barkada" style="width: 65px;border:none; border-color: transparent;"value='+barkada+' readonly> Room - Regular Online Rate</strong> <strong><a href="javascript:removeBarkada()" class="pull-right" style="color:red"><u>remove</u></a></strong></li>'+
        '<li class="pull-right"><h4 style="color:darkorange">PHP <input type="text" name="totalBarkada" style="width: 70px;border:none; border-color: transparent;"value='+totalBarkada+' readonly></h4></li>'+
        '<li>Number of night(s): {{$n_nights}} </li>'+
        '<li>Number of person(s): <input type="text" name="n_personBarkada" style="width: 20px;border:none; border-color: transparent;"value='+n_personBarkada+' readonly></li>' +
        '<li class="hr">Number of room(s): <input type="text" name="n_barkada" style="width: 10px;border:none; border-color: transparent;"value='+n_barkada+' readonly></li><hr />'
      );
      return totalBarkada;

  }else {
    alert("Select No. of rooms");
  }
}


// function removeStandard(){
//
// var select = document.getElementById('selectBoxStandard');
// for (var i = Number($("#selectBoxStandard").val()); i<=n_standard; i++){
//   var opt = document.createElement('option');
//   opt.value = i;
//   opt.innerHTML = i;
//   select.appendChild(opt);
// }
//
// }
function removeStandard() {
  var select = $('#selectBoxStandard');
  var offset = select.find("option").length;

  for (var i = 0; i < n_standard; ++i) {
    var opt = document.createElement('option');
    opt.value = i + offset;
    opt.innerHTML = i + offset;
    select.get(0).appendChild(opt);
  }
  $("#roomDetailStandard ul").html("");
  n_standard = 0 ;
}

function removeQuad() {
  var select = $('#selectBoxQuad');
  var offset = select.find("option").length;

  for (var i = 0; i < n_quad; ++i) {
    var opt = document.createElement('option');
    opt.value = i + offset;
    opt.innerHTML = i + offset;
    select.get(0).appendChild(opt);
  }
  $("#roomDetailQuad ul").html("");
  n_quad = 0 ;
}


function removeFamily() {
  var select = $('#selectBoxFamily');
  var offset = select.find("option").length;

  for (var i = 0; i < n_family; ++i) {
    var opt = document.createElement('option');
    opt.value = i + offset;
    opt.innerHTML = i + offset;
    select.get(0).appendChild(opt);
  }
  $("#roomDetailFamily ul").html("");
  n_family = 0 ;
}


function removeBarkada() {
  var select = $('#selectBoxBarkada');
  var offset = select.find("option").length;

  for (var i = 0; i < n_barkada; ++i) {
    var opt = document.createElement('option');
    opt.value = i + offset;
    opt.innerHTML = i + offset;
    select.get(0).appendChild(opt);
  }
  $("#roomDetailBarkda ul").html("");
  n_barkada = 0 ;
}

</script>
@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    <center>{{ session('status') }}</center>
</div>
@endif
<div class="breadcrumb breadcrumb-1 pos-center">
    <h1>ROOMS </h1>

</div>
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img01" style="max-width:100%">
  </div>
</div>
<div class="content">
    <!-- Content Section -->
        <div class="row">
            <div class="col-lg-12">
            <div class="quick-reservation-container">
                <div class="quick-reservation clearfix">
                      <div class="row">
                        {!! Form::open(['url' => '/check', 'id' => 'ajax-reservation-form']) !!}
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xl-4">
                          {{ Form::label('checkin', 'ARRIVAL') }}
                          {{ Form::text('start_date', '', ['id' => 'dpd1', 'placeholder' => '&#xf073;' ,'class' => 'date-selector' ,'required', 'autocomplete' => 'off', 'readonly']) }}
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xl-4">
                          {{ Form::label('checkout', 'DEPARTURE') }}
                          {{ Form::text('end_date', '', ['id' => 'dpd2', 'placeholder' => '&#xf073;' , 'class' => 'date-selector' ,'required', 'autocomplete' => 'off', 'readonly']) }}
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xl-4">
                          <div class="pull-left search-button clearfix">
                              <div class="button-style-1" style="padding-bottom:40px">
                                  {{ Form::submit('SEARCH', ['style' => 'margin-left:0px; padding: 0px; background-color:#e4b248']) }}
                              </div>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>

                </div>
            </div>
            </div>
            <div class="col-lg-9">
                <!-- Explore Rooms -->
                <table>
                    <tr class="products-title">
                        <td class="table-products-image pos-center">
                            <h6>IMAGE</h6>
                        </td>
                        <td class="table-products-name pos-center">
                            <h6>ROOM NAME</h6>
                        </td>
                        <td class="table-products-price pos-center">
                            <h6>PRICE</h6>
                        </td>
                        <td class="table-products-total pos-center">
                            <h6>PURCHASE</h6>
                        </td>


                    @if(isset($availableRooms) && !empty($availableRooms))
                      {{-- Standard room --}}
                      @if (!empty($availableRooms[3]->count))
                        <tr class="table-products-list pos-center">
                            <td class="products-image-table" style="padding-top:0px"><img alt="Products Image 1" src="{{asset('storage/cover_images/Standard-room_1543751302.jpg')}}" class="img-responsive modal-hover-opacity"style="max-width:100%;cursor:pointer" onclick="onClick(this)"></td>
                            <td class="title-table">
                                <div class="room-details-list clearfix">
                                  <div class="pull-right">
                                      <h2 style="color:red">{{(isset($availableRooms[3]->count) ? $availableRooms[3]->count : '')}} Rooms Available</h2>
                                  </div>
                                    <div class="pull-left">
                                        <h5>Standard Room</h5>
                                    </div>
                                    <div class="pull-left room-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star inactive"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="list-room-icons clearfix">
                                    <ul>
                                        <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                                        <li title="Parking Space"><i class="fa fa-car"></i></li>
                                        <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                                        <li title="Televisions"><i class="fa fa-television"></i></li>
                                        <li title="Shower"><i class="fa fa-shower"></i></li>
                                        <li title="Breakfast"><i class="fa fa-spoon"></i></li>
                                    </ul>
                                </div>
                                <p style="margin:0px"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a class="active-color" href="standard">[...]</a> </p>
                                <div class="row">
                                    <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                        <?php
                                $option = [];
                                $value = 2;

                                for ($i=1; $i <= $value; $i++) {
                                  $option[$i] = $i;
                                }
                              ?>

                                        {{ Form::label('adult', 'No. of Adult: ',['style' => 'color:black']) }}
                                        {{ Form::select('n_adult', $option, null, ['required', 'tabindex' => '9', 'id' => 'n_adultStandard']) }}
                                    </div>
                                    <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                        <?php
                                $option = [];
                                $value_2 = 2;

                                for ($i=0; $i <= $value_2; $i++) {
                                  $option[$i] = $i;
                                }
                              ?>

                                        {{ Form::label('children', 'No. of Children: ',['style' => 'color:black']) }}
                                        {{ Form::select('n_children', $option, null, ['required', 'tabindex' => '10', 'id' => 'n_childrenStandard']) }}
                                    </div>

                                    <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                        <?php
                                $option = [];
                                $value_3 = isset($availableRooms[3]->count) ? $availableRooms[3]->count : 0;

                                for ($i=0; $i <= $value_3; $i++) {
                                  $option[$i] = $i;
                                }
                              ?>

                                        {{ Form::label('rooms', 'No. of rooms: ',['style' => 'color:black']) }}
                                        {{ Form::select('n_rooms', $option, null, ['required', 'tabindex' => '10', 'id' => 'selectBoxStandard']) }}

                                    </div>
                                </div>
                            </td>
                            <td>
                                <h3>P2000</h3>
                            </td>
                            <td>
                                <div  class="button-style-1" style="padding-bottom:80px" style="padding-bottom:40px"><a href="javascript:standardRoom()" ><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK
                                        </span></a></div>
                            </td>
                        </tr>
                      @endif
                      @if (!empty($availableRooms[2]->count))
                      {{-- Quad room --}}
                      <tr class="table-products-list pos-center">
                          <td class="products-image-table" style="padding-top:0px"><img alt="Products Image 1" src="{{asset('storage/cover_images/Quad-room_1543751224.jpg')}}" class="img-responsive modal-hover-opacity"style="max-width:100%;cursor:pointer" onclick="onClick(this)"></td>
                          <td class="title-table">
                              <div class="room-details-list clearfix">
                                <div class="pull-right">
                                    <h2 style="color:red">{{(isset($availableRooms[2]->count) ? $availableRooms[2]->count : '')}} Rooms Available</h2>
                                </div>
                                  <div class="pull-left">
                                      <h5>Quad Room</h5>
                                  </div>
                                  <div class="pull-left room-rating">
                                      <ul>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star inactive"></i></li>
                                          <li></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="list-room-icons clearfix">
                                  <ul>
                                      <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                                      <li title="Parking Space"><i class="fa fa-car"></i></li>
                                      <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                                      <li title="Televisions"><i class="fa fa-television"></i></li>
                                      <li title="Shower"><i class="fa fa-shower"></i></li>
                                      <li title="Breakfast"><i class="fa fa-spoon"></i></li>
                                  </ul>
                              </div>
                              <p style="margin:0px"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a class="active-color" href="standard">[...]</a> </p>
                              <div class="row">
                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value = 4;

                              for ($i=1; $i <= $value; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                            {{ Form::label('adult', 'No. of Adult: ',['style' => 'color:black']) }}
                            {{ Form::select('n_adult', $option, null, ['required', 'tabindex' => '9', 'id' => 'n_adultQuad']) }}
                                  </div>
                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value_2 = 3;

                              for ($i=0; $i <= $value_2; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                            {{ Form::label('children', 'No. of Children: ',['style' => 'color:black']) }}
                            {{ Form::select('n_children', $option, null, ['required', 'tabindex' => '10', 'id' => 'n_childrenQuad']) }}
                                  </div>

                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value_3 = $availableRooms[2]->count;

                              for ($i=0; $i <= $value_3; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('rooms', 'No. of rooms: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_rooms', $option, null, ['required', 'tabindex' => '10', 'id' => 'selectBoxQuad']) }}
                                  </div>
                              </div>
                          </td>
                          <td>
                              <h3>P2500</h3>
                          </td>
                          <td>
                              <div class="button-style-1" style="padding-bottom:80px" style="padding-bottom:40px"><a href="javascript:quadRoom()" ><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK
                                      </span></a></div>
                          </td>
                      </tr>
                    @endif
                      @if (!empty($availableRooms[1]->count))
                      {{-- Family room --}}
                      <tr class="table-products-list pos-center">
                          <td class="products-image-table" style="padding-top:0px"><img alt="Products Image 1" src="{{asset('storage/cover_images/Family-room_1543751238.jpg')}}" class="img-responsive modal-hover-opacity"style="max-width:100%;cursor:pointer" onclick="onClick(this)"></td>
                          <td class="title-table">
                              <div class="room-details-list clearfix">
                                <div class="pull-right">
                                    <h2 style="color:red">{{(isset($availableRooms[1]->count) ? $availableRooms[1]->count : '')}} Rooms Available</h2>
                                </div>
                                  <div class="pull-left">
                                      <h5>Family Room</h5>
                                  </div>
                                  <div class="pull-left room-rating">
                                      <ul>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star inactive"></i></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="list-room-icons clearfix">
                                  <ul>
                                      <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                                      <li title="Parking Space"><i class="fa fa-car"></i></li>
                                      <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                                      <li title="Televisions"><i class="fa fa-television"></i></li>
                                      <li title="Shower"><i class="fa fa-shower"></i></li>
                                      <li title="Breakfast"><i class="fa fa-spoon"></i></li>
                                  </ul>
                              </div>
                              <p style="margin:0px"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a class="active-color" href="standard">[...]</a> </p>
                              <div class="row">
                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value = 5;

                              for ($i=1; $i <= $value; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('adult', 'No. of Adult: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_adult', $option, null, ['required', 'tabindex' => '9', 'id' => 'n_adultFamily']) }}
                                  </div>
                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value_2 = 4;

                              for ($i=0; $i <= $value_2; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('children', 'No. of Children: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_children', $option, null, ['required', 'tabindex' => '10', 'id' => 'n_childrenFamily']) }}
                                  </div>

                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value_3 = isset($availableRooms[1]->count) ? $availableRooms[1]->count : 0;

                              for ($i=0; $i <= $value_3; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('rooms', 'No. of rooms: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_rooms', $option, null, ['required', 'tabindex' => '10', 'id' => 'selectBoxFamily']) }}
                                  </div>
                              </div>
                          </td>
                          <td>
                              <h3>P3000</h3>
                          </td>
                          <td>
                              <div class="button-style-1" style="padding-bottom:80px" style="padding-bottom:40px"><a href="javascript:familyRoom()" ><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK
                                      </span></a></div>
                          </td>
                      </tr>
                    @endif
                    @if (!empty($availableRooms[0]->count))
                      {{-- barkada's room --}}
                      <tr class="table-products-list pos-center">
                          <td class="products-image-table" style="padding-top:0px"><img alt="Products Image 1" src="{{asset('storage/cover_images/Barkada-room_1543751254.jpg')}}" class="img-responsive modal-hover-opacity"style="cursor:pointer" onclick="onClick(this)"></td>
                          <td class="title-table">
                              <div class="room-details-list clearfix">
                                <div class="pull-right">
                                    <h2 style="color:red">{{(isset($availableRooms[0]->count) ? $availableRooms[0]->count : '')}} Rooms Available</h2>
                                </div>
                                  <div class="pull-left">
                                      <h5>Barkada's Room</h5>
                                  </div>
                                  <div class="pull-left room-rating">
                                      <ul>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star inactive"></i></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="list-room-icons clearfix">
                                  <ul>
                                      <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                                      <li title="Parking Space"><i class="fa fa-car"></i></li>
                                      <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                                      <li title="Televisions"><i class="fa fa-television"></i></li>
                                      <li title="Shower"><i class="fa fa-shower"></i></li>
                                      <li title="Breakfast"><i class="fa fa-spoon"></i></li>
                                  </ul>
                              </div>
                              <p style="margin:0px"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a class="active-color" href="standard">[...]</a> </p>
                              <div class="row">
                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value = 16;

                              for ($i=1; $i <= $value; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('adult', 'No. of Adult: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_adult', $option, null, ['required', 'tabindex' => '9', 'id' => 'n_adultBarkada']) }}
                                  </div>
                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value_2 = 15;

                              for ($i=0; $i <= $value_2; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('children', 'No. of Children: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_children', $option, null, ['required', 'tabindex' => '10', 'id' => 'n_childrenBarkada']) }}
                                  </div>

                                  <div class="pull-left col-xs-12 col-sm-4 col-md-4">
                                      <?php
                              $option = [];
                              $value_3 = isset($availableRooms[0]->count) ? $availableRooms[0]->count : 0;

                              for ($i=0; $i <= $value_3; $i++) {
                                $option[$i] = $i;
                              }
                            ?>

                                      {{ Form::label('rooms', 'No. of rooms: ',['style' => 'color:black']) }}
                                      {{ Form::select('n_rooms', $option, null, ['required', 'tabindex' => '10', 'id' => 'selectBoxBarkada']) }}
                                  </div>
                              </div>
                          </td>
                          <td>
                              <h3>P8000</h3>
                          </td>
                          <td>
                              <div class="button-style-1" style="padding-bottom:80px" style="padding-bottom:40px"><a href="javascript:barkadaRoom()" ><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK
                                      </span></a></div>
                          </td>
                      </tr>
                    @endif


                    @endif

                </table>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-12">
                <!-- Sidebar -->
                <div class="sidebar">
                  <div class="white-box">
                      <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">RESERVATION DETAILS</h4>
                      <table width="100%">
                        <tr>
                          <td>Arrival Date:</td>
                          <td style="text-align:right">{{$checkInDate}}</td>
                        </tr>
                        <tr>
                          <td>Departure Date:</td>
                          <td style="text-align:right">{{$checkOutDate}}</td>
                        </tr>
                        <tr>
                          <td>No. of Nights:</td>
                          <td style="text-align:right">{{$n_nights}} Night</td>
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

                  {{ Form::open(array('method'=>'post','url' => 'check/next', 'id'=>'next')) }}
                  <div class="white-box">
                      <h4 style="background-color:#5d0b0b !important;color:white;text-align:center;font-family:'Lato',sans-serif;font-weight: bold">ROOMS DETAILS</h4>
                      <div id="roomDetailStandard">
                          <ul id="standard">

                          </ul>
                      </div>
                      <div id="roomDetailQuad">
                          <ul id="quad">

                          </ul>
                      </div>
                      <div id="roomDetailFamily">
                          <ul  id="family">

                          </ul>
                      </div>
                      <div id="roomDetailBarkda">
                          <ul id="barkada">

                          </ul>
                      </div>
                      <div id="totals">
                          <ul>

                          </ul>
                      </div>
                      <input type="hidden" name="checkInDate" value={{$checkInDate}}>
                      <input type="hidden" name="checkOutDate" value={{$checkOutDate}}>
                      <div class="containers">
                          <input type="submit" value="NEXT" style="width:310px;background-color:#5d0b0b" id="button2" disabled>
                        {{ Form::close() }}
                      </div>

                  </div>
                </div>

            </div>
        </div>

</div>

@endsection
