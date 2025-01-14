
<!-- Footer -->
<footer class="site_footer py-5">
    <div class="container py-lg-5 my-lg-5"> 
                <div class="row py-5">
                    <div class="col-lg-9 Montserrat fs23">
                        <ul class="social_list mb-4 d-flex align-items-center">
                            
                        @php
                            $facebook  = get_theme_config('facebook');
                            $instagram = get_theme_config('instagram');
                            $twitter   = get_theme_config('twitter');
                            $snapchat  = get_theme_config('snapchat');
                            $whatsapp  = get_theme_config('whatsapp');
                            $email     = get_theme_config('email');
                        @endphp
                            <li class="ms-4">
                                <a href="{{$instagram}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/in.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-4">
                                <a href="{{$twitter}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/tw.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-4">
                                <a href="{{$facebook}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/fb.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-4">
                                <a href="{{$snapchat}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/sn.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-4">
                                <a href="{{$whatsapp}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/wh.svg" alt="img">
                                </a>
                            </li>
                        </ul>
                        <a href="mailto:{{$email}}" class="text-muted mb-4">
                        {{$email}}
                        </a>
                        <p class="mb-4">
                            Copyright 2022 - <a href="#" class="text-dark">DEMAH studio</a> - Kuwait
                        </p>
                        <p>
                            Developed by <a href="http://create-kw.com/" target="_blank" class="text-dark">Create-kw.com</a>
                        </p>
                    </div>
                    <div class="col-lg-3 mt-lg-0 mt-4 d-lg-flex justify-content-center">
                        <!-- to top button -->
                        <a class="to_top" role="button">
                            <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/to_top.svg" alt="img">
                        </a>
                        <!-- to top button -->
                    </div>
                </div>
               
            </div>
        </footer>
       
<!-- <footer id="footer" class="clearfix">
    {{--<div class="container footer-columns">
        <div class="row container">
            @php
                $footer = theme_setting('footer');
                $facebook = get_config('facebook');
                $pinterest = get_config('pinterest');
                $twitter = get_config('twitter');
                $youtube = get_config('youtube');
            @endphp
            <div class="widget about col-xs-12 col-sm-4 col-md-4">
                <div class="footer-logo">
                    <img class="img-responsive" src="{{ upload_url(@$footer->column1->logo) }}" alt="{{ $home_tile }}"/>
                    <span class="social">
                        @if($facebook)
                        <a href="{{ $facebook }}" target="_blank" rel="nofollow"><i class="hl-facebook"></i></a>
                        @endif
                        @if($twitter)
                        <a href="{{ $twitter }}" target="_blank" rel="nofollow"><i class="hl-twitter"></i></a>
                        @endif
                        @if($pinterest)
                        <a href="{{ $pinterest }}" target="_blank" rel="nofollow"><i class="hl-pinterest"></i></a>
                        @endif
                        @if($youtube)
                        <a href="{{ $youtube }}" target="_blank" rel="nofollow"><i class="hl-youtube-play"></i></a>
                        @endif
					</span>
                </div>

                <p class="mymo-about">
                    {!! @$footer->column1->description !!}
                </p>
            </div>

            --}}{{--<div id="mymo_tagcloud_widget-2" class="widget widget_mymo_tagcloud_widget col-xs-12 col-sm-6 col-md-4">
                <h4 class="widget-title">Tag</h4>

                <div class="video-item mymo-entry-box hidden-xs">
                    <div class="item-content tagcloud">

                        <a href="/tag/banhtv" class="tag-cloud-link tag-link-5448 tag-link-position-1" style="font-size: 10pt;" aria-label=""></a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="item-content-toggle">
                        <div class="item-content-gradient"></div>
                        <span class="show-more hl-angle-down" data-icon="hl-angle-down" data-single="false"></span>
                    </div>
                </div>
            </div>--}}{{--

            <div id="text-2" class="widget widget_text col-xs-12 col-sm-6 col-md-4">
                <h4 class="widget-title">{{ @$footer->column2->column->title }}</h4>
                <div class="textwidget">
                    @if(@$footer->column2->column->ctype == 1)
                        @php
                            $menus = menu_setting(@$footer->column2->column->menu);
                        @endphp
                        @if($menus)
                        <ul class="pl-0">
                            @foreach($menus as $menu)
                            <li><a href="{{ @$menu->url }}" @if(@$menu->new_tab == 1) target="_blank" data-turbolinks="false" @endif><i class="hl-angle-right"></i> {{ @$menu->content }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    @else
                        {!! @$footer->column2->column->body !!}
                    @endif
                </div>
            </div>

            <div id="text-2" class="widget widget_text col-xs-12 col-sm-6 col-md-4">
                <h4 class="widget-title">{{ @$footer->column3->column->title }}</h4>
                <div class="textwidget">
                    @if(@$footer->column3->column->ctype == 1)
                        @php
                            $menus = menu_setting(@$footer->column3->column->menu);
                        @endphp
                        @if($menus)
                            <ul class="pl-0">
                                @foreach($menus as $menu)
                                    <li><a href="{{ @$menu->url }}" @if(@$menu->new_tab == 1) target="_blank" data-turbolinks="false" @endif><i class="hl-angle-right"></i> {{ @$menu->content }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    @else
                        {!! @$footer->column3->column->body !!}
                    @endif
                </div>
            </div>
        </div>
    </div>--}}
</footer>

<div class="footer-credit">
    <div class="container credit">
        <div class="row container">
            <div class="col-xs-12 col-sm-4 col-md-6">©
                <a id="mymothemes" href="/" title="{{--{{ $home_tile }}--}}">2016
                    <a href="/"><strong>{{--{{ $home_tile }}--}}</strong></a>
                </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-6 text-right pull-right">
                <p class="blog-info">
                    Provided by <a href="https://juzaweb.com" rel="nofollow"><strong>Juzaweb</strong></a>
                </p>
            </div>
        </div>
    </div>
</div> -->
