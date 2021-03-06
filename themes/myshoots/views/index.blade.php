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
  
  @apply_filters('theme.instafeed.home');
  
  <section class="pb-0">
    <div class="container" style="max-width: 1340px;">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head">@lang('theme::app.about-us')</h2>
        </div>
      </div>
    </div>
    <div class="container-fluid p-0 bg-light">
      <div class="row no-gutters align-items-center">
        <div class="col-md-7">
          <img src="/storage/2022/02/27/old-abandoned-building-photography-session-scorpio-Au0ePdEAjv8zYk7.jpg" class="img-fluid d-block mx-auto">
        </div>
        <div class="col-md-5 p-3 p-md-5">
          <h2 class="mb-5">Photography</h2>
          <h5 class="mb-4">Creative Photography Theme</h5>
            <p class="about-para"><p><b></b>CreateStudio by createKW ! since 2022&nbsp;</p><p>The Kids Photographer is all about timeless and creative photography. </p><p>We believe that beautiful kids photography should be something that it cherished and handed down from generation to generation.</p>Something that we show our children and their children as they grow, and a way to capture a moment in time that passes ever so quickly.<p>&nbsp;Our creative team is constantly setting new trends, creating beautiful new poses and designing new props to compliment your little cuties,</p><p>and help you create memories that will last a lifetime.<b></b><br></p></p>
          <a href="{{url('galleries')}}" class="btn btn-lg btn-outline-secondary px-5 mt-5">@lang('theme::app.gallery')</a>
        </div>
      </div>
    </div>
  </section>
@endsection
