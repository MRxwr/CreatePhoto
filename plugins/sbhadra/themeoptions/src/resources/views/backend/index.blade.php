@extends('juzaweb::layouts.backend')

@section('content')
<style>
    /* Container padding and tab content styling */
.tab-container {
    padding: 10px;
    height:100%;
    border: 1px solid #ddd;
    border-top: none;
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.tab-container nav.header{
    background: #f2f4f8;
    display: block;
    padding:10px;
    margin-bottom:10px;
    font-size:20px; 
}
/* Style for the tab navigation items */
.nav-tabs {
    border-bottom: 2px solid #ddd;
}

.nav-tabs .nav-item {
    margin-bottom: -1px;
}

.nav-tabs .nav-link {
    border: 1px solid transparent;
    color: #495057;
    font-size:16px; 
    background-color: #f8f9fa;
    font-weight: bold;
    padding: 10px;
}

.nav-tabs .nav-link.active {
    background-color: #007bff;
    border-color: #007bff #007bff #fff;
    color: white;
}

.nav-tabs .nav-link:hover {
    background-color: #e9ecef;
    color: #007bff;
}

/* Tab content styles */
.tab-content {
    padding: 20px;
    /*border: 1px solid #ddd;*/
    /*border-top: none;*/
    /*background-color: white;*/
    /*box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);*/
}

/* Form input styling */
.form-group{ 
    margin:10px; 
    font-size:16px; 
    
}
.form-group label {
    font-weight: bold;
}

.form-control {
    min-height:45px;
    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ced4da;
}
.filed-size {
    width:320px;
}

input[type="checkbox"], input[type="radio"] {
    margin-right: 5px;
}

/* General button and input focus styles */
.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

</style>
@php
$model = collect([
   'banner_bg' => get_theme_config('banner_bg'),
   'signature_bg' => get_theme_config('signature_bg'),
   'signature_logo' => get_theme_config('signature_logo'),
   'brand_logo' => get_theme_config('brand_logo'),
]);
@endphp

<!-- @dd(\Sbhadra\Photography\Models\Setting::where('field_value','api_key')->first()) -->
    <form action="{{route('admin.theme-option.post')}}" method="post" class="form-ajax" id="Be4MBcHP47k9METK" novalidate="novalidate">
        {!! csrf_field() !!}
      <div class="tab-container mt-5">
          <nav aria-label="breadcrumb" class="header">Create Studio Theme Option</nav>
              <div class="row">
                <div class="col-md-2">
                  <ul class="nav flex-column nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item ">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="education" aria-selected="false">Home Page option</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Header option</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Footer option</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="colors-tab" data-toggle="tab" href="#colors" role="tab" aria-controls="education" aria-selected="false">Colors option</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">Socials option</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="resurvation-tab" data-toggle="tab" href="#resurvation" role="tab" aria-controls="resurvation" aria-selected="false">Resurvation option</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Location  Page</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-7">
                  <div class="tab-content" id="myTabContent">
                       <!--Home page settings option-->
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h4>General/Home Page  Setting</h4>
                      
                        <div class="form-group">
                          <label for="degree">Select Home</label>
                          <select class="form-control filed-size " id="home" name="home">
                              <option value="default" @if(get_theme_config('home')=="default") selected @endif>Default</option>
                              <!--<option value="aminaalzayerstudio" @if(get_theme_config('home')=="aminaalzayerstudio") selected @endif>Aminaalzayer studio</option>-->
                              <!--<option value="createstudio" @if(get_theme_config('home')=="createstudio") selected @endif>Create Studio</option>-->
                              <option value="demahstudio" @if(get_theme_config('home')=="demahstudio") selected @endif>Demah Studio</option>
                              <option value="hayastudio" @if(get_theme_config('home')=="hayastudio") selected @endif>Haya Studio</option>
                          </select>
                        </div>
                        
                         <div class="form-group">
                          <label for="firstName">Home section </label>
                        </div>
                        
                        <div class="form-group">
                          <label for="firstName">1. Slider Section </label>
                          <label for="is_home_slider1"><input type="radio" id="is_home_slider1" name="is_home_slider" value="yes" @if(get_theme_config('is_home_slider')=="yes") checked @endif>Yes</label>
                          <label for="is_home_slider2"><input type="radio" id="is_home_slider2" name="is_home_slider" value="no" @if(get_theme_config('is_home_slider')=="no") checked @endif>No</label>
                          <label for="firstName">| Slider Size </label>
                          <label for="slider_size1"><input type="radio" id="slider_size1" name="slider_size" value="100" @if(get_theme_config('slider_size')=="100") checked @endif>100%</label>
                          <label for="slider_size2"><input type="radio" id="slider_size2" name="slider_size" value="50" @if(get_theme_config('slider_size')=="50") checked @endif>50%</label>
                        </div>
                        <div class="form-group">
                          <label for="firstName">2. Banner Image </label>
                          <label for="bannersection1"><input type="radio" id="bannersection1" name="is_banner_image" value="yes" @if(get_theme_config('is_banner_image')=="yes") checked @endif>Yes</label>
                          <label for="bannersection2"><input type="radio" id="bannersection1" name="is_banner_image" value="no" @if(get_theme_config('is_banner_image')=="no") checked @endif>No</label>
                          
                          <label for="firstName">| Banner Size </label>
                          <label for="banner_size1"><input type="radio" id="banner_size1" name="banner_size" value="100" @if(get_theme_config('banner_size')=="100") checked @endif>100%</label>
                          <label for="banner_size2"><input type="radio" id="banner_size2" name="banner_size" value="50" @if(get_theme_config('banner_size')=="50") checked @endif>50%</label>
                          <div class="row">
                               <div class="col-md-6">
                                  {{ Field::image($model, 'banner_bg') }}
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                          <label for="firstName">3. About Section </label>
                          <label for="Aboutsection1"><input type="radio" id="Aboutsection1" name="is_home_about" value="yes" @if(get_theme_config('is_home_about')=="yes") checked @endif>Yes</label>
                          <label for="Aboutsection2"><input type="radio" id="Aboutsection2" name="is_home_about" value="no" @if(get_theme_config('is_home_about')=="no") checked @endif>No</label>
                              <div class="form-group">
                                  <label for="firstName"> About Style </label>
                                  <label for="about_style_1"><input type="radio" id="about_style_1" name="about_style_1" value="style_1" @if(get_theme_config('about_style_1')=="style_1") checked @endif>Yes</label>
                                  <label for="about_style_2"><input type="radio" id="about_style_2" name="about_style_2" value="style_2" @if(get_theme_config('about_style_2')=="style_2") checked @endif>No</label>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="firstName">4. Signature section  </label>
                          <label for="home_signature1"><input type="radio" id="home_signature1" name="is_home_signature" value="yes" @if(get_theme_config('is_home_signature')=="yes") checked @endif>Yes</label>
                          <label for="home_signature2"><input type="radio" id="home_signature1" name="is_home_signature" value="no" @if(get_theme_config('is_home_signature')=="no") checked @endif>No</label>
                           <div class="row">
                               <div class="col-md-6">
                                   {{ Field::image($model, 'signature_bg') }}
                               </div>
                               <div class="col-md-6">
                                   {{ Field::image($model, 'signature_logo') }}
                               </div>
                           </div>
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="firstName">5. Package Section </label>
                          <label for="Packagesection1"><input type="radio" id="Packagesection1" name="is_home_package" value="yes" @if(get_theme_config('is_home_package')=="yes") checked @endif>Yes</label>
                          <label for="Packagesection2"><input type="radio" id="Packagesection2" name="is_home_package" value="no" @if(get_theme_config('is_home_package')=="no") checked @endif>No</label>
                          <div class="form-group">
                                <label for="firstName">Package Box Shadow  </label>
                                <label for="is_item_shadow1"><input type="radio" id="is_item_shadow1" name="is_item_shadow" value="yes" @if(get_theme_config('is_item_shadow')=="yes") checked @endif>Yes</label>
                                <label for="is_item_shadow2"><input type="radio" id="is_item_shadow2" name="is_item_shadow" value="no" @if(get_theme_config('is_item_shadow')=="no") checked @endif>No</label> 
                          </div>
                          <div class="row">
                            
                               <div class="col-md-6">
                                   {{ Field::image($model, 'brand_logo') }}
                               </div>
                           </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="firstName">6.Feedback Section </label>
                          <label for="Feedbacksection1"><input type="radio" id="Feedbacksection1" name="is_home_feedback" value="yes" @if(get_theme_config('is_home_feedback')=="yes") checked @endif>Yes</label>
                          <label for="Feedbacksection2"><input type="radio" id="Feedbacksection2" name="is_home_feedback" value="no" @if(get_theme_config('is_home_feedback')=="no") checked @endif>No</label>
                        </div>
                        
                        <div class="form-group">
                          <label for="firstName">7.Instagram Section </label>
                          <label for="instagramsection1"><input type="radio" id="instagramsection1" name="is_home_instagram" value="yes" @if(get_theme_config('is_home_instagram')=="yes") checked @endif>Yes</label>
                          <label for="instagramsection2"><input type="radio" id="instagramsection2" name="is_home_instagram" value="no"  @if(get_theme_config('is_home_instagram')=="no") checked @endif >No</label>
                        </div>
                        <div class="form-group">
                          <label for="firstName">8. Page Loader  </label>
                          <label for="is_home_modal1"><input type="radio" id="is_home_modal1" name="is_home_modal" value="yes" @if(get_theme_config('is_home_modal')=="yes") checked @endif>Yes</label>
                          <label for="is_home_modal2"><input type="radio" id="is_home_modal2" name="is_home_modal" value="no" @if(get_theme_config('is_home_modal')=="no") checked @endif>No</label>
                        </div>
                        <div class="form-group">
                          <label for="firstName">9. Page Loader  </label>
                          <label for="is_page_loadert1"><input type="radio" id="is_page_loadert1" name="is_page_loadert" value="yes" @if(get_theme_config('is_page_loadert')=="yes") checked @endif>Yes</label>
                          <label for="is_page_loadert2"><input type="radio" id="is_page_loadert2" name="is_page_loadert" value="no" @if(get_theme_config('is_page_loadert')=="no") checked @endif>No</label>
                        </div>
                    </div>
                    
                    <!-- Header Info Form -->
                    <div class="tab-pane fade " id="personal" role="tabpanel" aria-labelledby="personal-tab">
                      <h4>Header Setting</h4>
                      
                       <div class="form-group">
                          <label for="degree">1. Header Style</label>
                          <select class="form-control filed-size " id="header" name="header">
                              <option value="default"  @if(get_theme_config('header')=="default") selected @endif >Default</option>
                              <option value="style_1"  @if(get_theme_config('header')=="style_1") selected @endif >Style 1</option>
                              <option value="style_2"  @if(get_theme_config('header')=="style_2") selected @endif >Style 2</option>
                              <!--<option value="style_3"  @if(get_theme_config('header')=="style_3") selected @endif >Style 3</option>-->
                          </select>
                        </div>
                         <div class="form-group">
                          <label for="firstName">2. Home section </label>
                            <div class="form-group">
                              <label for="firstName">Header with box-shadow  </label>
                              <label for="header_box_shadow1"><input type="radio" id="header_box_shadow" name="header_box_shadow" value="yes" @if(get_theme_config('header_box_shadow')=="yes") checked @endif >Yes</label>
                              <label for="header_box_shadow2"><input type="radio" id="header_box_shadow" name="header_box_shadow" value="no" @if(get_theme_config('header_box_shadow')=="no") checked @endif>No</label>
                            </div>
                            <div class="form-group">
                              <label for="header_height">Header Height</label>
                              <input type="number" class="form-control filed-size " id="header_height" name="header_height" value="{{get_theme_config('header_height')}}" min="0" >
                            </div>
                            <div class="form-group">
                              <label for="header_color">Header Bg color</label>
                              <input type="color" class="form-control filed-size " id="header_color" name="header_color" value="{{get_theme_config('header_color')}}" >
                            </div>
                            <div class="form-group">
                              <label for="header_font_color">Header Font color</label>
                              <input type="color" class="form-control filed-size " id="header_font_color" name="header_font_color" value="{{get_theme_config('header_font_color')}}" >
                            </div>
                            
                            <div class="form-group">
                              <label for="header_font_size">Header Font Size</label>
                              <input type="number" class="form-control filed-size " id="header_font_size" name="header_font_size" value="{{get_theme_config('header_font_size')}}" >
                            </div>
                            
                            <div class="form-group">
                              <label for="firstName">Header is stiky  </label>
                              <label for="header_is_stiky1"><input type="radio" id="header_is_stiky1" name="header_is_stiky" value="yes" @if(get_theme_config('header_is_stiky')=="yes") checked @endif >Yes</label>
                              <label for="header_is_stiky2"><input type="radio" id="header_is_stiky2" name="header_is_stiky" value="no" @if(get_theme_config('header_is_stiky')=="no") checked @endif>No</label>
                            </div>
                        </div>
                        
                       
                        
                        <div class="form-group">
                          
                        </div>
                        
                        <div class="form-group">
                          <label for="firstName">3. Home menu/tab section </label>
                              <div class="form-group">
                              <label for="firstName">Header Language Option </label>
                              <label for="is_language1">
                                  <input type="radio" id="is_language1" name="is_header_language" value="yes"  @if(get_theme_config('is_header_language')=="yes") checked @endif  >Yes
                                  </label>
                              <label for="is_language2">
                                  <input type="radio" id="is_language2" name="is_header_language" value="no" @if(get_theme_config('is_header_language')=="no") checked @endif >No
                                  </label>
                            </div>
                            <div class="form-group">
                              <label for="firstName">Header Home Option </label>
                              <label for="is_home1"><input type="radio" id="is_home1" name="is_header_home" value="yes" @if(get_theme_config('is_header_home')=="yes") checked @endif >Yes</label>
                              <label for="is_home2"><input type="radio" id="is_home2" name="is_header_home" value="no" @if(get_theme_config('is_header_home')=="no") checked @endif>No</label>
                            </div>
                            <div class="form-group">
                                  <label for="firstName">Header About Option </label>
                                  <label for="is_about_header">
                                      <input type="radio" id="is_about_header" name="is_header_about" value="yes" @if(get_theme_config('is_header_about')=="yes") checked @endif >Yes
                                  </label>
                                  <label for="is_about_header">
                                      <input type="radio" id="is_about_header" name="is_header_about" value="no" @if(get_theme_config('is_header_about')=="no") checked @endif>No
                                  </label>
                            </div>
                            <div class="form-group">
                                  <label for="firstName">Header Gallery Option </label>
                                  <label for="is_gallery1">
                                      <input type="radio" id="is_gallery1" name="is_header_gallery" value="yes" @if(get_theme_config('is_header_gallery')=="yes") checked @endif >Yes
                                  </label>
                                  <label for="is_gallery2">
                                      <input type="radio" id="is_gallery2" name="is_header_gallery" value="no" @if(get_theme_config('is_header_gallery')=="no") checked @endif>No
                                  </label>
                            </div>
                            <div class="form-group">
                                  <label for="firstName">Header Contact Option </label>
                                  <label for="is_contact1">
                                      <input type="radio" id="is_contact1" name="is_header_contact" value="yes" @if(get_theme_config('is_header_contact')=="yes") checked @endif >Yes
                                  </label>
                                  <label for="is_contacty2">
                                      <input type="radio" id="is_contact2" name="is_header_contact" value="no"  @if(get_theme_config('is_header_contact')=="no") checked @endif >No
                                  </label>
                            </div>
                            <div class="form-group">
                                  <label for="firstName">Header Reservations-check Option </label>
                                  <label for="is_recheck1">
                                      <input type="radio" id="is_recheck1" name="is_header_recheck" value="yes" @if(get_theme_config('is_header_recheck')=="yes") checked @endif >Yes
                                  </label>
                                  <label for="is_recheck2">
                                      <input type="radio" id="is_recheck2" name="is_header_recheck" value="no"  @if(get_theme_config('is_header_recheck')=="no") checked @endif >No
                                  </label>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Footer Section Info Form -->
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <h4>Footer Setting</h4>
                      <div class="form-group">
                          <label for="footer">1. Footer Style</label>
                          <select class="form-control filed-size " id="footer" name="footer">
                              <option value="default"  @if(get_theme_config('footer')=="default") selected @endif >Default</option>
                              <option value="style_1"  @if(get_theme_config('footer')=="style_1") selected @endif >Style 1 (Like HayaStudio)</option>
                              <option value="style_2"  @if(get_theme_config('footer')=="style_2") selected @endif >Style 2 (Like Demah Studio)</option>
                             
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="footer_bg_color">Footer Bg color</label>
                          <input type="color" class="form-control filed-size " id="footer_bg_color"  name="footer_bg_color" value="{{get_theme_config('footer_bg_color')}}">
                        </div>
                        
                         <div class="form-group">
                          <label for="footer_font_color">Footer Font color</label>
                          <input type="color" class="form-control filed-size " id="footer_font_color"  name="footer_font_color" value="{{get_theme_config('footer_font_color')}}">
                        </div>
                        
                        <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="email" class="form-control filed-size " id="site_email" name="site_email" placeholder="Enter email" value="{{get_theme_config('site_email')}}">
                        </div>
                        
                        <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input type="tel" class="form-control filed-size " id="site_phone" name="site_phone" placeholder="Enter phone number" value="{{get_theme_config('site_phone')}}">
                        </div>
                        
                         <div class="form-group">
                          <label for="phone">Site Address</label>
                          <input type="text" class="form-control filed-size " id="site_address" name="site_address" placeholder="Enter Address" value="{{get_theme_config('site_address')}}">
                        </div>
                      <div class="form-group">
                          <label for="phone">Copyright</label>
                          <input type="tel" class="form-control filed-size " id="site_copyright"  name="site_copyright" placeholder="Copyright" value="{{get_theme_config('site_copyright')}}">
                        </div>
                    </div>
                    
                    <!-- Color Info Form -->
                    <div class="tab-pane fade" id="colors" role="tabpanel" aria-labelledby="colors-tab" value="{{get_theme_config('site_email')}}">
                      <h4>Color Setting</h4>
                        <div class="form-group">
                          <label for="primary_color">Primary color</label>
                          <input type="color" class="form-control filed-size " id="primary_color"  name="primary_color" value="{{get_theme_config('primary_color')}}">
                        </div>

                        <div class="form-group">
                          <label for="title_color">Title color</label>
                          <input type="color" class="form-control filed-size " id="title_color" name="title_color" value="{{get_theme_config('title_color')}}" >
                        </div>
                        <div class="form-group">
                          <label for="title_font_size">Title font size</label>
                          <input type="number" class="form-control filed-size " id="title_font_size" name="title_font_size" value="{{get_theme_config('title_font_size')}}" min="0" >
                        </div>
                        
                        <div class="form-group">
                          <label for="text_color">Text color</label>
                          <input type="color" class="form-control filed-size " id="text_color" name="text_color" value="{{get_theme_config('text_color')}}" >
                        </div>
                        
                        <div class="form-group">
                          <label for="text_font_size">Text font size</label>
                          <input type="number" class="form-control filed-size " id="text_font_size" name="text_font_size" value="{{get_theme_config('text_font_size')}}" min="0" >
                        </div>
                        
                        <div class="form-group">
                          <label for="button_bg_color">Button Bg color</label>
                          <input type="color" class="form-control filed-size " id="button_bg_color" name="button_bg_color" value="{{get_theme_config('button_bg_color')}}" >
                        </div>
                        
                        <div class="form-group">
                          <label for="button_color">Button color</label>
                          <input type="color" class="form-control filed-size " id="button_color" name="button_color" value="{{get_theme_config('button_color')}}" >
                        </div>
                        
                        <div class="form-group">
                          <label for="text_font_size">Button font size</label>
                          <input type="number" class="form-control filed-size " id="button_font_size" name="button_font_size" value="{{get_theme_config('button_font_size')}}" min="0" >
                        </div>
                      
                    </div>
                    <!-- social Info Form -->
                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab" value="{{get_theme_config('site_email')}}">
                      <h4>SocialMedia Setting</h4>
                        <div class="form-group">
                          <label for="degree">Facebook</label>
                          <input type="text" class="form-control filed-size " id="facebook" name="facebook" placeholder="Enter facebook url" value="{{get_theme_config('facebook')}}">
                        </div>
                        <div class="form-group">
                          <label for="instagram">Instagram</label>
                          <input type="text" class="form-control filed-size " id="instagram" name="instagram" placeholder="Enter instagram url" value="{{get_theme_config('instagram')}}">
                        </div>
                        
                         <div class="form-group">
                          <label for="twitter">Twitter</label>
                          <input type="text" class="form-control filed-size " id="twitter" name="twitter" placeholder="Enter twitter url" value="{{get_theme_config('twitter')}}">
                        </div>
                        
                        <div class="form-group">
                          <label for="snapchat">Snapchat</label>
                          <input type="text" class="form-control filed-size " id="snapchat" name="snapchat" placeholder="Enter snapchat url"  value="{{get_theme_config('snapchat')}}">
                        </div>
                        
                        <div class="form-group">
                          <label for="whatsapp">Whatsapp</label>
                          <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter whatsapp url"  value="{{get_theme_config('whatsapp')}}">
                        </div>
                        <div class="form-group">
                          <label for="whatsapp">email</label>
                          <input type="text" class="form-control filed-size " id="email" name="email" placeholder="Enter emailemail url"  value="{{get_theme_config('email')}}">
                        </div>
                        
                    </div>
                    <!--Resurvation page settings option-->
                     <div class="tab-pane fade " id="resurvation" role="tabpanel" aria-labelledby="resurvation-tab">
                      <h4>Resurvation page Setting</h4>
                         <div class="form-group">
                          <label for="firstName">Fields section </label>
                        </div>
                        
                        <div class="form-group">
                          <label for="firstName">Email Option </label>
                          <label for="is_email_field1"><input type="radio" id="is_email_field1" name="is_email_field" value="yes" @if(get_theme_config('is_email_field')=="yes") checked @endif >Yes</label>
                          <label for="is_email_field2"><input type="radio" id="is_email_field2" name="is_email_field" value="no" @if(get_theme_config('is_email_field')=="no") checked @endif>No</label>
                        </div>
                        <div class="form-group">
                              <label for="firstName">Baby name Option </label>
                              <label for="is_baby_name2">
                                  <input type="radio" id="is_baby_name" name="is_baby_name" value="yes" @if(get_theme_config('is_baby_name')=="yes") checked @endif >Yes
                              </label>
                              <label for="is_baby_name2">
                                  <input type="radio" id="is_baby_name" name="is_baby_name" value="no" @if(get_theme_config('is_baby_name')=="no") checked @endif>No
                              </label>
                        </div>
                        <div class="form-group">
                              <label for="firstName">Baby Age Option </label>
                              <label for="is_baby_age1">
                                  <input type="radio" id="is_baby_age1" name="is_baby_age" value="yes" @if(get_theme_config('is_baby_age')=="yes") checked @endif >Yes
                              </label>
                              <label for="is_baby_age2">
                                  <input type="radio" id="is_baby_age2" name="is_baby_age" value="no" @if(get_theme_config('is_baby_age')=="no") checked @endif>No
                              </label>
                        </div>
                        <div class="form-group">
                              <label for="firstName">Shipping Option </label>
                              <label for="is_shipping_option1">
                                  <input type="radio" id="is_shipping_option1" name="is_shipping_option" value="yes" @if(get_theme_config('is_shipping_option')=="yes") checked @endif >Yes
                              </label>
                              <label for="is_shipping_option2">
                                  <input type="radio" id="is_shipping_option2" name="is_shipping_option" value="no"  @if(get_theme_config('is_shipping_option')=="no") checked @endif >No
                              </label>
                        </div>
                        <div class="form-group">
                              <label for="firstName">Coupon Option </label>
                              <label for="is_coupon_option1">
                                  <input type="radio" id="is_coupon_option1" name="is_coupon_option" value="yes" @if(get_theme_config('is_coupon_option')=="yes") checked @endif >Yes
                              </label>
                              <label for="is_coupon_option2">
                                  <input type="radio" id="is_coupon_option2" name="is_coupon_option" value="no"  @if(get_theme_config('is_coupon_option')=="no") checked @endif >No
                              </label>
                        </div>
                    </div>
                     <!--Location page settings option-->
                    <div class="tab-pane fade " id="location" role="tabpanel" aria-labelledby="location-tab">
                      <h4>Location page Setting</h4>
                         <div class="form-group">
                          <label for="firstName">Fields section </label>
                        </div>

                    </div>
                  </div>
                </div>
                <div class="col-md-12 "><div class="mt-3 text-right"><button type="submit" class="btn btn-success" fdprocessedid="26rnys"> <i class="fa fa-save"></i> Update </button></div></div>
              </div>
            </div>
         

    </form>
    
  

@endsection