@section('navbar')
  <div class="main-header"><!-- Main-header -->
    <div class="container">
      <div class="row">
        <div class="pull-left">
          <div class="logo">
            <a href="{{URL::to('/')}}"><img alt="Logo" src="theme/img/logo-light.png" class="img-responsive" /></a>
          </div>
        </div>
        <div class="pull-right">
          <div class="pull-left">
            <nav class="nav">
              <ul id="navigate" class="sf-menu navigate">
                <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{URL::to('/')}}">HOME</a></li>
                <li class="{{Request::is('therooms') ? 'active' : ''}}"><a href="{{URL::to('/therooms')}}">THE ROOMS</a></li>
                <li class="{{Request::is('thetour') ? 'active' : ''}}"><a href="{{URL::to('/thetour')}}">HUNDRED ISLAND TOUR</a></li>
                <li class="{{Request::is('checkreserve') ? 'active' : ''}}"><a href="{{URL::to('/checkreserve')}}">CHECK RESERVATION</a></li>
                <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="{{URL::to('/contact')}}">CONTACT</a></li>
              </ul>
            </nav>
          </div>
          <div class="pull-right">
            <div class="button-style-1 margint45">
              {{-- <a href="/fullCalendar"><i class="fa fa-calendar"></i>BOOK NOW</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
