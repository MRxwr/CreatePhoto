
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
           <!--@do_action('theme.home.about')-->
           @do_action('demah.theme.home.about')
         @endif
         <!-- about-us -->
         
          <!-- package_section -->
          @if(get_theme_config('is_home_package')=='yes')
            <section class="package_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="fs107 CarrinadyB text-primary SegoeUIL">
                                <!-- choose a package -->
                                @lang('theme::app.our_packages')
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-11 offset-xl-1">
                            @do_action('demah.theme.homepackages')
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- package_section -->
        
         <!-- feedback_section -->
            @if(get_theme_config('is_home_feedback')=='yes')
             
                 @do_action('theme.feedback.home.view')
                 
             @endif
         <!-- feedback_section -->
         
         <!-- insta_feed -->
         @if(get_theme_config('is_home_instagram')=='yes')
             <section class="insta_feed py-5">
                <div class="container">
                    <div class="row mb-3 pb-3">
                        <div class="col-lg-12 pb-5">
                            <h4 class="fs107 CarrinadyB text-primary SegoeUIL">@lang('theme::app.picked_for_you')</h4>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    @apply_filters('theme.instafeed.home2nd')
                </div>
            </section>
        @endif
        <!-- insta_feed -->
        
        <!-- @do_action('theme.home_packages') -->
        <!-- @apply_filters('theme.instafeed.home'); -->