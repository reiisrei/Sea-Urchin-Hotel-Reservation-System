@extends('layouts.app')

@section('content')

  <div class="breadcrumb breadcrumb-1 pos-center">
		<h1>THE ROOMS</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container margint60">
			<div class="row">
				<div class="col-lg-12 marginb20"><!-- Room Sort -->

				</div>
				<div class="col-lg-4 col-sm-6 clearfix"><!-- Explore Rooms -->
					<div class="home-room-box clearfix">
						<div class="room-image">
							<img alt="Room Images" class="img-responsive" src="/storage/cover_images/{{ isset($standard->cover_image) ? $standard->cover_image : "Standard-room_1543751302_1544336791_1545080241.jpg"}}">
							<div class="home-room-details">
								<h5><a href="/standard"><span class="pull-left">{{ isset($standard->title) ? $standard->title: "Standard"}} Room</span><strong class="pull-right">Good for {{ isset($standard->maxAdult) ? $standard->maxAdult: "2"}} Person</strong></a></h5>
								<div class="pull-left">
									<ul>
                    <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                    <li title="Parking Space"><i class="fa fa-car"></i></li>
                    <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                    <li title="Televisions"><i class="fa fa-television"></i></li>
                    <li title="Shower"><i class="fa fa-shower"></i></li>
                    <li title="Breakfast"><i class="fa fa-spoon"></i></li>
									</ul>
								</div>
								<div class="pull-right room-rating">
									<ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star inactive"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="room-details">
							<p>{{ isset($standard->description) ? $standard->description : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    "}}</p>
						</div>
						<div class="room-bottom">
							<div class="pull-left"><h4>P{{number_format($standard->nightRate)}}<span class="room-bottom-time">/ Day</span></h4></div>
							<div class="pull-right">
								<div class="button-style-1">
									<a href="{{ url('/') }}">BOOK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 clearfix">
					<div class="home-room-box clearfix">
						<div class="room-image">
							<img alt="Room Images" class="img-responsive" src="/storage/cover_images/{{ isset($quad->cover_image) ? $quad->cover_image : "Quad-room_1543751224_1544336882_1545080258.jpg"}}">
							<div class="home-room-details">
								<h5><a href="/quad"><span class="pull-left">{{ isset($quad->title) ? $quad->title: "Quad"}} Room</span><strong class="pull-right">Good for {{ isset($quad->maxAdult) ? $quad->maxAdult: "4"}} Person</strong></a></h5>
								<div class="pull-left">
									<ul>
                    <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                    <li title="Parking Space"><i class="fa fa-car"></i></li>
                    <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                    <li title="Televisions"><i class="fa fa-television"></i></li>
                    <li title="Shower"><i class="fa fa-shower"></i></li>
                    <li title="Breakfast"><i class="fa fa-spoon"></i></li>
									</ul>
								</div>
								<div class="pull-right room-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star inactive"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="room-details">
							<p>{{ isset($quad->description) ? $quad->description : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"}}</p>
						</div>
						<div class="room-bottom">
							<div class="pull-left"><h4>P{{number_format($quad->nightRate)}}<span class="room-bottom-time">/ Day</span></h4></div>
							<div class="pull-right">
								<div class="button-style-1">
									<a href="{{ url('/') }}">BOOK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 clearfix">
					<div class="home-room-box clearfix">
						<div class="room-image">
							<div class="room-features">FEATURED</div>
							<img alt="Room Images" class="img-responsive" src="/storage/cover_images/{{ isset($family->cover_image) ? $family->cover_image : "Family-room_1543751238_1544336904_1545080277.jpg"}}">
							<div class="home-room-details">
								<h5><a href="/family"><span class="pull-left">{{ isset($family->title) ? $family->title : "Family"}} Room</span><strong class="pull-right">Good for {{ isset($family->maxAdult) ? $family->maxAdult : "5"}} Person</strong></a></h5>
								<div class="pull-left">
									<ul>
                    <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                    <li title="Parking Space"><i class="fa fa-car"></i></li>
                    <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                    <li title="Televisions"><i class="fa fa-television"></i></li>
                    <li title="Shower"><i class="fa fa-shower"></i></li>
                    <li title="Breakfast"><i class="fa fa-spoon"></i></li>
									</ul>
								</div>
								<div class="pull-right room-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star inactive"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="room-details">
							<p>{{ isset($family->description) ? $family->description : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"}}</p>
						</div>
						<div class="room-bottom">
							<div class="pull-left"><h4>P{{number_format($family->nightRate)}}<span class="room-bottom-time">/ Day</span></h4></div>
							<div class="pull-right">
								<div class="button-style-1">
									<a href="{{ url('/') }}">BOOK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 clearfix">
					<div class="home-room-box clearfix">
						<div class="room-image">
							<img alt="Room Images" class="img-responsive" src="/storage/cover_images/{{ isset($barkada->cover_image) ? $barkada->cover_image : "Barkada-room_1543751254_1544336928_1545080308.jpg"}}">
							<div class="home-room-details">
								<h5><a href="/barkada"><span class="pull-left">{{ isset($barkada->title) ? $barkada->title : "Barkada"}}'s Room</span><strong class="pull-right">Good for {{ isset($barkada->maxAdult) ? $barkada->maxAdult : "16"}} Person</strong></a></h5>
								<div class="pull-left">
									<ul>
                    <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                    <li title="Parking Space"><i class="fa fa-car"></i></li>
                    <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                    <li title="Televisions"><i class="fa fa-television"></i></li>
                    <li title="Shower"><i class="fa fa-shower"></i></li>
                    <li title="Breakfast"><i class="fa fa-spoon"></i></li>
									</ul>
								</div>
								<div class="pull-right room-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star inactive"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="room-details">
							<p>{{ isset($barkada->description) ? $barkada->description : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"}}</p>
						</div>
						<div class="room-bottom">
							<div class="pull-left"><h4>P{{number_format($barkada->nightRate)}}<span class="room-bottom-time">/ Day</span></h4></div>
							<div class="pull-right">
								<div class="button-style-1">
									<a href="{{ url('/') }}">BOOK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 clearfix">
					<div class="home-room-box clearfix">
						<div class="room-image">
							<img alt="Room Images" class="img-responsive" src="/storage/cover_images/{{ isset($function->cover_image) ? $function->cover_image : "Function-hall_1543751270.jpg"}}">
							<div class="home-room-details">
								<h5><a href="function"><span class="pull-left">{{ isset($function->title) ? $function->title : "Function"}} Hall</span><strong class="pull-right">Good for {{ isset($function->maxAdult) ? $function->maxAdult : "150"}} Person</strong></a></h5>
								<div class="pull-left">
									<ul>
                    <li title="Free Wifi"><i class="fa fa-wifi"></i></li>
                    <li title="Parking Space"><i class="fa fa-car"></i></li>
                    <li title="Airconditioned Room"><i class="fa fa-snowflake-o"></i></li>
                    <li title="Televisions"><i class="fa fa-television"></i></li>
                    <li title="Shower"><i class="fa fa-shower"></i></li>
                    <li title="Breakfast"><i class="fa fa-spoon"></i></li>
									</ul>
								</div>
								<div class="pull-right room-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star inactive"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="room-details">
							<p>{{ isset($function->description) ? $function->description : "This is the function hall that can accommodate 150 people the price depends on the occasion and the schedule."}}</p>
						</div>
						<div class="room-bottom">
							<div class="pull-left"><h4>Contact us for price</h4></div>
							<div class="pull-right">
								<div class="button-style-1">
									<a href="/contact">CALL US</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- <div class="col-lg-4 col-sm-6 clearfix">
					<div class="home-room-box clearfix">
						<div class="room-image">
							<div class="room-features">FEATURED</div>
							<img alt="Room Images" class="img-responsive" src="temp/room-image-6.jpg">
							<div class="home-room-details">
								<h5><a href="#">Awesome Suits</a></h5>
								<div class="pull-left">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<div class="pull-right room-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star inactive"></i></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="room-details">
							<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tibulum at ero[...]</p>
						</div>
						<div class="room-bottom">
							<div class="pull-left"><h4>89$<span class="room-bottom-time">/ Day</span></h4></div>
							<div class="pull-right">
								<div class="button-style-1">
									<a href="#">BOOK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
@endsection
