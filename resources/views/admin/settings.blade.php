@if(Auth::user()->name == 'admin')
@extends('admin.layouts.admin')
@section('content')
  <h1>Settings</h1>
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
  <hr>
  <h4 style="color:maroon">Rooms Information</h5>
  </br></br>
  <h5>Standard Room</h5>
  <hr>
  {!! Form::open(['action' => ['SettingsController@standard'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::text('title', $standard->title, [ 'placeholder' => 'Title', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('nightRate', $standard->nightRate, [ 'placeholder' => 'Night Rate', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('capacity', $standard->capacity, [ 'placeholder' => 'Capacity', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('childrenAllowed', $standard->childrenAllowed, [ 'placeholder' => 'Children Allowed', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('maxAdult', $standard->maxAdult, [ 'placeholder' => 'Max Adult', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('description', $standard->description, [ 'placeholder' => 'Description', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <h5>Photo:</h5>
  {!! Form::open(['action' => ['SettingsController@standardPhoto'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::file('cover_image')}}
  {{ Form::hidden('_method','PUT') }}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  <h5>Quad Room</h5>
  <hr>
  {!! Form::open(['action' => ['SettingsController@quad'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::text('title', $quad->title, [ 'placeholder' => 'Title', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('nightRate', $quad->nightRate, [ 'placeholder' => 'Night Rate', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('capacity', $quad->capacity, [ 'placeholder' => 'Capacity', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('childrenAllowed', $quad->childrenAllowed, [ 'placeholder' => 'Children Allowed', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('maxAdult', $quad->maxAdult, [ 'placeholder' => 'Max Adult', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('description', $quad->description, [ 'placeholder' => 'Description', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  <h5>Photo:</h5>
  {!! Form::open(['action' => ['SettingsController@quadPhoto'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::file('cover_image')}}
  {{ Form::hidden('_method','PUT') }}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  <h5>Family Room</h5>
  <hr>
  {!! Form::open(['action' => ['SettingsController@family'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::text('title', $family->title, [ 'placeholder' => 'Title', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('nightRate', $family->nightRate, [ 'placeholder' => 'Night Rate', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('capacity', $family->capacity, [ 'placeholder' => 'Capacity', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('childrenAllowed', $family->childrenAllowed, [ 'placeholder' => 'Children Allowed', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('maxAdult', $family->maxAdult, [ 'placeholder' => 'Max Adult', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('description', $family->description, [ 'placeholder' => 'Description', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  <h5>Photo:</h5>
  {!! Form::open(['action' => ['SettingsController@familyPhoto'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::file('cover_image')}}
  {{ Form::hidden('_method','PUT') }}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  <h5>Barkada's Room</h5>
  <hr>
  {!! Form::open(['action' => ['SettingsController@barkada'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::text('title', $barkada->title, [ 'placeholder' => 'Title', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('nightRate', $barkada->nightRate, [ 'placeholder' => 'Night Rate', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('capacity', $barkada->capacity, [ 'placeholder' => 'Capacity', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('childrenAllowed', $barkada->childrenAllowed, [ 'placeholder' => 'Children Allowed', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('maxAdult', $barkada->maxAdult, [ 'placeholder' => 'Max Adult', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::text('description', $barkada->description, [ 'placeholder' => 'Description', 'autofocus' , 'tabindex' => '1'])}}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  <h5>Photo:</h5>
  {!! Form::open(['action' => ['SettingsController@barkadaPhoto'],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
  {{Form::file('cover_image')}}
  {{ Form::hidden('_method','PUT') }}
  {{Form::submit('Update', ['class'=> 'btn btn-primary btn-sm', 'tabindex' => '2'])}}
  {!! Form::close() !!}
  <hr>
  </br></br>
  
@endsection
@else
  @section('content')
    <h1><strong>You are not authorized to view this page.</strong></h1>
    <a class="btn btn-danger btn-xl" href="/dashboard"><i class="fa fa-backspace"></i> Go back!</a>
  @endsection

@endif
