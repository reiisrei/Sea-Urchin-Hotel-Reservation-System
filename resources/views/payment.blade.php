@extends('layouts.app')
<style media="screen">
.center {
  margin: auto;
  width: 15%;
  padding: 10px;
}
</style>
@section('content')
  <div class="breadcrumb breadcrumb-1 pos-center">
    <h1>PAYMENT</h1>
  </div>
  </br></br>
  <div class="pos-center marginb20">
    <h2>Payment Form</h2>
    <img src="theme/img/shape.png">
  </div>
  </br></br>
  <div class="container">
        <div class=" text-center ">
          @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                {{$error}}
              </div>
            @endforeach
          @endif
            <!--Message success-->
          @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif
          {!! Form::open(['url' => '/payment/post','enctype' => 'multipart/form-data']) !!}
          {{-- {!! Form::open(['action' => ['CheckReserveController@send'],'method' => 'POST','enctype' => 'multipart/form-data']) !!} --}}
            <div class="container forms">
              <div class="form-group forms">
                <span>Payment Method:</span>{{Form::text('paymentMethod', '', ['class' => 'form-control', 'placeholder' => 'Ex. Bank/Paypal', 'autofocus'])}}
              </div>
              <div class="form-group forms">
                <span>Booking Number:</span>{{Form::text('bookingNumber', $bookingDetail->bookingID, ['class' => 'form-control', 'placeholder' => 'Booking Number', 'autofocus', 'readonly' => 'true' ])}}
              </div>
              <div class="form-group">
                <span>Invoice Number:</span>{{Form::text('invoiceNumber', '', ['class' => 'form-control', 'placeholder' => 'Invoice Number', 'autofocus'])}}
              </div>
              <div class="form-group">
                <span>Account Name:</span>{{Form::text('accountName', '', ['class' => 'form-control', 'placeholder' => 'Account Name', 'autofocus'])}}
              </div>
              <div class="form-group">
                <span>Amount Paid:</span>{{Form::number('ammountPaid', '', ['class' => 'form-control', 'placeholder' => 'Ammount Paid', 'autofocus'])}}
              </div>
              <div class="form-group">
                <span>Date Paid:</span>{{ Form::text('datePaid', '' , ['id' => 'dpd1', 'placeholder' => 'Date paid' , 'required', 'class' => 'form-control input-lg']) }}
              </div>
              <div class="form-group">
                <span>Comment (Optional):</span>{{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Your message here...', 'cols' => '30', 'rows' => '7', 'maxlength' => '2500'])}}
              </div>
              <div class="form-group">
                <h6 class="mark">Upload a photo of the deposit slip or PayPal's invoice: </h6>
                <div class="center">{{Form::file('payment_image')}}</div>
              </div>
              <div class="form-group">
                {{Form::submit('Send', ['class'=> 'btn btn-primary py-3 px-5','onclick' => 'return confirm("Submiting this payment will require approval. Are you sure you want to continue?")'])}}
              </div>
            </div>
              {!! Form::close() !!}
            </div></br></br>
      </div>

@endsection
