

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
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
									{{-- <li><a href="about.html">About</a></li> --}}
									<li><a href="/contact">Contact</a></li>
									{{-- <li><a href="#">Add Your Link</a></li> --}}
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
