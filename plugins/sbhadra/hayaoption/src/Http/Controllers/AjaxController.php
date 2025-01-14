<?php

namespace Sbhadra\Hayaoption\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Packagethemes\Models\Theme;
use Juzaweb\Models\Taxonomy;
use Juzaweb\Models\Page;
use Illuminate\Support\Facades\DB;
use Sbhadra\Photography\Models\Setting;
use Illuminate\Http\Request;

class AjaxController extends BackendController
{
    public function getThemesForChanges()
    {
       $themes = Theme::paginate(15);
         $html ='';
        if(!empty($themes)){
                $html .='<div class="theme_select_slider" style="height:250px;overflow-y: scroll;overflow-x: hidden;">
                <div class=" row">';
                    foreach($themes as $theme){
                        $theme = Theme::find($theme->id);
                        $html .='
                            <div class="col-sm-12 col-md-12 theme-select" >
                                <label class="container_radio themeCheck">
                                <input type="checkbox" id="slect'.$theme->id.'" value="'.$theme->id.'" name="theme_id[]">
                                
                                <img src="'.$theme->getThumbnail().'" alt="img" class="" style="height:48px;width:48px" >
                                    <label for="slect'.$theme->id.'" class="d-inline-block">'.$theme->title.'</label>
                                </label>
                            </div>';
                      }
                $html .='</div> </div>';
                $html .='<div class="pagination-links">';
                $html .= $themes->links();
                $html .='</div>';
                
        }
       
        echo  $html;
        
    }
}
