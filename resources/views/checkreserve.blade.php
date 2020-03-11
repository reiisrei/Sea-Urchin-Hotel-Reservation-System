@extends('layouts.app')

@section('content')

  <div class="breadcrumb breadcrumb-1 pos-center">
    <h1>Check Reservation</h1>
  </div>

  <div class="container">
        <div class=" text-center ">
          @if(session()->has('flash_message'))
            <div class="alert alert-danger }}">
            {!! session('flash_message') !!}
            </div>
          @endif
          <div class="form-group forms">
                {!! Form::open(['url' => '/detail']) !!}
                  <div class="form-group">
                    {{Form::label('boookingNumber', 'Enter your booking Number:')}}
                    {{Form::text('boookingNum', '', ['class' => 'form-control mb-2 mr-lg-2', 'placeholder' => 'Booking Number', 'autofocus' , 'maxlength' => '50', 'required', 'id' => 'book_num', 'style' => 'text-transform:uppercase'])}}
                  </div>
                  <div class="style">
                    {{Form::submit('Check Reservation' )}}
                  </div>
                {!! Form::close() !!}
          </div>
      </div>
    </div>
@endsection
