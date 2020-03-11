<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

  {{-- <title>{{$title}}</title> --}}

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
