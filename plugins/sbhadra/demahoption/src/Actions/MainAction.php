<?php

namespace Sbhadra\Demahoption\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Packagethemes\Models\Theme;
use Juzaweb\Models\Taxonomy;
use Juzaweb\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainAction extends Action
{
    /**
     * Execute the actions.addBodyClass
     *
     * @return void
     */
    public function handle()
    {
        
        //$this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addInstaFeedsHomepage']);
        $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'packageThemeField']);
        $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'updatepackagefield']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addBodyClass']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addFrontCategories']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addThemeExtraFields']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'doProcessPackageThemes']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getHomeAboutContent']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getTermsAndConditionContent']);
       
    }
public function packageThemeField(){
      add_action('post_type.package.form.right', function($model){
         $html='';
          $taxonomies = Taxonomy::where('post_type','package-themes')->where('taxonomy','categories')->get();
          //dd($taxonomies);
          $options = '';
           $cat_slugs =[];
           if(isset($model->theme_category_ids)){
             $cat_slugs= json_decode($model->theme_category_ids);
           }

          foreach($taxonomies as $taxonomy ){
              if(in_array($taxonomy->slug,$cat_slugs)){
                $options .='<option value="'.$taxonomy->slug.'" selected="selected">'.$taxonomy->name.'</option>';
              }else{
                $options .='<option value="'.$taxonomy->slug.'">'.$taxonomy->name.'</option>';
              }
          }
          $catischecked='';
          if(isset($model->is_theme_category) && $model->is_theme_category==1){
            $catischecked='checked';
          }
          $pieischecked='';
          if(isset($model->is_pieces) && $model->is_pieces==1){
            $pieischecked='checked';
          }
          $rate_per_pieces = 10;
          if(isset($model->rate_per_pieces)){
            $rate_per_pieces=$model->rate_per_pieces;
          }
         $html .='<div class="form-group">
                 <input type="hidden" name="is_pieces" id="is_pieces" value="0">
                 <input type="hidden" name="is_theme_category"  id="is_theme_category" value="0" >
                <label class="col-form-label" for="is_theme_category">'.trans('sbde::app.is_theme_category').'
                    <input type="checkbox" name="is_theme_category"  id="is_theme_category" value="1" '.$catischecked.' >
                </label>
             </div>';
          $html .='<div class="form-group">
                <label class="col-form-label" for="is_pieces">'.trans('sbde::app.is_pieces_enable').'
                    
                    <input type="checkbox" name="is_pieces" id="is_pieces" value="1" '.$pieischecked.' >
                </label>
            </div>';
          $html .='<div class="form-group">
                <label class="col-form-label" for="is_pieces">'.trans('sbde::app.rate_per_pieces').'</label>
                <input type="text" class="form-control" name="rate_per_pieces" id="rate_per_pieces" value="'.$rate_per_pieces.'"  >
                
            </div>';
          $html .='<div class="form-group">
          <label class="col-form-label" for="theme_category_ids">'.trans('sbde::app.theme_category').'</label>
            <select class="form-control select2-default" id="theme_category_ids" name="theme_category_ids[]" multiple>
          '.$options.'
          </select>
      </div>';

          echo  $html;
      }, 10, 1);
      add_action('admin.booking.after', function($model){
        $html='';
        if(isset($model->pictures_type)){
            $html .='<div class="row">
            <div class="col-md-4">Pictures Type</div>
            <div class="col-md-8">'.$model->pictures_type.'</div>
           </div>';
         }
         if(isset($model->number_of_pieces)){
            $html .='<div class="row">
            <div class="col-md-4">Number of pieces</div>
            <div class="col-md-8">'.$model->number_of_pieces.'</div>
           </div>';
         }
         if(isset($model->rate_per_pieces)){
            $html .='<div class="row">
            <div class="col-md-4">'.trans('sbde::app.rate_per_pieces').'</div>
            <div class="col-md-8">'.$model->rate_per_pieces.'KD</div>
           </div>';
         }

         echo  $html;
     }, 10, 1);

     add_action('admin.booking.total', function($model){
        $html='';
        $total =0.00;
        if(isset($model->booking_price)){
            $total = $model->booking_price;
        }
        if($model->services){
            $service_price = 0.00;
          foreach($model->services as $service){
                 $service_price= $service_price+$service->price;
                }
            $total =  $total+$service_price;
         }
        if(isset($model->number_of_pieces)){
            $total =  $total+($model->number_of_pieces*$model->rate_per_pieces);
         }
        
         $html .='<div class="row">
         <div class="col-md-6 ">Total</div>
         <div class="col-md-6 text-right"><strong>'.number_format((float)$total, 2, '.', '').' KD</strong></div>
        </div>';

         echo  $html;
     }, 10, 1);

  }
