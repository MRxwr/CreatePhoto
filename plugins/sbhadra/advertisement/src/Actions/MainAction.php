<?php

namespace Sbhadra\Advertisement\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Advertisement\Models\Advertise;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerAdvertise']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addHeaderAdvertise']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addCstudioHeaderSlider']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addHayaHeaderSlider']);
        //$this->addAction(self::BACKEND_CALL_ACTION, [$this, 'addAdminMenus']);
    }

    public function registerAdvertise()
    {
        HookAction::registerPostType('advertise', [
            'label' => trans('sbad::app.advertise'),
            'model' => Advertise::class,
            'menu_position' => 36,
            'menu_icon' => 'fa fa-image',
        ]);
    }
    public function addHeaderAdvertise()
    {
       
        $this->addAction('theme.footer', function () {
            $sliders = Advertise::where('status','publish')->get();
            //var_dump($sliders); 
           if($sliders ){
            echo '<div id="demo" class="carousel slide" data-ride="carousel">';
            echo ' <ul class="carousel-indicators">';
                foreach($sliders as $key=>$slider){
                    echo '<li data-target="#demo" data-slide-to="0"  class="'.($key==0?'active':'').'" ></li>';
                }
            echo '</ul>';
            echo '<div class="carousel-inner">';
                foreach($sliders as $key=>$slider){
                    echo '<div class="carousel-item '.($key==0?'active':'').' ">';
                     echo '<img src="'. upload_url($slider->thumbnail) .'" class="img-fluid d-block mx-auto" alt="">';
                    echo '</div>';

                }
            echo '</div>';
            echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>';
            echo '</div>';
          }
        });
    }

}
