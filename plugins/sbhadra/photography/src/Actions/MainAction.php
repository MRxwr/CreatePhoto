<?php

namespace Sbhadra\Photography\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;

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
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addPackagesInHomepage']);
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
        HookAction::registerPostType('services', [
            'label' => trans('sbph::app.services'),
            'model' => Service::class,
            'menu_position' => 34,
            'menu_icon' => 'fa fa-list',
        ]);
        HookAction::registerPostType('timeslots', [
            'label' => trans('sbph::app.timeslots'),
            'model' => Timeslot::class,
            'menu_position' => 34,
            'menu_icon' => 'fa fa-list',
        ]);
    }
    public function addPackagesInHomepage()
    {
        $this->addAction('theme.home_packages', function () {
            $packages = Package::where('status','publish')->get();
            if($packages){
                //var_dump($packages);
                foreach($packages as $key=>$package){
                    echo '<div class="col-md-6 col-sm-6 col-12">
                    <a href="'.url('package/'.$package->slug).'">
                    <div class="package-card card m-2">
                      <div class="card-body p-2">
                        <div class="row align-items-center no-gutters">
                          <div class="col-lg-7 col-md-8 col-sm-12 order-lg-1 order-md-1 order-sm-2 order-2">
                          <h5 class="package-head">'.$package->title.'</h5>
                            '.$package->content.'                    
                            <p class="theme-color package-price-tag text-right"><span>Price:</span><span class="ml-2">'.$package->price.' KD</span></p>
                          </div>
                          <div class="col-lg-5 col-md-4 order-lg-3 order-md-2 order-sm-1 order-1">
                            <img src="'. upload_url($package->thumbnail) .'" class="img-rounded img-fluid d-block mx-auto mb-md-0 mb-3">
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>';
                }
             }
        });

    }
    public function registerBooking()
    {
        HookAction::registerPostType('bookings', [
            'label' => trans('sbph::app.bookings'),
            'model' => Booking::class,
            'menu_position' => 36,
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
