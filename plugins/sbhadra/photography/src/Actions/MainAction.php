<?php

namespace Sbhadra\Photography\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Booking;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerPackage']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerBooking']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerTaxonomies']);
        //$this->addAction(self::BACKEND_CALL_ACTION, [$this, 'addAdminMenus']);
    }

    public function registerPackage()
    {
        HookAction::registerPostType('packages', [
            'label' => trans('sbph::app.packages'),
            'model' => Package::class,
            'menu_position' => 32,
            'menu_icon' => 'fa fa-list',
        ]);
    }

    public function registerBooking()
    {
        HookAction::registerPostType('bookings', [
            'label' => trans('sbph::app.bookings'),
            'model' => Booking::class,
            'menu_position' => 33,
            'menu_icon' => 'fa fa-list',
        ]);
    }
    public function registerTaxonomies()
    {
        HookAction::registerTaxonomy('types', 'packages', [
            'label' => trans('sbph::app.types'),
            'menu_position' => 6, 
        ]);

        // HookAction::registerTaxonomy('countries', 'movies', [
        //     'label' => trans('mymo::app.countries'),
        //     'menu_position' => 7,
        //     'supports' => [
        //         'thumbnail'
        //     ],
        // ]);

        // HookAction::registerTaxonomy('actors', 'movies', [
        //     'label' => trans('mymo::app.actors'),
        //     'menu_box' => false,
        //     'menu_position' => 7,
        //     'supports' => [
        //         'thumbnail'
        //     ],
        // ]);

        // HookAction::registerTaxonomy('directors', 'movies', [
        //     'label' => trans('mymo::app.directors'),
        //     'menu_position' => 7,
        //     'menu_box' => false,
        //     'supports' => [
        //         'thumbnail'
        //     ],
        // ]);

        // HookAction::registerTaxonomy('writers', 'movies', [
        //     'label' => trans('mymo::app.writers'),
        //     'menu_position' => 7,
        //     'menu_box' => false,
        //     'supports' => [
        //         'thumbnail'
        //     ],
        // ]);

        // HookAction::registerTaxonomy('years', 'movies', [
        //     'label' => trans('mymo::app.years'),
        //     'menu_position' => 8,
        //     'show_in_menu' => false,
        //     'menu_box' => false,
        //     'supports' => [],
        // ]);
    }

}
