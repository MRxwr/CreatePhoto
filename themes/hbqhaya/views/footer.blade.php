          <!-- site-footer -->
          <footer class="site-footer bg-dark text-white d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-sm-6 d-flex align-items-center justify-content-center">
                    <p >
                            Copyright 2022 - <a href="#" class="text-dark">HayaStudio</a> 
                        
                        Developed by <a href="http://create-kw.com/" target="_blank" class="text-dark">Create-kw.com</a>
                        </p>
                    </div>
                    <div class="col-xl-4 col-sm-6 d-flex align-items-center justify-content-center mt-4 mt-sm-0">
                    <ul class="social-list d-flex align-items-center">
                            
                            @php
                                $facebook  = get_theme_config('facebook');
                                $instagram = get_theme_config('instagram');
                                $twitter   = get_theme_config('twitter');
                                $snapchat  = get_theme_config('snapchat');
                                $whatsapp  = get_theme_config('whatsapp');
                                $email  = get_theme_config('email');
                            @endphp
                            <li class="ms-3">
                                    <a href="{{$instagram}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/in.svg" alt="img">
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="{{$twitter}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/tw.svg" alt="img">
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="{{$facebook}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/fb.svg" alt="img">
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="{{$snapchat}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/sn.svg" alt="img">
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="{{$whatsapp}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/wh.svg" alt="img">
                                    </a>
                                </li>
                            </ul>
                        
                    </div>
                </div>
            </div>
        </footer>
        <!-- site-footer -->
       

