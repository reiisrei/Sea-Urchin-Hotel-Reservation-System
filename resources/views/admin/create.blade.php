@if(Auth::user()->name == 'admin')
@extends('admin.layouts.admin')
@section('content')
  <h1>Create Room Category</h1>
  <hr>
  <div class="container center">
  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
</div>
  {!! Form::open(['url' => '/create/post','enctype' => 'multipart/form-data']) !!}
  <div class="container forms">
      <div class="row"></br></br>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            {{Form::text('roomType', '', ['class' => 'form-control input-lg', 'placeholder' => 'Room Type', 'autofocus' , 'tabindex' => '1'])}}
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
             {{Form::number('rateForNight', '', ['class' => 'form-control input-lg', 'placeholder' => 'Rate for Night', 'autofocus' , 'tabindex' => '2'])}}
          </div>
        </div>
      </div>
      <div class="form-group">
        {{Form::number('availableRooms', '', ['class' => 'form-control input-lg', 'placeholder' => 'Available Room', 'autofocus' , 'tabindex' => '3' ])}}
      </div>
      <div class="form-group">
        {{Form::number('allowedChildren', '', ['class' => 'form-control input-lg', 'placeholder' => 'Allowed Children', 'autofocus' , 'tabindex' => '4'])}}</br>
        {{Form::number('maxAdult', '', ['class' => 'form-control input-lg', 'placeholder' => 'Max Adult', 'autofocus' , 'tabindex' => '4'])}}</br>
        {{Form::textarea('description', '', ['class' => 'form-control input-lg', 'placeholder' => 'Description', 'autofocus' , 'tabindex' => '4'])}}</br>
      </div>
      <div class="form-group">
        {{Form::file('cover_image')}}
      </div>
      <div class="form-group">
        {{Form::submit('Next', ['class'=> 'btn btn-primary py-3 px-5', 'tabindex' => '13'])}}
      </div>
  </div>
      {!! Form::close() !!}
@endsection
@else
  @section('content')
    <h1><strong>You are not authorized to view this page.</strong></h1>
    <a class="btn btn-danger btn-xl" href="/dashboard"><i class="fa fa-backspace"></i> Go back!</a>
  @endsection

@endif
