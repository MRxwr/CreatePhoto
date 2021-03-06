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
          @do_action('theme.package_data')                               
          @if($post->services)
            <h5>@lang('theme::app.extra_charges')</h5>
            <ul class="list-unstyled">
              @foreach($post->services as $service)
                  <li> {{$service->title}}  {{$service->price}} KD</li>
              @endforeach                        
            </ul>
          @endif
        </div>
        <div class="col-md-6">
        <img src="{{ $post->getThumbnail() }}" alt="{{ $post->getTitle() }}" class="img-rounded img-fluid d-block mx-auto mb-md-0 mb-3">
        </div>
        <div class="col-12 mt-4 reservation-calender-btn">
          <h5 class="shoots-Head">@lang('theme::app.session_reservation')</h5>
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
                  <li style="COLOR: #7d807d;">@lang('theme::app.available')</li>
                  <li style="color: #ea9990;">@lang('theme::app.reserved')</li>
                </ul>
                  </div>
            <div class="col-md-4">
              <a href="#" class="btn btn-lg btn-outline-primary btn-rounded px-4" id="booknow">@lang('theme::app.book_now')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
