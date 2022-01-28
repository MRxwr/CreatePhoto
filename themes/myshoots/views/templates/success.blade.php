@extends('juzaweb::layouts.frontend')

@section('content')
@php(dd($booking = \Sbhadra\Photography\Models\Booking::find(base64_decode($_REQUEST['bsid']));))
<section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head2">@lang('theme::app.reservation_complete')
            <span class="theme-bg ml-2" style="border-radius: 30px; color:#FFF; padding: 4px 7px; font-size: 24px;">
              <i class="fa fa-check"></i>
            </span>
          </h2>
        </div>
        <div class="col-md-10 col-sm-10">
          <div class="personal-information">
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.reservation_number')</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$orderId?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.package_choosen'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$post_title?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.date'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking_date;?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.preffered_time'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking_time;?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.customer_name'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking['customer_name'];?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.mobile_number'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking['mobile_number'];?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.baby_name'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking['baby_name'];?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.baby_age'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking['baby_age'];?> Years">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label">@lang('theme::app.instructions'):</label>
              <div class="col-sm-7 col-md-8">
                <input type="text" readonly class="form-control-plaintext" id="" value="<?//=$booking['instructions'];?>">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-12 col-form-label">Note:</label>
            <div class="col-12">
              <ul class="list-unstyled h5">
                <li>- You'll receive an SMS with you reservation details.</li>
                <li>- 10 days before the session you'll get a remainder SMS with the studio location.</li>
                <li>- 10 days before the session to reschedule your reservation.</li>
              </ul>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-sm-7 col-md-6">
              <a href="{{url('/')}}" class="btn btn-lg btn-outline-primary btn-block btn-rounded">@lang('theme::app.goto_home')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>   
@endsection
