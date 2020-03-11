

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <title>404</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="theme/img/favicon.ico" />
    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{ URL::asset('theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/supersized.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/supersized.shutter.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/flexslider.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/selectordie.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/main.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/2035.responsive.css')}}">

    <script src={{ URL::asset('theme/js/vendor/modernizr-2.8.3-respond-1.1.0.min.js')}}></script>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  @if (Request::is('/therooms'))
  <script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
  });
  </script>
  @endif

</head>
<body>

<div id="wrapper">
	<div id="home">
		<div class="header"><!-- Header Section -->
			<div class="pre-header"><!-- Pre-header -->
				<div class="container">
					<div class="row">
						<div class="pull-left pre-address-b"><p><i class="fa fa-map-marker"></i> Brgy. Lucap, Inansuana Street Alaminos, Pangasinan 2404</p></div>
						<div class="pull-right">
							<div class="pull-left">
								<ul class="pre-link-box">
									<li><a href="about.html">About</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="#">Add Your Link</a></li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
      @include('inc.navbar')
		</div>
    @yield('content')
    @include('inc.footer')

    @include('inc.javascripts')


</body>

</html>
