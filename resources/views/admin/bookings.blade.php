@extends('admin.layouts.admin')
@section('content')
<style media="screen">
    .label.label-sm {
  font-size: 10px;
  font-weight: 600;
  padding: 6px 6px;
  margin-right: 5px;
}
  .label-success {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5) !important;
}
.label-primary {
    background: linear-gradient(45deg,#4099ff,#73b4ff) !important;
}
.label-warning {
    background: linear-gradient(45deg,#FFB64D,#ffcb80) !important;
}
.label-danger {
   background: linear-gradient(45deg,#FF5370,#ff869a) !important;
}
}

  </style>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
  function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    //Column 1
    td_1 = tr[i].getElementsByTagName("td")[0];
    //Column 2
    td_2 = tr[i].getElementsByTagName("td")[1];
    if (td_1 || td_2) {
      if (td_1.innerHTML.toUpperCase().indexOf(filter) > -1 || td_2.innerHTML.toUpperCase().indexOf(filter)> -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
$(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
<h1>Bookings </h1>
{{-- <a href="/newBooking" class="btn btn-primary  pull-right">New</a> --}}
<span><strong>Search by Name or Booking Number: </strong></span>
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="myInput" onkeyup="myFunction()">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>

<hr>
@if(session()->has('flash_message') )
  <div class="alert alert-{{ session('message.level') }} text-center">
  {!! session('flash_message') !!}
  </div>
@endif
<div class="table-responsive">
    <table style="table-layout: fixed; width: 100%" class="table table-striped table-bordered table-hover" id="myTable">
        <thead>
            <tr>
                <th>#Booking ID</th>
                <th>Client Name</th>
                <th>Booked At</th>
                <th>Booking End</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#Booking ID</th>
                <th>Client Name</th>
                <th>Booked At</th>
                <th>Booking End</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @if (count($bookings) > 0)
            @foreach ($bookings as $booking)
            <tr>
                <td><a href="bookings/{{ $booking->bookingID }}">{{ $booking->bookingID }}</a></td>
                <td>{{ $booking->client->fullNmae }}</td>
                <td>{{ $booking->checkInDate }}</td>
                <td>{{ $booking->checkOutDate }}</td>
                @if ($booking->status == 'unpaid' and $booking->bookExpire <= $current)
                  <td><span class="badge badge-danger">Booking Expired</span></td>
                @elseif ($booking->status == 'unpaid')
                    <td><span class="badge badge-info">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Waiting For Approval')
                    <td><span class="badge badge-warning">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Checked-In')
                    <td><span class="badge badge-primary">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Checked-Out')
                  <td><span class="badge badge-secondary">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Canceled')
                  <td><span class="badge badge-danger">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Payment Approved')
                  <td><span class="badge badge-success">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Booking Approved')
                  <td><span class="badge badge-success">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Rebooking Requested')
                  <td><span class="badge badge-danger">{{ $booking->status }}</span></td>
                @elseif ($booking->status == 'Rebooking Approved')
                  <td><span class="badge badge-success">{{ $booking->status }}</span></td>
                @endif

                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                          @if(Auth::user()->name == 'admin')
                            {!! Form::open(['action' => ['BookingController@update', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                            {{ Form::hidden('_method','PUT') }}
                            {{Form::submit('Check-In Client', ['class'=> 'dropdown-item btn btn-primary'])}}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['BookingController@edit', $booking->bookingID],'method' => 'GET','enctype' => 'multipart/form-data']) !!}
                            {{Form::submit('Check-out Client', ['class'=> 'dropdown-item btn btn-primary', 'target' => "_blank"])}}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['BookingController@approve', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                            {{ Form::hidden('_method','PUT') }}
                            {{Form::submit('Approve Booking', ['class'=> 'dropdown-item btn btn-primary'])}}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['BookingController@cancel', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                            {{ Form::hidden('_method','PUT') }}
                            {{Form::submit('Cancel Booking', ['class'=> 'dropdown-item btn btn-primary'])}}
                            {!! Form::close() !!}

                          @else
                            {!! Form::open(['action' => ['BookingController@update', $booking->bookingID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                            {{ Form::hidden('_method','PUT') }}
                            {{Form::submit('Check-In Client', ['class'=> 'dropdown-item btn btn-primary'])}}
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['BookingController@edit', $booking->bookingID],'method' => 'GET','enctype' => 'multipart/form-data']) !!}
                            {{Form::submit('Check-out Client', ['class'=> 'dropdown-item btn btn-primary'])}}
                            {!! Form::close() !!}

                          @endif

                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    {{-- <div class="text-center">
        {!! $bookings->render() !!}
    </div> --}}
</div>



@endsection
