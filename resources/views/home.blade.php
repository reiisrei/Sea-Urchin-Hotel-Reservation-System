@extends('layouts.app')

@section('content')

@if(session('error'))
<div class="alert alert-danger">
    <center>{{session('error')}}</center>
</div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    <center>{{ session('status') }}</center>
</div>
@endif



<div class="book-slider">
    <div class="container">
        <div class="row pos-center">
            @include('inc.calendar')
        </div>
    </div>
</div>
<div class="bottom-book-slider">
    <div class="container">
        <div class="row pos-center">
            <ul>
                <li><i class="fa fa-hotel"></i> AFFORDABLE ROOMS</li>
                <li><i class="fa fa-globe"></i> GOOD SERVICE</li>
                <li><i class="fa fa-coffee"></i> COFFEE & BREAKFAST FREE</li>
                <li><i class="fa fa-windows"></i> FREE WI-FI ALL ROOM</li>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="content">
    <!-- Content Section -->
    <div class="about clearfix">
        <!-- About Section -->
        <div class="container">
            <div class="row">
                <div class="about-title pos-center margint60">
                    <h2>WELCOME TO PARADISE</h2>
                    <div class="title-shape"><img alt="Shape" src="theme/img/shape.png"></div>
                    <p>Sea Urchin Hotel is a home for everyone who seeks absolute satisfaction. History bound with touches of old-world artisrty and modern convenience. Our hotel is a fusion of distinct charm and heart warming hospitality.

</p>
                </div>
                <div class="otel-info margint60">
                    <div class="col-lg-6 col-sm-6">
                        <div class="title-style-1 marginb40">
                            <h5>GALLERY</h5>
                            <hr>
                        </div>
                        <div class="flexslider">
                            <ul class="slides">
                                <li><img alt="Slider 1" class="img-responsive" src="theme/temp/otel-info-image-1.jpg" /></li>
                                <li><img alt="Slider 1" class="img-responsive" src="theme/temp/otel-info-image-2.jpg" /></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-3">
                        <div class="title-style-1 marginb40">
                            <h5>ABOUT US</h5>
                            <hr>
                        </div>
                        <p>The hotel name "The Sea urchin hotel" comes from the pana-pana which is the local name for the sea urchin, the family of Alcaparras chooses this as company name, for it is their favorite food and the local’s primary source of livelihood. Mrs. Alcaparras build the hotel near the Hundred Island with the sole purpose to attract more client, to see the beauty of the island and experience all the activities the island has to offer like; banana boat, zip line from island to island, snorkeling, free diving, exploring bat caves and last of all to witness all the view of each island</p>
                    </div>
                    {{-- <div class="col-lg-4 col-sm-6">
        							<div class="title-style-1 marginb40">
        								<h5>OUR NEWS</h5>
        								<hr>
        							</div>
        							<div class="home-news">
        								<div class="news-box clearfix">
        									<div class="news-time pull-left">
        										<div class="news-date pos-center"><div class="date-day">20<hr></div>MAY</div>
        									</div>
        									<div class="news-content pull-left">
        										<h6><a href="#">News from us from now</a></h6>
        										<p class="margint10">Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui <a class="active-color" href="#">[...]</a></p>
        									</div>
        								</div>
        								<div class="news-box clearfix">
        									<div class="news-time pull-left">
        										<div class="news-date pos-center"><div class="date-day">20<hr></div>MAY</div>
        									</div>
        									<div class="news-content pull-left">
        										<h6><a href="#">News from us from now</a></h6>
        										<p class="margint10">Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue <a class="active-color" href="#">[...]</a></p>
        									</div>
        								</div>
        							</div>
        						</div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="explore-rooms margint30 clearfix">
        <!-- Explore Rooms Section -->
        <div class="container">
            <div class="row">
                <div class="title-style-2 marginb40 pos-center">
                    <h3>FEATURED ROOMS</h3>
                    <hr>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="home-room-box">
                        <div class="room-image">
                          <div class="room-features">FEATURED</div>
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
                            <div class="pull-left">
                                <h4><h4>P{{(isset($standard->nightRate) ? number_format($standard->nightRate) : '')}}<span class="room-bottom-time">/ Day</span></h4></h4>
                            </div>
                            <div class="pull-right">
                                <div class="button-style-1">
                                    <a href="#">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="home-room-box">
                        <div class="room-image">
                          <div class="room-features">FEATURED</div>
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
                            <div class="pull-left">
                                <h4>P{{(isset($quad->nightRate) ? number_format($quad->nightRate) :'')}}<span class="room-bottom-time">/ Day</span></h4>
                            </div>
                            <div class="pull-right">
                                <div class="button-style-1">
                                    <a href="#">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="home-room-box">
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
                            <div class="pull-left">
                                <h4>P{{(isset($family->nightRate) ? number_format($family->nightRate) : '')}}<span class="room-bottom-time">/ Day</span></h4>
                            </div>
                            <div class="pull-right">
                                <div class="button-style-1">
                                    <a href="#">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="parallax123" class="parallax parallax-one clearfix margint60">
        <!-- Parallax Section -->
        <div class="support-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                            <div class="flipper">
                                <div class="support-box pos-center front">
                                    <div class="support-box-title"><i class="fa fa-phone"></i></div>
                                    <h4>CALL US</h4>
                                    <p class="margint20">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ferme fentum</p>
                                </div>
                                <div class="support-box pos-center back">
                                    <div class="support-box-title"><i class="fa fa-phone"></i></div>
                                    <h4>PHONE NUMBER</h4>
                                    <p class="margint20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, et.<br />+61 3 8376 6284</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                            <div class="flipper">
                                <div class="support-box pos-center front">
                                    <div class="support-box-title"><i class="fa fa-envelope"></i></div>
                                    <h4>SEND US E-MAIL</h4>
                                    <p class="margint20">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ferme fentum</p>
                                </div>
                                <div class="support-box pos-center back">
                                    <div class="support-box-title"><i class="fa fa-envelope"></i></div>
                                    <h4>E-MAIL ADDRESS</h4>
                                    <p class="margint20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, et.<br />luxen
                                        @2035themes.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                            <div class="flipper">
                                <div class="support-box pos-center front">
                                    <div class="support-box-title"><i class="fa fa-home"></i></div>
                                    <h4>VISIT US</h4>
                                    <p class="margint20">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ferme fentum</p>
                                </div>
                                <div class="support-box pos-center back">
                                    <div class="support-box-title"><i class="fa fa-home"></i></div>
                                    <h4>COMPANY ADDRESS</h4>
                                    <p class="margint20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, et.<br />Manhattan square. 124 avenue. Bodrum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="newsletter-section"><!-- Newsletter Section -->
        			<div class="container">
        				<div class="row">
        					<div class="newsletter-top pos-center margint30">
        						<img alt="Shape Image" src="theme/img/shape.png" >
        					</div>
        					<div class="newsletter-form margint40 pos-center">
        						<div class="newsletter-wrapper">
        							<div class="pull-left">
        								<h2>Sign up newsletter</h2>
        							</div>
        							<div class="pull-left">
        								<form action="#" method="post" id="ajax-contact-form">
        									<input type="text" placeholder="Enter a e-mail address">
        									<input type="submit" value="SUBSCRIBE" >
        								</form>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div> --}}
</div>
</div>
@endsection