public function updatepackagefield(){
     add_action('plugin.package.update', function($model){ 
         if(isset( $_REQUEST)){
            $request = $_REQUEST;
            if(isset($request['is_theme_category'])){
                $model->is_theme_category = $request['is_theme_category'];
            }
            if(isset($request['is_pieces'])){
                $model->is_pieces = $request['is_pieces'];
            }
            if(!empty($request['theme_category_ids'])){
                $model->theme_category_ids = json_encode($request['theme_category_ids']);
            }
            $model->save();
         }
        
      
     }, 10, 1);
  }
public function addBodyClass()
    {
        $this->addAction('theme.homepackages', function () {
            $packages = Package::where('status','publish')->get();
            if($packages){
                //var_dump($packages);
                  foreach($packages as $key=>$package){
                   
                    if(($key+1) % 2 != 0){
                        $slug = ($package->is_theme_category==1?url('/theme-categoris?slug='.$package->slug):url('package/'.$package->slug.'?cat=all'));
                        echo   ' <div class="row py-5 my-5">         
                            <div class="col-xxl-7 offset-xxl-0 col-xl-6 offset-xl-1 d-xl-none d-flex justify-content-end mb-xl-0 mb-5">
                                <div class="pack_img position-relative">
                                    <img src="'.url('jw-styles/themes/demah/assets/img/pack_img_dots_right.svg').'" alt="img" class="position-absolute posLB">
                                    <img src="'. upload_url($package->thumbnail) .'" alt="img" class="mw-100">
                                </div>
                            </div>

                            <div class="col-xxl-4 offset-xxl-1 pe-xxl-5 col-xl-5 d-flex align-items-center">
                                <div class="pack_content position-relative d-flex align-items-center justify-content-center">
                                    <h4 class="position-absolute fs296 CarrinadyB text-primary pe-xl-5">'.($key+1).'</h4>
                                    <div class="pack_info">
                                        <h4 class="fs107 CarrinadyB text-primary text-uppercase mb-xl-5 pb-5 SegoeUIL">
                                        '.$package->title.'
                                        </h4>
                                       
                                        '.str_replace('<ul>',' <ul class="package-list ps-4">',$package->short_description).' 
                                        
                                        <a href="'.$slug .'" class="btn btn-xl btn-primary mt-3 fs24">'.trans('theme::app.book_now').'</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7 offset-xxl-0 col-xl-6 offset-xl-1 d-xl-flex d-none justify-content-end">
                                <div class="pack_img position-relative">
                                    <img src="'.url('jw-styles/themes/demah/assets/img/pack_img_dots_right.svg').'" alt="img" class="position-absolute posLB">
                                    <img src="'. upload_url($package->thumbnail) .'" alt="img" class="mw-100">
                                </div>
                            </div>
                        </div> ';
                    }else{
                        $slug = ($package->is_theme_category==1?url('/theme-categoris?slug='.$package->slug):url('package/'.$package->slug.'?cat=all'));
                        echo '<div class="row py-5 my-5">
                        <div class="col-xxl-7 col-xl-6 mb-xl-0 mb-5">
                            <div class="pack_img position-relative">
                            <img src="'.url('jw-styles/themes/demah/assets/img/pack_img_dots_right.svg').'" alt="img" class="position-absolute posLB">
                            <img src="'. upload_url($package->thumbnail) .'" alt="img" class="mw-100">
                            </div>
                        </div>
                        
                        <div class="col-xxl-4 offset-xxl-0 ps-xxl-5 col-xl-5 offset-xl-1 d-flex align-items-center">
                            <div class="pack_content position-relative d-flex align-items-center justify-content-center">
                                <h4 class="position-absolute fs296 CarrinadyB text-primary">'.($key+1).'</h4>
                                <div class="pack_info">
                                    <h4 class="fs107 CarrinadyB text-primary text-uppercase mb-xl-5 pb-5 SegoeUIL">
                                    '.$package->title.'
                                    </h4>
                                   
                                    '.str_replace('<ul>',' <ul class="package-list ps-4">',$package->short_description).' 
                                   
                                    <a href="'.$slug .'" class="btn btn-xl btn-primary mt-3 fs24">'.trans('theme::app.book_now').'</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }

                }
             }
        });
    }

