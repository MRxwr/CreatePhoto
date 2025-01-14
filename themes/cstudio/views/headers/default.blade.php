<header class="site-header d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-8 d-flex align-items-center">
                        <div class="site-logo">
                        <a href="{{url('/')}}" title="{{ get_config('title') }}"> <img src="{{ upload_url(get_config('logo')) }}" alt="img"  class="mw-100 d-sm-block d-none" title="{{ get_config('title') }}"> </a>
                        <a href="{{url('/')}}" title="{{ get_config('title') }}"> <img src="{{ upload_url(get_config('logo')) }}" alt="img" class="mw-100 d-sm-none d-block" title="{{ get_config('title') }}"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-4 d-flex align-items-center justify-content-xl-start justify-content-end">
                        <nav id="nav-menu" class="site-nav text-uppercase">
                            <ul id="phn-menu">
                                @if(get_theme_config('is_header_home')=="yes")
                                    <li class="active">
                                       <a class="nav-link SegoeUIL" href="{{url('/')}}">@lang('theme::app.home')</a>
                                    </li>
                                 @endif
                                 @if(get_theme_config('is_header_gallery')=="yes")
                                   <li>
                                     <a class="nav-link SegoeUIL" href="{{url('/galleries')}}">@lang('theme::app.gallery')</a>
                                  </li>
                                @endif
                                @if(get_theme_config('is_header_recheck')=="yes")
                                    <li>
                                      <a class="nav-link SegoeUIL" href="{{url('/reservations-check')}}">@lang('theme::app.reservations')</a>
                                    </li>
                                @endif
                                @if(get_theme_config('is_header_contact')=="yes")
                                  <li>
                                     <a class="nav-link SegoeUIL" href="{{url('/contact-us')}}">@lang('theme::app.contact-us')</a>
                                  </li>
                                @endif
                                @if(get_theme_config('is_header_language')=="yes")
                                  <li><a href="#"> @apply_filters('theme.language.hooks')</a>
                                  <?php 
                                  $enable_multilanguage = get_config('enable_multilanguage');
                                  if($enable_multilanguage==1){ ?>
                                   <ul>
                                     <li> <a class="dropdown-item ar SegoeUIL" id="lang_ar" href="{{URL::current()}}?lang=ar">@lang('theme::app.arabic')</a></li>
                                     <li><a class="dropdown-item en SegoeUIL" id="lang_en" href="{{URL::current()}}?lang=en">@lang('theme::app.english')</a></li> 
                                  </ul>
                                  <?php } ?>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
      <!-- hero-slider -->
      <!-- @do_action('theme.cstudio.slider') -->
      <!-- hero-slider -->