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
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getGalleyExImages']);
 
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

   

    static function getGalleyExImages(){
        add_filters('theme.galleries', function(){
        $galleries = Gallery::get();
        $html ='';
        if($galleries){
           
            $html .='<div class="mt-3 gallery-grid">';
             foreach($galleries as $image){
               $html .='          
               <div class="column">        
               <a class="example-image-link" img-id="gm-0" href="'.$image->getThumbnail().'" data-lightbox="example-set" data-title="">
                 <img src="'.$image->getThumbnail().'" style="width:100%">
              </a>
              </div>
             </div>';
             }
            $html .='</div>';
           
        }
        return $html;
     });
    }

}
