@extends('juzaweb::layouts.frontend')
@section('content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head">{{ $post->getTitle() }}</h2>
        </div>
        <div class="col-md-6 reservation">
        {!! $post->getContent() !!}                                
        <h5>Extra Charges</h5>
        <ul class="list-unstyled">
						<li>- Add photo 5 KD.</li>
            <li>- Add small album 25 KD.</li>
            <li>- Add big album 35 KD.</li>
            <li>- Add flash memory 5 KD.</li>
            <li>- Brothers Package 5 KD.</li>                      
          </ul>
        </div>
        <div class="col-md-6">
        <img src="{{ $post->getThumbnail() }}" alt="{{ $post->getTitle() }}" class="img-rounded img-fluid d-block mx-auto mb-md-0 mb-3">
        </div>
        <div class="col-12 mt-4 reservation-calender-btn">
          <h5 class="shoots-Head">Session Reservation</h5>
          <div class="row d-md-flex align-items-end">
            <div class="col-md-8">
              <div class="form-group"> <!-- Date input -->
                <input type="hidden" name="package_id" id="package_id" value="{{ $post->id }}">
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" disabled />
                <div id="bookingdate"></div>
              </div>
            </div>
            <div class="col-md-4">
                <ul>
                  <li style="COLOR: #7d807d;">Available</li>
                  <li style="color: #ea9990;">Reserved</li>
                </ul>
                  </div>
            <div class="col-md-4">
              <a href="#" class="btn btn-lg btn-outline-primary btn-rounded px-4" id="booknow">Book Now</a>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
@endsection
