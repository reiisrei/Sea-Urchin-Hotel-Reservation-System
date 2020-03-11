@extends('admin.layouts.admin')
@section('content')
  <div class="table-responsive">
      <table style="table-layout: fixed; width: 100%" class="table table-striped table-bordered table-hover" id="myTable">
          <thead>
              <tr>
                  <th>#Booking ID</th>
                  <th>Client Name</th>
                  <th>Booked At</th>
                  <th>Booking End</th>
                  <th>Status</th>
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
                  @if ($booking->status == 'unpaid')
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

                  @endif

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
