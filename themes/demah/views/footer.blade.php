
<!-- Footer -->
<footer class="site-footer bg-dark text-white d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-sm-6 d-flex align-items-center justify-content-center">
                        <p>
                            Powered by <a href="www.Create-kw.com" class="text-white">Create-kw.com</a>
                        </p>
                    </div>
                    <div class="col-xl-4 col-sm-6 d-flex align-items-center justify-content-center mt-4 mt-sm-0">
                        <ul class="social-list d-flex align-items-center">
                            <li class="ms-3">
                                <a href="#">
                                    <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/in.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/tw.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/fb.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/sn.svg" alt="img">
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/wh.svg" alt="img">
                                </a>
                            </li>
                        </ul>
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
