        @if(get_theme_config('footer')=='default')

      <!-- site-footer -->
              <footer class="site-footer bg-dark text-white d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 offset-xl-4 col-sm-6 d-flex align-items-center justify-content-center">
                            <p> @if(get_theme_config('site_copyright'))
                                 {!!get_theme_config('site_copyright')!!} 
                               @else
                                Copyright 2022 - <a href="/" class="text-dark">HayaStudio</a> 
                               @endif
                               
                            </p>
                            
                            <p>  Developed by  <a href="https://createkuwait.com/" target="_blank" class="text-dark">CreateKuwait.com </a> </p>
                        </div>
                        <div class="col-xl-4 col-sm-6 d-flex align-items-center justify-content-center mt-4 mt-sm-0">
                        <ul class="social-list d-flex align-items-center">
                                
                                @php
                                    $facebook  = get_theme_config('facebook');
                                    $instagram = get_theme_config('instagram');
                                    $twitter   = get_theme_config('twitter');
                                    $snapchat  = get_theme_config('snapchat');
                                    $whatsapp  = get_theme_config('whatsapp');
                                    $email    =  get_theme_config('email');
                                @endphp
                                
                                 @if(get_theme_config('instagram'))
                                    <li class="ms-3">
                                        <a href="{{$instagram}}">
                                            <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/in.svg" alt="img">
                                        </a>
                                    </li>
                                 @endif
                                 @if(get_theme_config('twitter'))
                                    <li class="ms-3">
                                        <a href="{{$twitter}}">
                                            <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/tw.svg" alt="img">
                                        </a>
                                    </li>
                                 @endif
                                 @if(get_theme_config('facebook')) 
                                    <li class="ms-3">
                                        <a href="{{$facebook}}">
                                            <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/fb.svg" alt="img">
                                        </a>
                                    </li>
                                 @endif
                                 @if(get_theme_config('snapchat'))
                                    <li class="ms-3">
                                        <a href="{{$snapchat}}">
                                            <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/sn.svg" alt="img">
                                        </a>
                                    </li>
                                @endif
                                @if(get_theme_config('whatsapp'))
                                    <li class="ms-3">
                                        <a href="{{$whatsapp}}">
                                            <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/wh.svg" alt="img">
                                        </a>
                                    </li>
                                 @endif   
                                </ul>
                            
                        </div>
                    </div>
                </div>
            </footer>
            <!-- site-footer -->
 
        @endif
         @if(get_theme_config('footer')=='style_1')
          <!-- site-footer -->
          <footer class="site-footer bg-dark text-white d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-sm-6 d-flex align-items-center justify-content-center">
                        <p> @if(get_theme_config('site_copyright'))
                             {!!get_theme_config('site_copyright')!!} 
                           @else
                            Copyright 2022 - <a href="/" class="text-dark">HayaStudio</a> 
                           @endif
                           
                        </p>
                        
                        <p>  Developed by  <a href="https://createkuwait.com/" target="_blank" class="text-dark">CreateKuwait.com </a> </p>
                    </div>
                    <div class="col-xl-4 col-sm-6 d-flex align-items-center justify-content-center mt-4 mt-sm-0">
                    <ul class="social-list d-flex align-items-center">
                            
                            @php
                                $facebook  = get_theme_config('facebook');
                                $instagram = get_theme_config('instagram');
                                $twitter   = get_theme_config('twitter');
                                $snapchat  = get_theme_config('snapchat');
                                $whatsapp  = get_theme_config('whatsapp');
                                $email    =  get_theme_config('email');
                            @endphp
                            
                             @if(get_theme_config('instagram'))
                                <li class="ms-3">
                                    <a href="{{$instagram}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/in.svg" alt="img">
                                    </a>
                                </li>
                             @endif
                             @if(get_theme_config('twitter'))
                                <li class="ms-3">
                                    <a href="{{$twitter}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/tw.svg" alt="img">
                                    </a>
                                </li>
                             @endif
                             @if(get_theme_config('facebook')) 
                                <li class="ms-3">
                                    <a href="{{$facebook}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/fb.svg" alt="img">
                                    </a>
                                </li>
                             @endif
                             @if(get_theme_config('snapchat'))
                                <li class="ms-3">
                                    <a href="{{$snapchat}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/sn.svg" alt="img">
                                    </a>
                                </li>
                            @endif
                            @if(get_theme_config('whatsapp'))
                                <li class="ms-3">
                                    <a href="{{$whatsapp}}">
                                        <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/wh.svg" alt="img">
                                    </a>
                                </li>
                             @endif   
                            </ul>
                        
                    </div>
                </div>
            </div>
        </footer>
        <!-- site-footer -->
@endif

@if(get_theme_config('footer')=='style_2')

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
                            $email  = get_theme_config('email');
                        @endphp
                         @if(get_theme_config('instagram'))
                            <li class="ms-3">
                                <a href="{{$instagram}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/in.svg" alt="img">
                                </a>
                            </li>
                         @endif
                         @if(get_theme_config('twitter'))
                            <li class="ms-3">
                                <a href="{{$twitter}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/tw.svg" alt="img">
                                </a>
                            </li>
                           @endif
                           @if(get_theme_config('facebook')) 
                            <li class="ms-3">
                                <a href="{{$facebook}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/fb.svg" alt="img">
                                </a>
                            </li>
                            @endif
                            @if(get_theme_config('snapchat'))
                            <li class="ms-3">
                                <a href="{{$snapchat}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/sn.svg" alt="img">
                                </a>
                            </li>
                             @endif
                            @if(get_theme_config('whatsapp'))
                            <li class="ms-3">
                                <a href="{{$whatsapp}}">
                                    <img src="{{asset('/')}}jw-styles/themes/demah/assets/img/wh.svg" alt="img">
                                </a>
                            </li>
                            @endif   
                        </ul>
                         @if(get_theme_config('email'))
                            <a href="mailto:{{$email}}" class="text-muted mb-4">{{$email}}</a>
                         @endif   
                       
                        <p class="mb-2"> @if(get_theme_config('site_copyright'))
                             {!!get_theme_config('site_copyright')!!} 
                           @else
                            Copyright 2022 - <a href="/" class="text-dark">HayaStudio</a> 
                           @endif
                           
                        </p>
                        <!-- <p>
                            Developed by <a href="http://createkuwait.com/" target="_blank" class="text-dark">createkuwait.com</a>
                        </p> -->
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
       
 
@endif