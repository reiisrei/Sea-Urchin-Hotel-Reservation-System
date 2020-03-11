<!-- JS FILES -->
<script src="{{ URL::asset('theme/js/vendor/jquery-1.11.1.min.js')}}"></script>
<script src="{{ URL::asset('theme/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('theme/js/retina-1.1.0.min.js')}}"></script>
<script src="{{ URL::asset('theme/js/jquery.flexslider-min.js')}}"></script>
<script src="{{ URL::asset('theme/js/superfish.pack.1.4.1.js')}}"></script>
<script src="{{ URL::asset('theme/js/jquery.slicknav.min.js')}}"></script>
<script src="{{ URL::asset('theme/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ URL::asset('theme/js/selectordie.min.js')}}"></script>
<script src="{{ URL::asset('theme/js/jquery.parallax-1.1.3.js')}}"></script>
<script src="{{ URL::asset('theme/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ URL::asset('theme/js/main.js')}}"></script>
<script type="{{ URL::asset('theme/text/javascript')}}"></script>
<script src="{{ URL::asset('theme/js/jquery.simpleWeather.min.js')}}"></script>
{{-- weather room --}}
<script  src="{{ URL::asset('weather/js/index.js')}}"></script>
{{-- weather room --}}
@if (Request::is('/'))
  <script src="{{ URL::asset('theme/js/supersized.3.2.7.min.js')}}"></script>
  <script src="{{ URL::asset('theme/js/supersized.shutter.min.js')}}"></script>
  <script>
  	jQuery(function($){
  	$.supersized({
  		slideshow			:1,			// Slideshow on/off
  		autoplay			:1,			// Slideshow starts playing automatically
  		slide_interval		:4000,		// Length between transitions
  		transition			:1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
  		transition_speed	:1000,		// Speed of transition
  		pause_hover			:0,			// Pause slideshow on hover
  		performance			:1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
  		image_protect		:1,			// Disables image dragging and right click with Javascript
  		slides				:[			// Slideshow Images
  								{image : 'theme/temp/sli-2.jpg'},
  								{image : 'theme/temp/sli-1.jpg'}
  							 ]
  		});
  	});
  </script>

@endif
