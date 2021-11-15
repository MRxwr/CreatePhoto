<?php

namespace Sbhadra\Slider\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Slider\Models\Slider;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerSlider']);
        //$this->addAction(self::BACKEND_CALL_ACTION, [$this, 'addAdminMenus']);
    }

    public function registerSlider()
    {
        HookAction::registerPostType('sliders', [
            'label' => trans('sbsl::app.sliders'),
            'model' => Slider::class,
            'menu_position' => 31,
            'menu_icon' => 'fa fa-image',
        ]);
    }

}
