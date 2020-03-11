<h1>photo</h1>
@extends('layouts.app')

@section('content')
<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-lower">Photo Gallery</span>
          </h2>
          <div class="form-group forms">
                <span class="section-heading-upper">Enter your booking Number:</span>
                <input type="number" class="form-control mb-2 mr-lg-2" id="book_num" placeholder="Booking Number" name="book_num" autofocus maxlength="50" required>
                <input type="submit" class="btn btn-info" value="Check Reservation">
          </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
