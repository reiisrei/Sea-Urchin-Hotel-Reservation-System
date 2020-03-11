<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ URL::asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ URL::asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('admin/css/sb-admin.css')}}" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="/dashboard">Sea Urchin Hotel - {{ strtoupper(Auth::user()->name) }}</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          {{-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button> --}}
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          {{-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a> --}}
          {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> --}}
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">{{$message_count}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="messages">View Messages</a>
            <div class="dropdown-divider"></div>

          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="settings">Settings</a>
            {{-- <a class="dropdown-item" href="#">Activity Log</a> --}}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      @if(Auth::user()->name == 'receptionist')
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
          <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
            <a class="nav-link" href="/dashboard">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
            <li class="nav-item {{Request::is('bookings') ? 'active' : ''}}">
              <a class="nav-link" href="/bookings">
                <i class="fas fa-fw fa-book"></i>
                <span>Bookings</span>
              </a>
            </li>
          {{-- <li class="nav-item {{Request::is('rooms') ? 'active' : ''}}">
            <a class="nav-link" href="/rooms">
              <i class="fas fa-fw fa-hotel"></i>
              <span>Manage Room</span></a> --}}
          </li>
          <li class="nav-item {{Request::is('messages') ? 'active' : ''}}">
            <a class="nav-link" href="/messages">
              <i class="fas fa-fw fa-envelope"></i>
              <span>Messages</span></a>
          </li>
          <li class="nav-item {{Request::is('incoming') ? 'active' : ''}}">
            <a class="nav-link" href="/incoming">
              <i class="fas fa-fw fa-envelope"></i>
              <span>Upcoming Guest</span></a>
          </li>
          <li class="nav-item {{Request::is('checkedin') ? 'active' : ''}}">
            <a class="nav-link" href="/checkedin">
              <i class="fas fa-fw fa-envelope"></i>
              <span>Checked-In Clients</span></a>
          </li>
          <li class="nav-item {{Request::is('checkedout') ? 'active' : ''}}">
            <a class="nav-link" href="/checkedout">
              <i class="fas fa-fw fa-envelope"></i>
              <span>Clients about to Check-Out</span></a>
          </li>

        </ul>
      @else
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
          <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{Request::is('bookings') ? 'active' : ''}}">
          <a class="nav-link" href="/bookings">
            <i class="fas fa-fw fa-book"></i>
            <span>Bookings</span>
          </a>
        </li>
        <li class="nav-item {{Request::is('managepayments') ? 'active' : ''}}" >
          <a class="nav-link" href="/managepayments">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>Payments</span>
          </a>
        </li>


        {{-- <li class="nav-item {{Request::is('category') ? 'active' : ''}}">
          <a class="nav-link" href="/category">
            <i class="fas fa-fw fa-bed"></i>
            <span>Add Room Category</span></a>
        </li> --}}
        {{-- <li class="nav-item {{Request::is('gallery') ? 'active' : ''}}">
          <a class="nav-link" href="/gallery">
            <i class="fas fa-fw fa-th"></i>
            <span>Gallery</span></a>
        </li> --}}
        {{-- <li class="nav-item {{Request::is('rooms') ? 'active' : ''}}">
          <a class="nav-link" href="/rooms">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Manage Room</span></a>
        </li> --}}
        <li class="nav-item {{Request::is('messages') ? 'active' : ''}}">
          <a class="nav-link" href="/messages">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Messages</span></a>
        </li>
        {{-- <li class="nav-item {{Request::is('ads') ? 'active' : ''}}">
          <a class="nav-link" href="/ads">
            <i class="fas fa-fw fa-table"></i>
            <span>Manage Ads</span></a>
        </li> --}}
        <li class="nav-item {{Request::is('reports') ? 'active' : ''}}">
          <a class="nav-link" href="/reports">
            <i class="fas fa-fw fa-chart-pie"></i>
            <span>Report</span></a>
        </li>
      </ul>
      @endif


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">{{$title}}</li>
          </ol>

        @yield('content')
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Sea Urchin Hotel 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
            <a class="btn btn-primary" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('admin/js/sb-admin.min.js')}}"></script>
    <script src={{ URL::asset('admin/js/demo/chart-area-demo.js')}}></script>
  </body>

</html>
