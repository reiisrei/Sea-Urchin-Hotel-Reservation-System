@if(Auth::user()->name == 'admin')
  @extends('admin.layouts.admin')
  @section('content')
    <hr>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Manage Ads</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed; width: 100%">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Intro</th>
                  <th>Caption</th>
                  <th>Description</th>
                  <th>Cover image</th>
                  <th>Main image</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Intro</th>
                  <th>Caption</th>
                  <th>Description</th>
                  <th>Cover image</th>
                  <th>Main image</th>
              </tr>
            </tfoot>
            <tbody>
              @if (count($ads) > 0)
              @foreach ($ads as $ad)
              <tr>
                  <td style="word-wrap: break-word; "><a href="/ads/{{ $ad->id }}/edit" class="btn btn-info" role="button">Edit</a> {{ $ad->id }}</td>
                  <td style="word-wrap: break-word;">{{ $ad->title }}</td>
                  <td style="word-wrap: break-word;">{{ $ad->intro }}</td>
                  <td style="word-wrap: break-word;">{{ $ad->caption }}</td>
                  <td style="word-wrap: break-word;">{{ $ad->description }}</td>
                  <td> <img class="img-fluid img-thumbnail" src="/storage/cover_images/{{ $ad->cover_image }}" alt=""></td>
                  <td ><img class="img-fluid img-thumbnail" src="/storage/main_images/{{ $ad->main_image }}" alt=""></td>
              </tr>
              @endforeach
              @else
                <medium class="alert alert-danger">No Advertisment</medium></br></br>
              @endif
            </tbody>
          </table>
          <div class="text-center">
          {{ $ads->links() }}
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
