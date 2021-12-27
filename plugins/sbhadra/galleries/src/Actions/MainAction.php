<?php

namespace Sbhadra\Galleries\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Galleries\Models\Gallery;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerGallery']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerTaxonomies']);
        //$this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addPackagesInHomepage']);
 
    }

    public function registerGallery()
    {
        HookAction::registerPostType('galleries', [
            'label' => trans('sbga::app.galleries'),
            'model' => Gallery::class,
            'menu_position' => 30,
            'menu_icon' => 'fa fa-image',
        ]);
        
    }
   
    public function registerTaxonomies()
    {
        HookAction::registerTaxonomy('album', 'galleries', [
            'label' => trans('sbga::app.album'),
            'menu_position' => 8, 
        ]); 
    }

   

    static function getPackageExService($package){
        $html ='';

        if($package->services){
            $html .='<div class="form-group row">';
            $html .='<label for="" class="col-sm-5 col-md-4 col-form-label">Preffered Time:</label>';
            $html .='<div class="col-sm-7 col-md-8">';
             foreach($package->services as $service){
               $html .='<div class="form-check">
               <input class="form-check-input" type="checkbox" value="'.$service->id.'" name="select_extra_item[]">
               <label class="form-check-label" for="defaultCheck1">
                 <span class="form-control-plaintext">'.$service->title.' - '.$service->price.' KD.</span>
               </label>
             </div>';
             }
            $html .='</div>';
            $html .='</div>';
        }
        return $html;
    }

}
