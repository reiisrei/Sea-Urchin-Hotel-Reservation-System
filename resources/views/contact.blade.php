@extends('layouts.app')

@section('content')
  <div class="breadcrumb breadcrumb-1 pos-center">
    <h1>CONTACT</h1>
  </div>
      <div class="container">
          <div class=" text-center ">
          <!--Errors-->
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
          </div>
        </div>
        	<div class="content"><!-- Content Section -->
        		<div class="container">
        			<div class="row">
        				<div class="col-lg-3 col-sm-4 margint60"><!-- Sidebar -->
        					<div class="luxen-widget news-widget">
        						<div class="title">
        							<h5>HOTEL INFORMATION</h5>
        						</div>
        						<p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
        					</div>
        					<div class="luxen-widget news-widget">
        						<div class="title">
        							<h5>CONTACT</h5>
        						</div>
        						<ul class="footer-links">
        							<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
        							<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
        							<li><p><i class="fa fa-envelope"></i> info@2035themes.com</p></li>
        						</ul>
        					</div>
        					<div class="luxen-widget news-widget">
        						<div class="title">
        							<h5>SOCIAL MEDIA</h5>
        						</div>
        						<ul class="social-links">
        							<li><a href="http://facebook.com/2035themes"><i class="fa fa-facebook"></i></a></li>
        							<li><a href="http://twitter.com/2035themes"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="http://vine.com/2035themes"><i class="fa fa-vine"></i></a></li>
        							<li><a href="http://foursquare.com/2035themes"><i class="fa fa-foursquare"></i></a></li>
        							<li><a href="http://instagram.com/2035themes"><i class="fa fa-instagram"></i></a></li>
        						</ul>
        					</div>
        				</div>
        				<div class="col-lg-9 col-sm-8"><!-- Contact -->

        					<div class="contact-form margint60"><!-- Contact Form -->
        						{!! Form::open(['url' => 'contact/submit']) !!}
        							{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Your Name', 'autofocus'])}}
                      {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject'])}}
        							{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Your Email'])}}
                      {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Your message here...', 'cols' => '30', 'rows' => '7', 'maxlength' => '2500'])}}
                      {{Form::submit('Send Message', ['class'=> 'pull-right margint10'])}}
        						{!! Form::close() !!}
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
@endsection
