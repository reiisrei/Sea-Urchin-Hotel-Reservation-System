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

        <tbody>
            @if (count($bookings) > 0)
            @foreach ($bookings as $booking)
            <tr>
                <td><a href="bookings/{{ $booking->bookingID }}">{{ $booking->bookingID }}</a></td>
                <td>{{ $booking->client->fullNmae }}</td>
                <td>{{ $booking->checkInDate }}</td>
                <td>{{ $booking->checkOutDate }}</td>
                <td><span class="badge badge-primary">{{ $booking->status }}</span></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            {!! Form::open(['action' => ['BookingController@edit', $booking->bookingID],'method' => 'GET','enctype' => 'multipart/form-data']) !!}
                            {{Form::submit('Check-out Client', ['class'=> 'dropdown-item btn btn-primary'])}}
                            {!! Form::close() !!}
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
