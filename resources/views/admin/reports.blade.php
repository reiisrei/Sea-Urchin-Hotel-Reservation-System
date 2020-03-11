@if(Auth::user()->name == 'admin')
@extends('admin.layouts.admin')
@section('content')

{!! Form::open(['url' => '/reports/search','enctype' => 'multipart/form-data']) !!}
  <div class="row"></br></br>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="form-group">
        {{Form::date('startDate', '', ['class' => 'form-control input-lg', 'placeholder' => 'Room Type', 'autofocus' , 'tabindex' => '1'])}}
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="form-group">
         {{Form::date('endDate', '', ['class' => 'form-control input-lg', 'placeholder' => 'Room Type', 'autofocus' , 'tabindex' => '1'])}}
      </div>
    </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="form-group">
      {{Form::submit('Generate Report', ['class'=> 'btn btn-primary py-3 px-5', 'tabindex' => '13'])}}
    </div>
          </div>
  </div>
{!! Form::close() !!}
  <hr>
@if ($totalAmount != 0)
  <h1>Total Client: {{$clientCount}}</h1><h1>Money Earned:&#8369; {{number_format($totalAmount)}}</h1>
@endif
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-pie"></i>
      Report</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Actual Check In Date</th>
                  <th>Actual Check Out Date</th>
                  <th>Total Amount</th>
                  <th>Date</th>
              </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Name</th>
                <th>Actual Check In Date</th>
                <th>Actual Check Out Date</th>
                <th>Total Amount</th>
                <th>Date</th>
            </tr>
          </tfoot>
          <tbody>
            @if (count($bookings) > 0)
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->client->fullNmae }}</a></td>
                <td>{{ $booking->actualCheckIn }}</td>
                <td>{{ $booking->actualCheckOut }}</td>
                <td>{{ $booking->Total }}</td>
                <td>{{ $booking->created_at }}</td>
              </tr>
              @endforeach
              @endif
          </tbody>
        </table>
      </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
  </div>

@endsection
@else
  @section('content')
    <h1><strong>You are not authorized to view this page.</strong></h1>
    <a class="btn btn-danger btn-xl" href="/dashboard"><i class="fa fa-backspace"></i> Go back!</a>
  @endsection

@endif
