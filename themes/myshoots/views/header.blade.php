
 <!-- Navigation -->
 <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white"> 
    <div class="container">
    <a class="navbar-brand d-lg-none" href="{{url('/')}}" title="{{ get_config('title') }}"><img src="{{ upload_url(get_config('logo')) }}" width="168" title="{{ get_config('title') }}"></a>
      <button class="ml-auto mr-3 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mx-md-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">@lang('theme::app.home')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/galleries')}}">@lang('theme::app.gallery')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/reservations-check')}}">@lang('theme::app.reservations')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/contact-us')}}">@lang('theme::app.contact-us')</a>
        </li>
        <li class="nav-item dropdown d-block d-lg-none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          en          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('/')}}?lang=ar">@lang('theme::app.arabic')</a>
            <a class="dropdown-item" href="{{url('/')}}?lang=en">@lang('theme::app.english')</a> 
          </div>
        </li>
      </ul>
    </div>
    
    <div class="d-none d-lg-block">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">en</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item ar" id="lang_ar" href="{{url('/')}}?lang=ar">@lang('theme::app.arabic')</a>
          <a class="dropdown-item en" id="lang_en" href="{{url('/')}}?lang=en">@lang('theme::app.english')</a>
          </div>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="container-fluid p-0">
      <div class="row no-gutters align-items-center">
        <div class="col-md-5 d-none d-md-block">
          <a href="{{url('/')}}" title="{{ get_config('title') }}"><img src="{{ upload_url(get_config('logo')) }}" title="{{ get_config('title') }}" class="w-25 img-fluid .d-sm-none .d-md-block mx-auto py-4"></a>
        </div>
        <div class="col-md-7">
           @do_action('theme.slider')
        </div>
      </div>
    </div>
  </header>
 