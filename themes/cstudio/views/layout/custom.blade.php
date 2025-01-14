<!--@dd(get_theme_config('home'))-->
<style>
.insta_feedback{
    margin-bottom: 7rem !important;
}
.modal-body{
    text-align:center;
}
.btn-close{
    background-color:{{(get_theme_config('primary_color')?get_theme_config('primary_color'):'#000')}};
    padding:5px;
}
.site-header {
    height: font-size: {{(get_theme_config('header_height')?get_theme_config('header_height'):'40')}}px !important; 
    background-color: {{(get_theme_config('header_color')?get_theme_config('header_color'):'#FFF')}};
    color: {{(get_theme_config('header_font_color')?get_theme_config('header_font_color'):'#000')}};
  @if(get_theme_config('header_box_shadow')=='yes')
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Creates the shadow */
    margin-bottom:15px;
  @endif
  @if(get_theme_config('header_is_stiky')=='yes')
    position: sticky;
    top: 0;
    z-index: 1000;  
  @endif
}
.slicknav_nav li a {
    font-size: {{(get_theme_config('header_font_size')?get_theme_config('header_font_size'):'18')}}px !important;
    color: {{(get_theme_config('header_font_color')?get_theme_config('header_font_color'):'#000')}}!important;
}
.site-nav > ul > li > a{
    font-size: {{(get_theme_config('header_font_size')?get_theme_config('header_font_size'):'18')}}px !important;
    color: {{(get_theme_config('header_font_color')?get_theme_config('header_font_color'):'#000')}}!important;
}
 @if(get_theme_config('is_item_shadow')=='yes')
.pack_item{
     box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5);
}
.px-xl-5 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
  }
@endif

@if(get_theme_config('signature_bg'))
.signature_section {
    background-image: url({{upload_url(get_theme_config('signature_bg'))}})!important;
}
@endif
@if(get_theme_config('button_bg_color'))
.btn-dark, .btn-primary {
    background-color: {{(get_theme_config('button_bg_color')?get_theme_config('button_bg_color'):'#cabeb2')}}!important;
    color: {{(get_theme_config('button_color')?get_theme_config('button_color'):'#FFF')}}!important;
    font-size: {{(get_theme_config('button_font_size')?get_theme_config('button_font_size'):'18')}}px !important;

}
@endif


</style>