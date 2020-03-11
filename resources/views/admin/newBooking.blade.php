@extends('admin.layouts.admin')
@section('content')
{!! Form::open(['url' => '/newBooking/create','enctype' => 'multipart/form-data']) !!}
  <div class="container forms">
      <div class="row"></br></br>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            {{Form::date('checkIn', '', ['class' => 'form-control input-lg', 'placeholder' => 'Room Type', 'autofocus' , 'tabindex' => '1'])}}
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
             {{Form::date('checkOut', '', ['class' => 'form-control input-lg', 'placeholder' => 'Room Type', 'autofocus' , 'tabindex' => '1'])}}
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
           {{Form::number('numNights', '', ['class' => 'form-control input-lg', 'placeholder' => 'Number of Nights', 'autofocus' , 'tabindex' => '1'])}}
        </div>
        </div>

      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            {{ Form::label('StandardRoom', 'Standard Room: ',['style' => 'color:black']) }}
            {{Form::select('n_standard',['0' =>'0','1' =>'1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7'], null, ['class' => 'form-control input-lg', 'autofocus' , 'tabindex' => '5'])}}
          </div>
          <div class="col-md-3">
            {{ Form::label('QuadRoom', 'Quad Room: ',['style' => 'color:black']) }}
            {{Form::select('n_quad',['0' =>'0','1' =>'1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8'], null, ['class' => 'form-control input-lg', 'autofocus' , 'tabindex' => '5'])}}
          </div>
          <div class="col-md-3">
            {{ Form::label('FamilyRoom', 'Family Room: ',['style' => 'color:black']) }}
            {{Form::select('n_family',['0' =>'0','1' =>'1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7'], null, ['class' => 'form-control input-lg', 'autofocus' , 'tabindex' => '5'])}}
          </div>
          <div class="col-md-3">
            {{ Form::label('BarkdaRoom', 'Barkda Room: ',['style' => 'color:black']) }}
            {{Form::select('n_barkada',['0' =>'0','1' =>'1', '2' => '2', '3' => '3'], null, ['class' => 'form-control input-lg', 'autofocus' , 'tabindex' => '5'])}}
          </div>
        </div>

      </div>
      <div class="form-group">
        {{Form::text('firsName', '', ['class' => 'form-control input-lg', 'placeholder' => 'First Name', 'autofocus' , 'tabindex' => '4'])}}</br>
        {{Form::text('lastName', '', ['class' => 'form-control input-lg', 'placeholder' => 'Last Name', 'autofocus' , 'tabindex' => '4'])}}</br>
        {{Form::number('phoneNumber', '', ['class' => 'form-control input-lg', 'placeholder' => 'Phone Number', 'autofocus' , 'tabindex' => '4'])}}</br>
        {{Form::email('emailAddress', '', ['class' => 'form-control input-lg', 'placeholder' => 'Email Address', 'autofocus' , 'tabindex' => '4'])}}</br>
      </div>
      <div class="form-group">
        {{Form::submit('Next', ['class'=> 'btn btn-primary py-3 px-5', 'tabindex' => '13'])}}
      </div>
  </div>
      {!! Form::close() !!}
@endsection
