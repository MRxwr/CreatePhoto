
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
          <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/galleries')}}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/reservations-check')}}">Reservations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/contact-us')}}">Contact Us</a>
        </li>
        <li class="nav-item dropdown d-block d-lg-none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          en          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('/')}}?lang=ar">Arabic</a>
            <a class="dropdown-item" href="{{url('/')}}?lang=en">English</a> 
          </div>
        </li>
      </ul>
    </div>
    
    <div class="d-none d-lg-block">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          en          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item ar" id="lang_ar" href="{{url('/')}}?lang=ar">Arabic</a>
          <a class="dropdown-item en" id="lang_en" href="{{url('/')}}?lang=en">English</a>
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
          <a href="{{url('/')}}" title="{{ get_config('title') }}"><img src="{{ upload_url(get_config('logo')) }}" title="{{ get_config('title') }}" class="w-75 img-fluid .d-sm-none .d-md-block mx-auto py-4"></a>
        </div>
        <div class="col-md-7">
          <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0"  class="active" ></li>
                        <li data-target="#demo" data-slide-to="1" ></li>
                        <li data-target="#demo" data-slide-to="2" ></li>
                        </ul>
          
            <!-- The slideshow -->
            <div class="carousel-inner">
			              <div class="carousel-item   active ">
                <img src="uploads/images/925786-52496E58-1732-4965-82AD-7B5E0CEF83B4.jpg" class="img-fluid d-block mx-auto" alt="">
              </div>
                            <div class="carousel-item  ">
                <img src="uploads/images/932085-2F77769D-4807-4FD3-B6D2-D1AC09BD134E.jpg" class="img-fluid d-block mx-auto" alt="">
              </div>
                            <div class="carousel-item  ">
                <img src="uploads/images/865304-F2C0F8A1-3D7E-4361-A994-2CE026A89D83.jpg" class="img-fluid d-block mx-auto" alt="">
              </div>
                          </div>
          
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          
          </div>
        </div>
      </div>
    </div>
  </header>
 