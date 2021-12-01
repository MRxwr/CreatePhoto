@extends('juzaweb::layouts.frontend')
@section('header')

@endsection
@section('content')
<section>
    <div class="container" style="max-width: 1340px;">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head">@lang('theme::app.our_packages')</h2>
        </div>
      </div>
      <div class="row no-gutters">
              <!-- Package Div Start -->
              @do_action('theme.home_packages')
      </div>
    </div>
  </section>
  <!--Package End-->
  <section class="pb-0">
    <div class="container" style="max-width: 1340px;">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head">@lang('theme::app.follow_us_on_instagram')</h2>
        </div>
      </div>
    </div>
  </section>
  <iframe name="frame" style="width:100%; min-height:350px;" id="frame" src="pages/insta.html" allowtransparency="true" frameborder="0"></iframe>

  <section class="pb-0">
    <div class="container" style="max-width: 1340px;">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head">About Us</h2>
        </div>
      </div>
    </div>
    <div class="container-fluid p-0 bg-light">
      <div class="row no-gutters align-items-center">
        <div class="col-md-7">
          <img src="assets/img/shoots-about.png" class="img-fluid d-block mx-auto">
        </div>
        <div class="col-md-5 p-3 p-md-5">
          <h2 class="mb-5">Photography</h2>
          <h5 class="mb-4">Creative Photography Theme</h5>
                          <p class="about-para"><p><b></b>Myshoots by Ghalia ! since 2012&nbsp;</p><p>The Kids Photographer is all about timeless and creative photography. </p><p>We believe that beautiful kids photography should be something that it cherished and handed down from generation to generation.</p>Something that we show our children and their children as they grow, and a way to capture a moment in time that passes ever so quickly.<p>&nbsp;Our creative team is constantly setting new trends, creating beautiful new poses and designing new props to compliment your little cuties,</p><p>and help you create memories that will last a lifetime.<b></b><br></p></p>
          <a href="index8e23.html?page=galleries" class="btn btn-lg btn-outline-secondary px-5 mt-5">Gallery</a>
        </div>
      </div>
    </div>
  </section>
@endsection
