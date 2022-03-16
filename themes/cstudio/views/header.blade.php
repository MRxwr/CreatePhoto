     <header class="site-header d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-8 d-flex align-items-center">
                        <div class="site-logo">
                        <a href="{{url('/')}}" title="{{ get_config('title') }}"> <img src="{{ upload_url(get_config('logo')) }}" alt="img" class="mw-100 d-sm-block d-none" title="{{ get_config('title') }}"> </a>
                        <a href="{{url('/')}}" title="{{ get_config('title') }}"> <img src="{{ upload_url(get_config('logo')) }}" alt="img" class="mw-100 d-sm-none d-block" title="{{ get_config('title') }}"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-4 d-flex align-items-center justify-content-end">
                        <nav id="nav-menu" class="site-nav">
                            <ul id="phn-menu">
                                <li class="active">
                                   <a class="nav-link" href="{{url('/')}}">@lang('theme::app.home')</a>
                                </li>
                                <li>
                                  <a class="nav-link" href="{{url('/galleries')}}">@lang('theme::app.gallery')</a>
                                </li>
                                <li>
                                  <a class="nav-link" href="{{url('/reservations-check')}}">@lang('theme::app.reservations')</a>
                                </li>
                                <li>
                                  <a class="nav-link" href="{{url('/contact-us')}}">@lang('theme::app.contact-us')</a>
                                </li>
                                <li><a href="#"> @apply_filters('theme.language.hooks')</a>
                                   <ul>
                                    <li> <a class="dropdown-item ar" id="lang_ar" href="{{URL::current()}}?lang=ar">@lang('theme::app.arabic')</a></li>
                                    <li><a class="dropdown-item en" id="lang_en" href="{{URL::current()}}?lang=en">@lang('theme::app.english')</a></li> 
                                  </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
      <!-- hero-slider -->
      <section class="hero-slider">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 px-0">
                        <div class="hero-slick">
                            <div class="hero-item">
                                <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/hero1.jpg" alt="img" class="mw-100 d-sm-block d-none">
                                <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/hero1_m.jpg" alt="img" class="mw-100 d-sm-none d-block">
                            </div>
                            <div class="hero-item">
                                <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/hero1.jpg" alt="img" class="mw-100 d-sm-block d-none">
                                <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/hero1_m.jpg" alt="img" class="mw-100 d-sm-none d-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero-slider -->