         <!-- hero-slider -->
         @if(get_theme_config('is_home_slider')=='yes' || get_theme_config('is_banner_image')=='yes')
             <section class="hero-slider">
                    <div class="container-fluid">
                            <div class="row">
                                 @if(get_theme_config('is_banner_image')=='yes')
                                    <div class="{{(get_theme_config('banner_size')=='100'?'col-lg-12':'col-lg-6')}} px-0">
                                         @if(get_theme_config('banner_bg'))
                                            <img src="{{upload_url(get_theme_config('banner_bg'))}}" alt="img" class="mw-100">
                                        @else
                                            <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/hero_banner.jpg" alt="img" class="mw-100">
                                        @endif
                                    </div>
                                 @endif
                                 @if(get_theme_config('is_home_slider')=='yes' )
                                    <div class="{{(get_theme_config('slider_size')=='100'?'col-lg-12':'col-lg-6')}} px-0">
                                      @do_action('theme.Haya.slider')
                                   </div>
                               @endif
                           </div>
                    </div>
            </section> 
         @endif
        <!-- hero-slider -->
        
        <!-- about-us -->
         @if(get_theme_config('is_home_about')=='yes')
           @do_action('theme.home.about')
         @endif
         <!-- about-us -->
         
          <!-- signature_section -->
         @if(get_theme_config('is_home_signature')=='yes')
            <section class="signature_section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 d-flex justify-content-center align-items-center py-4">
                            @if(get_theme_config('signature_logo'))
                                <img src="{{upload_url(get_theme_config('signature_logo'))}}" alt="img" class="mw-100">
                            @else
                                <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/logo_big.svg" alt="img" class="mw-100">
                            @endif
                            
                        </div>
                    </div>
                </div>
            </section>
         @endif
        <!-- signature_section -->
        
        <!-- package_section -->
         @if(get_theme_config('is_home_package')=='yes')
            <section class="package-section py-5">
            <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10 px-xxl-5">
                            <div class="row">
                                <div class="col-xl-12 pb-5">
                                    <div class="site-title position-relative d-flex align-items-center justify-content-center">
                                        <div class="bg-white">
                                            <h3 class="fs30 text-600 SegoeUISB text-uppercase SegoeUIL px-5">
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
                            @do_action('theme.homepackages_haya')
                    </div>
                </div>
            </section>
         @endif
        <!-- package_section -->
        
         @if(get_theme_config('is_home_feedback')=='yes')
         
             @do_action('theme.feedback.home.view')
             
         @endif
        <!-- instagram-section -->
        
        @if(get_theme_config('is_home_instagram')=='yes')
         <!-- insta_feed -->
         <section class="instagram-section py-sm-5 pt-5 mb-sm-5">
         <div class="container pb-sm-3">
                <div class="row justify-content-center">
                    <div class="col-xl-10 px-xxl-5">
                        <div class="row">
                            <div class="col-xl-12 pb-5">
                                <div class="site-title position-relative d-flex align-items-center justify-content-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-600 SegoeUISB text-uppercase SegoeUIL px-5">
                                        @lang('theme::app.picked_for_you')
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @apply_filters('theme.instafeed.home1st')
            </div>
         </section>
        @endif
            <!-- instagram-section -->