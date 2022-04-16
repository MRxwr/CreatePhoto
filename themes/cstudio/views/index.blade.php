@extends('juzaweb::layouts.frontend')
@section('header')

@endsection
@section('content')
        <!-- about-us -->
        <section class="about-us py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 px-xxl-5">
                        <div class="row">
                            <div class="col-xl-12 pb-5 mb-xl-5">
                                <div class="site-title position-relative d-flex align-items-center justify-content-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-300 SegoeUIL px-5 mx-2">
                                            @lang('theme::app.about-us')
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 pt-xl-4">
                                <div class="about-info bg-light py-sm-4 px-xl-5 px-sm-4 p-3">
                                    <div class="row">
                                        <div class="col-xl-10 col-sm-9 text-300">
                                            <p class="fs17 pb-3">
                                                Myshoots by Ghalia ! since 2012 
                                            </p>
                                            <p class="fs17 pb-3">
                                                The Kids Photographer is all about timeless and creative photography.
                                            </p> 
                                            <p class="fs17 pb-3">
                                                We believe that beautiful kids photography should be something that it cherished and handed down from generation to generation.
                                            </p>
                                            <p class="fs17 pb-3">
                                                Something that we show our children and their children as they grow, and a way to capture a moment in time that passes ever so quickly.
                                                Our creative team is constantly setting new trends, creating beautiful new poses and designing new props to compliment your little cuties,
                                            </p>
                                            <p class="fs17 pb-3">
                                                and help you create memories that will last a lifetime.
                                            </p>
                                        </div>
                                        <div class="col-xl-2 col-sm-3 px-xl-0 mt-4 mt-xl-0">
                                            <div class="about-img">
                                                <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/about-img.png" alt="img" class="mw-100 radius25 mt--165">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-us -->

        <!-- package-section -->
        <section class="package-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 px-xxl-5">
                        <div class="row">
                            <div class="col-xl-12 pb-5">
                                <div class="site-title position-relative d-flex align-items-center justify-content-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-300 SegoeUIL px-3">
                                            @lang('theme::app.our_packages')
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 px-xxl-5">
                        <!-- package-item -->
                            @do_action('theme.homepackages')
                        <!-- package-item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- package-section -->

        <!-- instagram-section -->
        <section class="instagram-section py-sm-5 pt-5 mb-sm-5">
            <div class="container pb-sm-3">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 px-xxl-5">
                        <div class="row">
                            <div class="col-xl-12 pb-5">
                                <div class="site-title position-relative d-flex align-items-center justify-content-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-300 SegoeUIL px-5">
                                            PICKED FOR YOU
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- instagram-item -->
                    @apply_filters('theme.instafeed.home1st')
                </div>
            </div>
        </section>
        <!-- @do_action('theme.home_packages') -->
        <!-- @apply_filters('theme.instafeed.home'); -->
  
  
@endsection
