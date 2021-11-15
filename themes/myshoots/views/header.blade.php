
 <!-- Navigation -->
 <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white"> 
    <div class="container">
    <a class="navbar-brand d-lg-none" href="index-2.html"><img src="jw-styles/theme/myshoots/assets/img/logo.png" width="168"></a>
    
      <button class="mr-auto mr-3 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mx-md-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index-2.html">الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index8e23.html?page=galleries">الألبوم</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="indexda14.html?page=reservations-check">الحجوزات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index5084.html?page=contact-us">Contact Us</a>
        </li>
        <li class="nav-item dropdown d-block d-lg-none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ar          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="indexd6cc.html?lang=ar">العربية</a>
          <a class="dropdown-item" href="index9ed2.html?lang=en">الإنجليزية</a>
            
          </div>
        </li>
      </ul>
    </div>
    <div class="d-none d-lg-block">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ar          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item ar" id="lang_ar" href="indexd6cc.html?lang=ar">العربية</a>
          <a class="dropdown-item en" id="lang_en" href="index9ed2.html?lang=en">الإنجليزية</a>
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
          <a href="{{url('/')}}"><img src="jw-styles/themes/myshoots/assets/img/logo.png" class="w-75 img-fluid .d-sm-none .d-md-block mx-auto py-4"></a>
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
                 <div class="carousel-item">
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

<!-- <header id="header">
    <div class="container">
        <div class="row" id="headwrap">
            <div class="col-md-2 col-sm-6 slogan">
                <h1 class="site-title"><a class="logo" href="/" rel="home">{{ get_config('title') }}</a></h1>
            </div>

            <div class="col-md-5 col-sm-6 mymo-search-form hidden-xs">
                <div class="header-nav">
                    <div class="col-xs-12">
                        <form id="search-form-pc" name="mymoForm" role="search" action="{{ route('search') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group col-xs-12">
                                    <input id="search" type="text" name="q" value="" class="form-control" data-toggle="tooltip" data-placement="bottom" data-original-title="@lang('theme::app.press_enter_to_search')" placeholder="@lang('theme::app.search_movies_or_tv_series')" autocomplete="off" required>
                                    <i class="animate-spin hl-spin4 hidden"></i>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="movies">
                        </form>
                        <ul class="ui-autocomplete ajax-results hidden"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 hidden-xs text-right">

                <div id="get-bookmark" class="box-shadow">
                    <i class="hl-bookmark"></i><span> @lang('theme::app.bookmark')</span>
                    <span class="count">0</span>
                </div>

                <div id="get-notification" class="box-shadow">
                    <i class="hl-bell"></i>
                    @if(Auth::check())
                        <span class="count">{{ Auth::user()->unreadNotifications()->count() }}</span>
                    @else
                        <span class="count">0</span>
                    @endif
                </div>

                <div class="user user-login-option box-shadow" id="pc-user-login">
                    <div class="dropdown">
                        @if(Auth::check())
                            <a href="javascript:void(0)" class="avt" id="userInfo2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <img src='http://1.gravatar.com/avatar/?s=20&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/?s=40&#038;d=mm&#038;r=g 2x' class='avatar avatar-20 photo avatar-default' height='20' width='20' />
                                <span class="name">@lang('theme::app.account')</span>
                            </a>
                            <ul class="dropdown-menu login-box" aria-labelledby="userInfo2">
                                @if(\Juzaweb\Models\User::find(Auth::id())->is_admin)
                                    <li><a href="{{ route('admin.dashboard') }}" data-turbolinks="false"><i class="hl-cog"></i> @lang('theme::app.admin_panel')</a></li>
                                @endif

                                <li><a href="{{ route('profile') }}"><i class="hl-user"></i> @lang('theme::app.profile')</a></li>

                                <li><a href="{{ route('logout') }}" data-turbolinks="false"><i class="hl-off"></i> @lang('theme::app.logout')</a></li>
                            </ul>
                        @else
                        <a href="javascript:void(0)" class="avt" id="userInfo">
                            <img src='http://1.gravatar.com/avatar/?s=20&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/?s=40&#038;d=mm&#038;r=g 2x' class='avatar avatar-20 photo avatar-default' height='20' width='20' />
                            <span class="name">@lang('theme::app.login')</span>
                        </a>
                        @endif
                    </div>
                </div>

                <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                    <ul style="margin: 0;"></ul>
                </div>

                <div id="notification-list" class="hidden notification-list-on-pc">
                    <ul style="margin: 0;"></ul>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="navbar-container">
    <div class="container">
        <nav class="navbar mymo-navbar main-navigation" role="navigation" data-dropdown-hover="1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#mymo" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#user-info" aria-expanded="false">
                    <span class="hl-dot-3 rotate" aria-hidden="true"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                    <span class="hl-search" aria-hidden="true"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                    <i class="hl-bookmark" aria-hidden="true"></i>
                    <span class="count">0</span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="mymo">
                <div class="menu-main-menu-container">
                    <ul id="menu-main-menu" class="nav navbar-nav navbar-left">

                        <li  class="current-menu-item active" >
                            <a title="Home" href="/" >Home</a>
                        </li>

                    </ul>
                </div>
            </div>
           
        </nav>
        <div class="collapse navbar-collapse" id="search-form">
            <div id="mobile-search-form" class="mymo-search-form"></div>
        </div>
        <div class="collapse navbar-collapse" id="user-info">
            <div id="mobile-user-login"></div>
        </div>
    </div>
</div> -->
