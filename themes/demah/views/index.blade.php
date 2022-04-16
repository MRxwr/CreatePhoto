@extends('juzaweb::layouts.frontend')
@section('header')

@endsection
@section('content')
        <!-- about-us -->
          <!-- hero_section -->
          <section class="hero_section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="hero_info pe-xl-4">
                            <h4 class="fs107 CarrinadyB text-primary">
                                About DEMAH
                            </h4>
                            <p class="fs24 mt-4">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-4">
                        <div class="hero_img">
                            <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/hero_img.png" alt="img" class="mw-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero_section -->
       


        <!-- package_section -->
        <section class="package_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fs107 CarrinadyB text-primary">
                            <!-- choose a package -->
                            @lang('theme::app.our_packages')
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-11 offset-xl-1">
                        @do_action('theme.homepackages')
                    </div>
                </div>
            </div>
        </section>
        <!-- package_section -->

        <!-- instagram-section -->
         <!-- insta_feed -->
         <section class="insta_feed py-5">
            <div class="container">
                <div class="row mb-3 pb-3">
                    <div class="col-lg-12 pb-5">
                        <h4 class="fs107 CarrinadyB text-primary">picked for you</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @apply_filters('theme.instafeed.home2nd')
            </div>
        </section>
        <!-- insta_feed -->
        <!-- @do_action('theme.home_packages') -->
        <!-- @apply_filters('theme.instafeed.home'); -->
  
  
@endsection