public function addFrontCategories()
    {
        $this->addAction('theme.categories.page', function () {
            $slug = $_REQUEST['slug'];
            $package = Package::where('status','publish')->where('slug',$slug)->first();
            if(!empty($package)){
                if($package->theme_category_ids){
                $cats = json_decode($package->theme_category_ids);
                foreach($cats as $key=>$cat){
                    $taxonomies = Taxonomy::where('post_type','package-themes')->where('taxonomy','categories')->where('slug',$cat)->first();
                    //dd($taxonomies);
                    if(($key+1) % 2 != 0){
                        $slug = url('package/'.$package->slug).'?cat='. $taxonomies->slug;
                        echo   ' <div class="row py-5 my-5">         
                            <div class="col-xxl-7 offset-xxl-0 col-xl-6 offset-xl-1 d-xl-none d-flex justify-content-end mb-xl-0 mb-5">
                                <div class="pack_img position-relative">
                                    <img src="'.url('jw-styles/themes/demah/assets/img/pack_img_dots_right.svg').'" alt="img" class="position-absolute posLB">
                                    <img src="'. upload_url($taxonomies->thumbnail) .'" alt="img" class="mw-100">
                                </div>
                            </div>

                            <div class="col-xxl-4 offset-xxl-1 pe-xxl-5 col-xl-5 d-flex align-items-center">
                                <div class="pack_content position-relative d-flex align-items-center justify-content-center">
                                    <h4 class="position-absolute fs296 CarrinadyB text-primary pe-xl-5">
                                    '.($key+1).'
                                    </h4>
                                    <div class="pack_info">
                                        <h4 class="fs107 CarrinadyB text-primary text-uppercase mb-xl-5 pb-5 SegoeUIL">
                                        '.$taxonomies->name.'
                                        </h4>
                                        <p class="fs24 pb-5 mb-4">
                                        '.str_replace('<ul>',' <ul class="package-list ps-4">',$taxonomies->content).' 
                                        </p>
                                        <a href="'.$slug .'" class="btn btn-xl btn-primary mt-3 fs24">
                                        '.trans('theme::app.BookNow').'
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7 offset-xxl-0 col-xl-6 offset-xl-1 d-xl-flex d-none justify-content-end">
                                <div class="pack_img position-relative">
                                    <img src="'.url('jw-styles/themes/demah/assets/img/pack_img_dots_right.svg').'" alt="img" class="position-absolute posLB">
                                    <img src="'. upload_url($taxonomies->thumbnail) .'" alt="img" class="mw-100">
                                </div>
                            </div>
                        </div> ';
                    }else{
                        $slug = url('package/'.$package->slug).'?cat='. $taxonomies->slug;
                        echo '<div class="row py-5 my-5">
                        <div class="col-xxl-7 col-xl-6 mb-xl-0 mb-5">
                            <div class="pack_img position-relative">
                            <img src="'.url('jw-styles/themes/demah/assets/img/pack_img_dots_right.svg').'" alt="img" class="position-absolute posLB">
                            <img src="'. upload_url($taxonomies->thumbnail) .'" alt="img" class="mw-100">
                            </div>
                        </div>
                        
                        <div class="col-xxl-4 offset-xxl-0 ps-xxl-5 col-xl-5 offset-xl-1 d-flex align-items-center">
                            <div class="pack_content position-relative d-flex align-items-center justify-content-center">
                                <h4 class="position-absolute fs296 CarrinadyB text-primary">
                                '.($key+1).'
                                </h4>
                                <div class="pack_info">
                                    <h4 class="fs107 CarrinadyB text-primary text-uppercase mb-xl-5 pb-5 SegoeUIL">
                                    '.$taxonomies->name.'
                                    </h4>
                                    <p class="fs24 pb-5 mb-4">
                                    '.str_replace('<ul>',' <ul class="package-list ps-4">',$taxonomies->content).' 
                                    </p>
                                    <a href="'.$slug .'" class="btn btn-xl btn-primary mt-3 fs24">'.trans('theme::app.BookNow').'</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                }
              }
            }   
        });
    }
public function addThemeExtraFields(){
    $this->addAction('theme.reservation.exfields', function() {
        $package = Package::find($_REQUEST['id']);
        //dd($package);
        echo '<div class="col-xxl-8 pe-xl-5 pt-4">
        <div class="personal-form row">
            <div class="col-xxl-10 pb-3 fs23">
            <label>'.trans('theme::app.Pictures_type').': </label> 
               <input type="radio" class="" style="margin: 5px; width: 25px; min-height: 25px;" name="pictures_type" id="pictures_type1" value="Electonic">'.trans('theme::app.Electonic').'
               <input type="radio" class="" style="margin: 5px; width: 25px; min-height: 25px;"  name="pictures_type" id="pictures_type2" value="Printed + Electonic">'.trans('theme::app.Printed_Electonic').'
            </div>
            </div>
         </div>';
        if( $package->is_pieces==1){
           echo '<div class="col-xxl-10 pe-xl-5">
                    <div class="personal-form row">
                        <div class="col-xxl-8 pb-3">
                         <label>'.trans('theme::app.Number_of_Pieces').':</label> 
                         <input type="number" class="form-control" name="number_of_pieces" id="number_of_pieces" value="">
                         <input type="hidden"  name="rate_per_pieces" id="rate_per_pieces" value="'.$package->rate_per_pieces.'">
                       </div>
                       <div class="col-xxl-8 pb-3">
                         <label> </label> 
                         <div class="package-head bg-danger radius15 mh67 py-1 px-3 mb-4 d-inline-flex align-items-center">
                            <h4 class="fs23 text-danger">Each piece will cost  <span class="text-600">'.$package->rate_per_pieces.' KD</span></h4>
                         </div>
                       </div>
                    </div>
                </div>';
          }
       }, 15, 1);
       add_filters('theme.cstudio.themes', function(){
        
        //dd($themes);
        if(isset($_REQUEST['category']) && $_REQUEST['category']!='all'){
                // $taxonomy = Taxonomy::where('slug', $_REQUEST['category'])->firstOrFail();
                // $postType = $taxonomy->getPostType('model');
                // $themes = $postType::paginate();
                $themes = DB::table('package_themes')
                ->join('term_taxonomies', 'term_taxonomies.term_id', '=', 'package_themes.id')
                ->join('taxonomies', 'taxonomies.id', '=', 'term_taxonomies.taxonomy_id')
                ->where('taxonomies.slug', $_REQUEST['category'])
                ->select('package_themes.*')
                ->get();
                //dd($themes);
        } else{
            $themes = Theme::get();
        }    
        $html ='';
        if(!empty($themes)){
                $html .='
                <div class="col-xl-12 pe-xxl-0">
                <div class="theme_select_slider owl-carousel owl-theme">';
                foreach($themes as $theme){
                    $theme = Theme::find($theme->id);
                    $html .='<div class="theme-select">
                    <label class="container_radio themeCheck">
                        <label for="slect'.$theme->id.'" class="d-inline-block">'.$theme->title.'</label>
                        <input type="radio" id="slect'.$theme->id.'" value="'.$theme->id.'" name="theme_id">
                        <span class="checkmark"></span>
                        <a href="'.$theme->getThumbnail().'" class="themeCheck_img image-link border">
                            <img src="'.$theme->getThumbnail().'" alt="img" class="w-100">
                        </a>
                    </label>
                </div>';
                 }
                $html .='</div> </div>';
                $html .='<div class="col-xl-12  d-flex align-items-center justify-content-center">
                <button class="owl-arrow MyPrevButton">'.trans('theme::app.Previous').'</button>
                <button class="owl-arrow MyNextButton">'.trans('theme::app.Next').'</button>
            </div>';
        }
        return $html;
     });
    }

    public function doProcessPackageThemes(){
        add_action('theme.booking.extra', function($payment_data) {
            $booking = Booking::find($payment_data['booking_id']);
            if(isset($payment_data['pictures_type'])){
                $booking->pictures_type =  $payment_data['pictures_type'] ;
            }
            if(isset($payment_data['number_of_pieces'])){
                $booking->number_of_pieces =  $payment_data['number_of_pieces'] ;
            }
            if(isset($payment_data['rate_per_pieces'])){
                $booking->rate_per_pieces =  $payment_data['rate_per_pieces'] ;
            }
            $booking->save();
        }, 25, 1);
    }

    public function getHomeAboutContent(){
        $this->addAction('theme.home.about', function() {
            $page = Page::where('slug','about')->first();
            if($page){
            echo '<section class="hero_section py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="hero_info pe-xl-4">
                                <h4 class="fs107 CarrinadyB text-primary">'.$page->title.'</h4>
                                '.str_replace('<p>','<p class="fs24 mt-4">',$page->content).'
                            </div>
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-4">
                            <div class="hero_img">
                                <img src="'.upload_url($page->thumbnail).'" alt="img" class="mw-100">
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
             }
        });
    }

    public function getTermsAndConditionContent(){
        $this->addAction('theme.terms.content', function() {
            $page = Page::where('slug','terms-and-conditions')->first();
            if($page){
               echo $page->content;
             }
        });
    }

}
