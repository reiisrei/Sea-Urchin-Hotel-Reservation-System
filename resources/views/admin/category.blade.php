@if(Auth::user()->name == 'admin')
@extends('admin.layouts.admin')
@section('content')

<hr>
<a href="/create" class="btn btn-info " role="button">Add Room Category</a></br>
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
</br>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-bed"></i>
    Category</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Room Type</th>
              <th>Rate </th>
              <th>Avaiable Rooms</th>
              <th>Allowed Children</th>
              <th>Max Adult</th>
              <th>Description</th>
            </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Room Type</th>
            <th>Rate </th>
            <th>Avaiable Rooms</th>
            <th>Allowed Children</th>
            <th>Max Adult</th>
            <th>Description</th>
          </tr>
        </tfoot>
        <tbody>
          @if (count($rooms) > 0)
          @foreach ($rooms as $room)
          <tr>
              <td style="word-wrap: break-word; font-size:30px"><a href="/category/{{ $room->id }}/edit" class="btn btn-info" role="button">Edit</a> {{ $room->roomType }}</td>
              <td style="word-wrap: break-word; font-size:30px">{{ $room->rateForNight }}</td>
              <td style="word-wrap: break-word; font-size:30px">{{ $room->availableRooms }}</td>
              <td style="word-wrap: break-word; font-size:30px">{{ $room->allowedChildren }}</td>
              <td style="word-wrap: break-word; font-size:30px">{{ $room->maxAdult }}</td>
              <td style="word-wrap: break-word; font-size:12px">{{ $room->description }}</td>
          </tr>
          @endforeach
          @else
          <td></td>
          <td></td>
          <td></td>
          @endif
        </tbody>
      </table>
      <div class="text-center">
      {{ $rooms->links() }}
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
@else
  @section('content')
    <h1><strong>You are not authorized to view this page.</strong></h1>
    <a class="btn btn-danger btn-xl" href="/dashboard"><i class="fa fa-backspace"></i> Go back!</a>
  @endsection

@endif
