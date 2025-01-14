<?php

namespace Sbhadra\Feedback\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Feedback\Models\Feedback;
use Sbhadra\Feedback\Models\FeedbackPage;
use Sbhadra\Photography\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
          $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerCalender']);
          $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'randerFeedBackForm']);
          $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'randerFeedBackFormSubmit']);
          $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'randerFeedBackHomeViews']);
          $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'randerFeedBackViews']);
 
    }

    public function registerCalender()
    {
        HookAction::registerPostType('feedbacks', [
            'label' => trans('sbfe::content.feedbacks'),
            'model' => Feedback::class,
            'menu_position' => 32.1,
            'menu_icon' => 'fa fa-comment',
        ]);
        HookAction::registerPostType('feedback-pages', [
            'label' => trans('sbfe::content.feedback_page'),
            'model' => FeedbackPage::class,
            'menu_position' => 32.1,
            'menu_icon' => 'fa fa-link',
        ]);
        HookAction::registerThemeTemplate('feedback', [
            'name' => 'Feedback',
            'view' => 'templates.feedbacks',
        ]);
        HookAction::registerThemeTemplate('feedback_form', [
            'name' => 'Feedback Form',
            'view' => 'templates.feedback-form',
        ]);
    } 
    public function randerFeedBackForm(){
        
        $this->addAction('theme.feedback.form', function($model) {
            $html='';
            if(isset($_REQUEST['slug'])){
                $code =$_REQUEST['slug'];
                $fbform = FeedbackPage::where('slug',$code)->where('status','publish')->first();
                if( $fbform){
                if($this->checkFormSlug($_REQUEST['slug'])){
                    $packages = Package::whereIn('status',['publish','private'])->get();
                    $option='';
                    foreach($packages as $package){
                        $option .='<option value="'. $package->id.'"> '. $package->title.' </option>';
                    }
                    $html .='<div class="form_header">Demah Studio Feedback Form </header>
                        <form action="" method="post" enctype="multipart/form-data" id="form" class="topBefore">
                       '.csrf_field().'
                        <div class="profile_image" id="preview-image"><img src="'.url('default-avatar.jpg').'"></div>
                            <input type="file" name="image" id="image-input" >
                            <input name="code" type="hidden" value="'.$code.'">
                            <input id="name" name="name" type="text" placeholder="'.trans('theme::app.customer_name').'" required>
                            <select name="package_id" id="package_id" required>
                                <option value=""> '.trans('theme::app.package_chosen').' </option>
                                '.$option.'
                            </select>
                            <textarea id="message" name="message" type="text" placeholder="'.trans('theme::app.message').'" required></textarea>
                            <input id="submit" type="submit" value="'.trans('theme::app.feedback_go').'">
                        </form>';    
                }else{
                    $html .='<div class="col-xxl-7 px-xxl-4">This form already used </div>';
                }
                 
            }else{
                $html .='<div class="col-xxl-7 px-xxl-4">Feedback form not exist</div>';
            }
        }else{
            $html .='<div class="col-xxl-7 px-xxl-4">form slug not passed</div>';
        }
            echo $html;
        }, 10, 1);

        add_action('theme.header', function() {
            $html = '<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
            <style>
            @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400);

            input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
              color: #aca49c;
              font-size: 0.875em;
            }
            
            input:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder {
              color: #bbb5af;
            }
            
            input::-moz-placeholder, textarea::-moz-placeholder {
              color: #aca49c;
              font-size: 0.875em;
            }
            
            input:focus::-moz-placeholder, textarea:focus::-moz-placeholder {
              color: #bbb5af;
            }
            
            input::placeholder, textarea::placeholder {
              color: #aca49c;
              font-size: 0.875em;
            }
            
            input:focus::placeholder, textarea::focus:placeholder {
              color: #bbb5af;
            }
            
            input::-ms-placeholder, textarea::-ms-placeholder {
              color: #aca49c;
              font-size: 0.875em;
            }
            
            input:focus::-ms-placeholder, textarea:focus::-ms-placeholder {
              color: #bbb5af;
            }
            
            /* on hover placeholder */
            
            input:hover::-webkit-input-placeholder, textarea:hover::-webkit-input-placeholder {
              color: #e2dedb;
              font-size: 0.875em;
            }
            
            input:hover:focus::-webkit-input-placeholder, textarea:hover:focus::-webkit-input-placeholder {
              color: #cbc6c1;
            }
            
            input:hover::-moz-placeholder, textarea:hover::-moz-placeholder {
              color: #e2dedb;
              font-size: 0.875em;
            }
            
            input:hover:focus::-moz-placeholder, textarea:hover:focus::-moz-placeholder {
              color: #cbc6c1;
            }
            
            input:hover::placeholder, textarea:hover::placeholder {
              color: #e2dedb;
              font-size: 0.875em;
            }
            
            input:hover:focus::placeholder, textarea:hover:focus::placeholder {
              color: #cbc6c1;
            }
            
            input:hover::placeholder, textarea:hover::placeholder {
              color: #e2dedb;
              font-size: 0.875em;
            }
            
            input:hover:focus::-ms-placeholder, textarea:hover::focus:-ms-placeholder {
              color: #cbc6c1;
            }
            
            .form_header {
              position: relative;
              margin: 100px 0 25px 0;
              font-size: 2.3em;
              text-align: center;
              letter-spacing: 7px;
            }
            
            #form {
              position: relative;
              width: 500px;
              margin: 50px auto 100px auto;
            }
            .profile_image{
                width: 120px;
                height: 120px;
                border-radius: 4%;
                border: solid 1px #b3aca7;
                margin:10px auto;
            }
            .profile_image:hover {
                background: #b3aca7;
                color: #e2dedb;
              }
            .profile_image img{
                width: 120px;
                height: 120px;
                border-radius: 4%;
            }
            input {
              font-family: "Lato", sans-serif;
              font-size: 0.875em;
              width: 470px;
              height: 50px;
              padding: 0px 15px 0px 15px;
              
              background: transparent;
              outline: none;
              color: #726659;
              
              border: solid 1px #b3aca7;
              border-bottom: none;
              
              transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
            }
            
            input:hover {
              background: #b3aca7;
              color: #e2dedb;
            }
            select {
                font-family: "Lato", sans-serif;
                font-size: 0.875em;
                width: 470px;
                height: 50px;
                padding: 0px 15px 0px 15px;
                
                background: transparent;
                outline: none;
                color: #726659;
                
                border: solid 1px #b3aca7;
                border-bottom: none;
                
                transition: all 0.3s ease-in-out;
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -ms-transition: all 0.3s ease-in-out;
              }
            
            textarea {
              width: 470px;
              max-width: 470px;
              height: 110px;
              max-height: 110px;
              padding: 15px;
              
              background: transparent;
              outline: none;
              
              color: #726659;
              font-family: "Lato", sans-serif;
              font-size: 0.875em;
              
              border: solid 1px #b3aca7;
              
              transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
            }
            
            textarea:hover {
              background: #b3aca7;
              color: #e2dedb;
            }
            
            #submit {
              width: 470px;
              
              padding: 0;
              margin: -5px 0px 0px 0px;
              
              font-family: "Lato", sans-serif;
              font-size: 0.875em;
              color: #b3aca7;
              
              outline:none;
              cursor: pointer;
              
              border: solid 1px #b3aca7;
              border-top: none;
            }
            
            #submit:hover {
              color: #e2dedb;
            }
            @media only screen and (max-width: 600px) {
              #form {
                 width: 100%;
                 
                 }
               input {
                  width: 100%;
               }
               textarea {
                width: 100%;
               }
               select {
                    width: 100%;
                }
               #submit {
                    width: 100%;
                 }
            }
            </style>';
           echo  $html;
        }, 11, 1);
        add_action('theme.footer', function() {
            $html = '<script>
                       
                    </script>';
           echo  $html;
        }, 101, 1);
        
    }
    public function randerFeedBackHomeViews(){
        $this->addAction('theme.feedback.home.view', function($model) {
            $html='';
            $feedbacks=Feedback::where('status','publish')->orderBy('created_at', 'DESC')->take(10)->get();
            
            if(count($feedbacks)>0){
                //dd($feedbacks);
                $html .='<section class="insta_feedback py-5">
                    <div class="container">
                        <div class="row mb-3 pb-3">
                            <div class="col-lg-12 pb-5">
                                <h4 id="sectionh4" class="fs107 CarrinadyB text-primary SegoeUIL">'.trans('theme::app.feedbacks').'</h4>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                         <div id="testim" class="testim">
                            <div class="testim-cover">
                               <div class="wrap">
                                   <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                                   <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                                   <ul id="testim-dots" class="dots">';
                                    foreach($feedbacks as $k=>$feedback){
                                        $html .='<li class="dot '.($k==0?'active':'').'"></li>';
                                    }
                                       
                                    $html .='</ul>
                                   <div id="testim-content" class="cont">';
                                    foreach($feedbacks as $key=>$feedback){  
                                    $html .='<div class="item active">
                                           <div class="img"><img src="'.url($feedback->thumbnail).'" alt=""></div>
                                           <h2 class="fs24">'.$feedback->title.'</h2>
                                           <h2 class="fs24">'.$feedback->package->title.'</h2>
                                           <div style="height:130px"><p class="fs20">'.$feedback->content.'</p></div>
                                           <p class="fs20" style="position: relative;top: 25px;">'.jw_date_format($feedback->created_at).'</p>
                                       </div>';
                                    } 
                                    $html .='</div>
                                  
                               </div>
                               
                            </div>
                            <div class="all_feedback">
                                  <a href="'.url('/feedbacks').'" class="btn btn-xl btn-primary mt-3 fs24">'.trans('theme::app.feedback_all').'</a>
                            </div>
                        </div>
                    </div>
                </section>';
            }
            
            echo $html;
        }, 10, 1);

        add_action('theme.header', function() {
            $html = '<style>
                        .insta_feed {margin-top:125px}
                        .testim {
                            width: 85%;
                            height:270px;
                            margin: auto;
                            -webkit-transform: translatey(-50%);
                            -moz-transform: translatey(-50%);
                            -ms-transform: translatey(-50%);
                            -o-transform: translatey(-50%);
                            transform: translatey(-50%);
                            
                        }
                    
                    .testim .wrap {
                        position: relative;
                        width: 100%;
                        max-width: 1020px;
                        padding: 40px 20px;
                        margin: auto;
                    }
                    .all_feedback{
                        width: 100%;
                        margin: auto;
                        text-align: center;
                        margin:25px 10px;
                    }
                    
                    .all_feedback a{
                        height: 56px !important;
                        width: 300px!important;
                        overflow: hidden;
                    }
                    
                    .testim .arrow {
                        display: block;
                        position: absolute;
                        color: #DBD6D0;
                        cursor: pointer;
                        font-size: 2em;
                        top: 50%;
                        -webkit-transform: translateY(-50%);
                            -ms-transform: translateY(-50%);
                            -moz-transform: translateY(-50%);
                            -o-transform: translateY(-50%);
                            transform: translateY(-50%);
                        -webkit-transition: all .3s ease-in-out;    
                        -ms-transition: all .3s ease-in-out;    
                        -moz-transition: all .3s ease-in-out;    
                        -o-transition: all .3s ease-in-out;    
                        transition: all .3s ease-in-out;
                        padding: 5px;
                        z-index: 22222222;
                    }
                    
                    .testim .arrow:before {
                            cursor: pointer;
                    }
                    
                    .testim .arrow:hover {
                        color: green;
                    }
                        
                    
                    .testim .arrow.left {
                        left: 70px;
                    }
                    
                    .testim .arrow.right {
                        right: 70px;
                    }
                    
                    .testim .dots {
                        text-align: center;
                        position: absolute;
                        width: 100%;
                        bottom: 15px;
                        left: 0;
                        display: block;
                        z-index: 3333;
                            height: 12px;
                    }
                    
                    .testim .dots .dot {
                        list-style-type: none;
                        display: inline-block;
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        border: 1px solid #DBD6D0;
                        margin: 0 10px;
                        cursor: pointer;
                        -webkit-transition: all .5s ease-in-out;    
                        -ms-transition: all .5s ease-in-out;    
                        -moz-transition: all .5s ease-in-out;    
                        -o-transition: all .5s ease-in-out;    
                        transition: all .5s ease-in-out;
                            position: relative;
                    }
                    .item {
                        height: 100%;
                      }
                      
                    
                    
                    .testim .dots .dot.active,
                    .testim .dots .dot:hover {
                        background: #DBD6D0;
                        border-color: #DBD6D0;
                    }
                    
                    .testim .dots .dot.active {
                        -webkit-animation: testim-scale .5s ease-in-out forwards;   
                        -moz-animation: testim-scale .5s ease-in-out forwards;   
                        -ms-animation: testim-scale .5s ease-in-out forwards;   
                        -o-animation: testim-scale .5s ease-in-out forwards;   
                        animation: testim-scale .5s ease-in-out forwards;   
                    }
                    
                    #testim-content {
                          width: 400px;
                          margin: auto;
                          height: 415px;
                          border: 1px solid #DBD6D0;
                          border-radius: 3px;
                        }    
                    .testim .cont {
                        position: relative;
                            overflow: hidden;
                    }
                    
                    .testim .cont > div {
                        text-align: center;
                        position: absolute;
                        top: 0;
                        left: 0;
                        padding: 0 0 70px 0;
                        opacity: 0;
                     }
                    
                    .testim .cont > div.inactive {
                        opacity: 1;
                    }
                        
                    
                    .testim .cont > div.active {
                        position: relative;
                        opacity: 1;
                    }
                        
                    .testim .cont div .img {
                        margin: 10px;
                    }
                    .testim .cont div .img img {
                        display: block;
                        width: 75px;
                        height: 75px;
                        margin: auto;
                        border-radius: 50%;
                    }
                    
                    .testim .cont div h2 {
                        color: #000;
                        font-size: 30px;
                        margin: 15px 0;
                    }
                    
                    .testim .cont div p {
                        font-size: 20px;
                        color: #333;
                        width: 90%;
                        margin: auto;
                    }
                    
                    .testim .cont div.active .img img {
                        -webkit-animation: testim-show .5s ease-in-out forwards;            
                        -moz-animation: testim-show .5s ease-in-out forwards;            
                        -ms-animation: testim-show .5s ease-in-out forwards;            
                        -o-animation: testim-show .5s ease-in-out forwards;            
                        animation: testim-show .5s ease-in-out forwards;            
                    }
                    
                    .testim .cont div.active h2 {
                        -webkit-animation: testim-content-in .4s ease-in-out forwards;    
                        -moz-animation: testim-content-in .4s ease-in-out forwards;    
                        -ms-animation: testim-content-in .4s ease-in-out forwards;    
                        -o-animation: testim-content-in .4s ease-in-out forwards;    
                        animation: testim-content-in .4s ease-in-out forwards;    
                    }
                    
                    .testim .cont div.active p {
                        -webkit-animation: testim-content-in .5s ease-in-out forwards;    
                        -moz-animation: testim-content-in .5s ease-in-out forwards;    
                        -ms-animation: testim-content-in .5s ease-in-out forwards;    
                        -o-animation: testim-content-in .5s ease-in-out forwards;    
                        animation: testim-content-in .5s ease-in-out forwards;    
                    }
                    
                    .testim .cont div.inactive .img img {
                        -webkit-animation: testim-hide .5s ease-in-out forwards;            
                        -moz-animation: testim-hide .5s ease-in-out forwards;            
                        -ms-animation: testim-hide .5s ease-in-out forwards;            
                        -o-animation: testim-hide .5s ease-in-out forwards;            
                        animation: testim-hide .5s ease-in-out forwards;            
                    }
                    
                    .testim .cont div.inactive h2 {
                        -webkit-animation: testim-content-out .4s ease-in-out forwards;        
                        -moz-animation: testim-content-out .4s ease-in-out forwards;        
                        -ms-animation: testim-content-out .4s ease-in-out forwards;        
                        -o-animation: testim-content-out .4s ease-in-out forwards;        
                        animation: testim-content-out .4s ease-in-out forwards;        
                    }
                    
                    .testim .cont div.inactive p {
                        -webkit-animation: testim-content-out .5s ease-in-out forwards;    
                        -moz-animation: testim-content-out .5s ease-in-out forwards;    
                        -ms-animation: testim-content-out .5s ease-in-out forwards;    
                        -o-animation: testim-content-out .5s ease-in-out forwards;    
                        animation: testim-content-out .5s ease-in-out forwards;    
                    }
                    
                    @-webkit-keyframes testim-scale {
                        0% {
                            -webkit-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -webkit-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -webkit-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -webkit-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-moz-keyframes testim-scale {
                        0% {
                            -moz-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -moz-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -moz-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -moz-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-ms-keyframes testim-scale {
                        0% {
                            -ms-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -ms-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -ms-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -ms-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-o-keyframes testim-scale {
                        0% {
                            -o-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -o-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -o-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -o-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @keyframes testim-scale {
                        0% {
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-webkit-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -webkit-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -webkit-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @-moz-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -moz-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -moz-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @-ms-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -ms-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -ms-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @-o-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -o-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -o-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @keyframes testim-content-in {
                        from {
                            opacity: 0;
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            transform: translateY(0);        
                        }
                    }
                    
                    @-webkit-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -webkit-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            -webkit-transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-moz-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -moz-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            -moz-transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-ms-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -ms-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            -ms-transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-o-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -o-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @keyframes testim-content-out {
                        from {
                            opacity: 1;
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-webkit-keyframes testim-show {
                        from {
                            opacity: 0;
                            -webkit-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -webkit-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @-moz-keyframes testim-show {
                        from {
                            opacity: 0;
                            -moz-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -moz-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @-ms-keyframes testim-show {
                        from {
                            opacity: 0;
                            -ms-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -ms-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @-o-keyframes testim-show {
                        from {
                            opacity: 0;
                            -o-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -o-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @keyframes testim-show {
                        from {
                            opacity: 0;
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            transform: scale(1);       
                        }
                    }
                    
                    @-webkit-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -webkit-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -webkit-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @-moz-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -moz-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -moz-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @-ms-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -ms-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -ms-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @-o-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -o-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -o-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @keyframes testim-hide {
                        from {
                            opacity: 1;
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            transform: scale(0);
                        }
                    }
                    
                    @media all and (max-width: 300px) {
                        body {
                            font-size: 14px;
                        }
                    }
                    
                    @media all and (max-width: 500px) {
                        .testim .arrow {
                            font-size: 1.5em;
                        }
                        
                        .testim .cont div p {
                            line-height: 25px;
                        }
                        .testim {
                            width: 95%;
                        }
                        .testim .wrap {
                          padding: 65px 20px;
                        }
                        #testim-content {
                          width: 100%;
                          height: 350px;
                          
                        }
                        .testim .arrow.left {
                             left: -10px;
                        }
                        .testim .arrow.right {
                          right: -10px;
                        }
                    
                    }
                </style>';
           echo  $html;
        }, 11, 1);
        add_action('theme.footer', function() {
            $html = '<script src="https://use.fontawesome.com/1744f3f671.js"></script>
            <script>
            // vars
            "use strict"
            var	testim = document.getElementById("testim"),
                testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
                testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
                testimLeftArrow = document.getElementById("left-arrow"),
                testimRightArrow = document.getElementById("right-arrow"),
                testimSpeed = 4500,
                currentSlide = 0,
                currentActive = 0,
                testimTimer,
                    touchStartPos,
                    touchEndPos,
                    touchPosDiff,
                    ignoreTouch = 30;
            ;
            
            window.onload = function() {
            
                // Testim Script
                function playSlide(slide) {
                    for (var k = 0; k < testimDots.length; k++) {
                        testimContent[k].classList.remove("active");
                        testimContent[k].classList.remove("inactive");
                        testimDots[k].classList.remove("active");
                    }
            
                    if (slide < 0) {
                        slide = currentSlide = testimContent.length-1;
                    }
            
                    if (slide > testimContent.length - 1) {
                        slide = currentSlide = 0;
                    }
            
                    if (currentActive != currentSlide) {
                        testimContent[currentActive].classList.add("inactive");            
                    }
                    testimContent[slide].classList.add("active");
                    testimDots[slide].classList.add("active");
            
                    currentActive = currentSlide;
                
                    clearTimeout(testimTimer);
                    testimTimer = setTimeout(function() {
                        playSlide(currentSlide += 1);
                    }, testimSpeed)
                }
            
                testimLeftArrow.addEventListener("click", function() {
                    playSlide(currentSlide -= 1);
                })
            
                testimRightArrow.addEventListener("click", function() {
                    playSlide(currentSlide += 1);
                })    
            
                for (var l = 0; l < testimDots.length; l++) {
                    testimDots[l].addEventListener("click", function() {
                        playSlide(currentSlide = testimDots.indexOf(this));
                    })
                }
            
                playSlide(currentSlide);
            
                // keyboard shortcuts
                document.addEventListener("keyup", function(e) {
                    switch (e.keyCode) {
                        case 37:
                            testimLeftArrow.click();
                            break;
                            
                        case 39:
                            testimRightArrow.click();
                            break;
            
                        case 39:
                            testimRightArrow.click();
                            break;
            
                        default:
                            break;
                    }
                })
                    
                    testim.addEventListener("touchstart", function(e) {
                            touchStartPos = e.changedTouches[0].clientX;
                    })
                
                    testim.addEventListener("touchend", function(e) {
                            touchEndPos = e.changedTouches[0].clientX;
                        
                            touchPosDiff = touchStartPos - touchEndPos;
                        
                            console.log(touchPosDiff);
                            console.log(touchStartPos);	
                            console.log(touchEndPos);	
            
                        
                            if (touchPosDiff > 0 + ignoreTouch) {
                                    testimLeftArrow.click();
                            } else if (touchPosDiff < 0 - ignoreTouch) {
                                    testimRightArrow.click();
                            } else {
                                return;
                            }
                        
                    })
            }
                    </script>';
           echo  $html;
        }, 101, 1);

    }
    public function randerFeedBackViews(){
        $this->addAction('theme.feedback.view', function($model) {
            $html='';
            $feedbacks=Feedback::where('status','publish')->orderBy('created_at', 'DESC')->paginate(9);
            
            if(count($feedbacks)>0){
                //dd($feedbacks);
                $html .='<section class="insta_feed py-5">
                    <div class="container">';
                                    $html .='
                                    <div class="feedback">
                                   <div  class="row">';
                                    foreach($feedbacks as $key=>$feedback){  
                                    $html .='<div class="col-sm-12 col-md-4">
                                            <div class="item">
                                               <div class="img"><img src="'.url($feedback->thumbnail).'" alt=""></div>
                                                   <h2 class="fs24">'.$feedback->title.'</h2>
                                                   <h2 class="fs24">'.$feedback->package->title.'</h2>
                                                   <div style="height:130px"><p class="fs20">'.$feedback->content.'</p></div>
                                                   <p class="fs20" style="position: relative;top: 50px;">'.jw_date_format($feedback->created_at).'</p>
                                                </div>
                                            </div>';
                                    } 
                                    $html .='</div>
                                    </div>
                        <div class="row"><div class="col-md-12"> '.$feedbacks->links().'</div></div>
                    </div>
                </section>';
            }
            
            echo $html;
        }, 10, 1);

        add_action('theme.header', function() {
            $html = '<style>
                      
                    .feedback .item {
                        margin:15px 0px;
                        text-align: center;
                        height: 415px;
                        border: 1px solid #DBD6D0;
                        border-radius: 3px;
                        padding:10px;
                      }
                    
                    .feedback  > div.inactive {
                        opacity: 1;
                    }
                        
                    
                    .feedback  > div.active {
                        position: relative;
                        opacity: 1;
                    }
                        
                    .feedback  div .img {
                        margin: 10px;
                    }
                    .feedback  div .img img {
                        display: block;
                        width: 75px;
                        height: 75px;
                        margin: auto;
                        border-radius: 50%;
                    }
                    
                    .feedback  div h2 {
                        color: #000;
                        font-size: 30px;
                        margin: 15px 0;
                    }
                    
                    .testim  div p {
                        font-size: 20px;
                        color: #333;
                        width: 90%;
                        margin: auto;
                    }
                    
                    .testim div.active .img img {
                        -webkit-animation: testim-show .5s ease-in-out forwards;            
                        -moz-animation: testim-show .5s ease-in-out forwards;            
                        -ms-animation: testim-show .5s ease-in-out forwards;            
                        -o-animation: testim-show .5s ease-in-out forwards;            
                        animation: testim-show .5s ease-in-out forwards;            
                    }
                    
                    .testim  div.active h2 {
                        -webkit-animation: testim-content-in .4s ease-in-out forwards;    
                        -moz-animation: testim-content-in .4s ease-in-out forwards;    
                        -ms-animation: testim-content-in .4s ease-in-out forwards;    
                        -o-animation: testim-content-in .4s ease-in-out forwards;    
                        animation: testim-content-in .4s ease-in-out forwards;    
                    }
                    
                    .testim  div.active p {
                        -webkit-animation: testim-content-in .5s ease-in-out forwards;    
                        -moz-animation: testim-content-in .5s ease-in-out forwards;    
                        -ms-animation: testim-content-in .5s ease-in-out forwards;    
                        -o-animation: testim-content-in .5s ease-in-out forwards;    
                        animation: testim-content-in .5s ease-in-out forwards;    
                    }
                    
                    .testim  div.inactive .img img {
                        -webkit-animation: testim-hide .5s ease-in-out forwards;            
                        -moz-animation: testim-hide .5s ease-in-out forwards;            
                        -ms-animation: testim-hide .5s ease-in-out forwards;            
                        -o-animation: testim-hide .5s ease-in-out forwards;            
                        animation: testim-hide .5s ease-in-out forwards;            
                    }
                    
                    .testim  div.inactive h2 {
                        -webkit-animation: testim-content-out .4s ease-in-out forwards;        
                        -moz-animation: testim-content-out .4s ease-in-out forwards;        
                        -ms-animation: testim-content-out .4s ease-in-out forwards;        
                        -o-animation: testim-content-out .4s ease-in-out forwards;        
                        animation: testim-content-out .4s ease-in-out forwards;        
                    }
                    
                    .testim .cont div.inactive p {
                        -webkit-animation: testim-content-out .5s ease-in-out forwards;    
                        -moz-animation: testim-content-out .5s ease-in-out forwards;    
                        -ms-animation: testim-content-out .5s ease-in-out forwards;    
                        -o-animation: testim-content-out .5s ease-in-out forwards;    
                        animation: testim-content-out .5s ease-in-out forwards;    
                    }
                    ul.pagination{
                        padding: 15px;
                    }
                    .page-link {
                          position: relative;
                          display: block;
                          color: #000;
                          text-decoration: none;
                          background-color: #fff;
                          border: 1px solid #dee2e6;
                          transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                        }
                    .pagination li.page-item a {
                        height: 35px !important;
                    }
                    .page-item.active .page-link {
                      z-index: 3;
                      color: #fff;
                      background-color: #DBD6D0;
                      border-color: #DBD6D0;
                    }
                                        
                    @-webkit-keyframes testim-scale {
                        0% {
                            -webkit-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -webkit-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -webkit-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -webkit-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-moz-keyframes testim-scale {
                        0% {
                            -moz-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -moz-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -moz-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -moz-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-ms-keyframes testim-scale {
                        0% {
                            -ms-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -ms-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -ms-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -ms-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-o-keyframes testim-scale {
                        0% {
                            -o-box-shadow: 0px 0px 0px 0px #eee;
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            -o-box-shadow: 0px 0px 10px 5px #eee;        
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            -o-box-shadow: 0px 0px 10px 5px #ea830e;        
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            -o-box-shadow: 0px 0px 0px 0px #ea830e;        
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @keyframes testim-scale {
                        0% {
                            box-shadow: 0px 0px 0px 0px #eee;
                        }
                    
                        35% {
                            box-shadow: 0px 0px 10px 5px #eee;        
                        }
                    
                        70% {
                            box-shadow: 0px 0px 10px 5px #ea830e;        
                        }
                    
                        100% {
                            box-shadow: 0px 0px 0px 0px #ea830e;        
                        }
                    }
                    
                    @-webkit-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -webkit-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -webkit-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @-moz-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -moz-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -moz-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @-ms-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -ms-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -ms-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @-o-keyframes testim-content-in {
                        from {
                            opacity: 0;
                            -o-transform: translateY(100%);
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            -o-transform: translateY(0);        
                            transform: translateY(0);        
                        }
                    }
                    
                    @keyframes testim-content-in {
                        from {
                            opacity: 0;
                            transform: translateY(100%);
                        }
                        
                        to {
                            opacity: 1;
                            transform: translateY(0);        
                        }
                    }
                    
                    @-webkit-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -webkit-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            -webkit-transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-moz-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -moz-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            -moz-transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-ms-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -ms-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            -ms-transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-o-keyframes testim-content-out {
                        from {
                            opacity: 1;
                            -o-transform: translateY(0);
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            transform: translateY(-100%);        
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @keyframes testim-content-out {
                        from {
                            opacity: 1;
                            transform: translateY(0);
                        }
                        
                        to {
                            opacity: 0;
                            transform: translateY(-100%);        
                        }
                    }
                    
                    @-webkit-keyframes testim-show {
                        from {
                            opacity: 0;
                            -webkit-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -webkit-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @-moz-keyframes testim-show {
                        from {
                            opacity: 0;
                            -moz-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -moz-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @-ms-keyframes testim-show {
                        from {
                            opacity: 0;
                            -ms-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -ms-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @-o-keyframes testim-show {
                        from {
                            opacity: 0;
                            -o-transform: scale(0);
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            -o-transform: scale(1);       
                            transform: scale(1);       
                        }
                    }
                    
                    @keyframes testim-show {
                        from {
                            opacity: 0;
                            transform: scale(0);
                        }
                        
                        to {
                            opacity: 1;
                            transform: scale(1);       
                        }
                    }
                    
                    @-webkit-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -webkit-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -webkit-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @-moz-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -moz-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -moz-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @-ms-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -ms-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -ms-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @-o-keyframes testim-hide {
                        from {
                            opacity: 1;
                            -o-transform: scale(1);       
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            -o-transform: scale(0);
                            transform: scale(0);
                        }
                    }
                    
                    @keyframes testim-hide {
                        from {
                            opacity: 1;
                            transform: scale(1);       
                        }
                        
                        to {
                            opacity: 0;
                            transform: scale(0);
                        }
                    }
                    
                    @media all and (max-width: 300px) {
                        body {
                            font-size: 14px;
                        }
                    }
                    
                    @media all and (max-width: 500px) {
                        .testim .arrow {
                            font-size: 1.5em;
                        }
                        
                        .testim .cont div p {
                            line-height: 25px;
                        }
                        .testim {
                            width: 95%;
                        }
                        .testim .wrap {
                          padding: 65px 20px;
                        }
                        #testim-content {
                          width: 100%;
                          height: 350px;
                          
                        }
                        .testim .arrow.left {
                             left: -10px;
                        }
                        .testim .arrow.right {
                          right: -10px;
                        }
                    
                    }
                </style>';
           echo  $html;
        }, 11, 1);
        

    }
    public function randerFeedBackFormSubmit(){
        $this->addAction('theme.feedback.form_submit', function($model) {
            if(isset($_POST['code'])){
                if (\Request::isMethod('post') && $this->checkFormSlug($_POST['code'])) {
                    $request =(OBJECT)\Request::all();
                    $feedback = new Feedback;
                    $feedback->title = $request->name;
                    $feedback->slug = time();
                    $feedback->code = $request->code;
                    $feedback->package_id = $request->package_id;
                    $feedback->content = $request->message;
                    $feedback->status = 'pending';
                    if ($_FILES['image']['error']!=4){
                        $imageName = date('Y-M-d').'-feedback-'.time().'.'.$request->image->getClientOriginalExtension();
                         $request->image->move('userimage', $imageName);
                         //$feedback->thumbnail = $request->file('image')->store('userimage');
                         $feedback->thumbnail ='userimage/'.$imageName;
                    }else{
                         $feedback->thumbnail ='default-avatar.jpg';
                    }

                    if($feedback->save()){
                      echo '<div class="col-xxl-7 px-xxl-4" color="green">'.trans('theme::app.feedback_success_message').' </div>';
                    }


                }
            }
        }, 11, 1);
    }
    static function checkFormSlug($code){
        //$code = base64_decode($code);
        //dd($code );
        $fback=Feedback::where('code',$code)->count();
        if($fback>0){
            return false;
        }else{
            return true;
        }
         
    }
}
