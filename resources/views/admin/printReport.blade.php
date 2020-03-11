<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="{{ URL::asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload="window.print()">
    <br><br><br><br><br><br>
    <table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Actual Check In Date</th>
      <th>Actual Check Out Date</th>
      <th>Amount</th>
      <th>Date</th>
    </tr>

  </thead>
  <tbody>
    @if (count($bookings) > 0)
    @foreach ($bookings as $booking)
    <tr>
        <td>{{ $booking->client->fullNmae }}</a></td>
        <td>{{ $booking->actualCheckIn }}</td>
        <td>{{ $booking->actualCheckOut }}</td>
        <td class="pull-right"> &#8369; {{ number_format($booking->Total) }}</td>
        <td>{{ $booking->created_at }}</td>
      </tr>
      @endforeach
      @endif
      <tr>
        <td>Total Client: {{$clientCount}}</td>
        <td> </td>
        <td> </td>
        <td>Total Amount:&#8369; {{number_format($totalAmount)}}</td>
      </tr>
  </tbody>
</table>
  </body>
</html>
