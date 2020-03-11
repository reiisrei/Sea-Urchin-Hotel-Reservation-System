@extends('admin.layouts.admin')
@section('content')
<style media="screen">
.content{
word-wrap:break-word; /*old browsers*/
overflow-wrap:break-word;
}
.overflow-wrap-hack{
  max-width:500px;
}
</style>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-envelope"></i>
        Messages</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date</th>
              </tr>
            </tfoot>
            <tbody>
              @if (count($messages) > 0)
                @foreach ($messages as $message)
                  <tr>
                    <td style="word-wrap: break-word">{{ $message->name }}</td>
                    <td style="word-wrap: break-word">{{ $message->email }}</td>
                    <td style="word-wrap: break-word">{{ $message->subject }}</td>
                    <td class="overflow-wrap-hack"><div class="content">{{ $message->message }}</div></td>
                    <td style="word-wrap: break-word">{{ $message->created_at }}</td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


@endsection
