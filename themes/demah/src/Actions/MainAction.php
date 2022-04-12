<?php
/**
 * CreatePhoto - The Best CMS for Laravel Project
 *
 * @package    juzaweb/laravel-cms
 * @author     The Sonjoy Bhadra <sbhadra0@gmail.com>
 * @link       https://juzaweb.com/cms
 * @license    MIT
 */

namespace Theme\Actions;

use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;

class MainAction extends Action
{
    public function handle()
    {
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'cStudioThemePackages']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addBodyClass']);
        $this->addAction(Action::JUZAWEB_INIT_ACTION, [$this, 'registerTemplates']);

        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addHeaderScript']);
       
        // $this->addAction(Action::WIDGETS_INIT, [$this, 'registerSidebars']);
        // $this->addAction(Action::WIDGETS_INIT, [$this, 'registerWidgets']);
    }

    public function addBodyClass()
    {
        $this->addAction('theme.homepackages', function () {
            $packages = Package::where('status','publish')->get();
            if($packages){
                //var_dump($packages);
                foreach($packages as $key=>$package){
                    echo '<div class="row package-item">
                        <div class="col-sm-6 pe-xl-5">
                            <div class="package-head bg-light radius5 py-1 px-3 mb-5 d-flex align-items-center justify-content-between">
                                <h4 class="fs25 ps-xl-4">'.$package->title.'</h4>
                                <p class="fs18 d-flex align-items-center">
                                    <img src="'.url('jw-styles/themes/cstudio/assets/img/timer.svg').'" alt="img" class="me-2">
                                    60 Minutes 
                                </p>
                            </div>
                            <div class="package-body text-muted">
                            '.str_replace('<ul>',' <ul class="package-list ps-4">',$package->content).' 
                            </div>
                            <div class="package-footer mt-4">
                                <a href="'.url('package/'.$package->slug).'" class="btn btn-light radius25 px-4 py-0">
                                    <span class="pe-2"> Book Now </span>
                                    <span class="border-left ps-2">  '.$package->price.' KD </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 ps-xl-5">
                            <img src="'. upload_url($package->thumbnail) .'" alt="img" class="w-100 mt-xl-0 mt-4 radius25">
                        </div>
                    </div>';
                }
             }
        });
    }

    public function cStudioThemePackages()
    {
        $this->addAction('theme.header', function () {
            echo e(view('theme::components.header_script'));
        });
    }


    public function addHeaderSlider()
    {
        $this->addAction('theme.slider', function () {
            echo e(view('theme::components.header_script'));
        });
    }

    public function addStyles()
    {
        //HookAction::enqueueFrontendScript('main', 'assets/js/main.js');
        //HookAction::enqueueFrontendStyle('main', 'assets/css/main.css');
    }

    public function registerTemplates()
    {
        HookAction::registerThemeTemplate('home', [
            'name' => trans('theme::app.home'),
            'view' => 'templates.home',
        ]);
        HookAction::registerThemeTemplate('home', [
            'name' => trans('theme::app.home'),
            'view' => 'templates.home',
        ]);
        HookAction::registerThemeTemplate('contact-us', [
            'name' => trans('theme::app.contact-us'),
            'view' => 'templates.contact-us',
        ]);
        HookAction::registerThemeTemplate('gallery', [
            'name' => trans('theme::app.gallery'),
            'view' => 'templates.gallery',
        ]);
        HookAction::registerThemeTemplate('reservations', [
            'name' => trans('theme::app.reservations'),
            'view' => 'templates.reservations',
        ]);
        HookAction::registerThemeTemplate('reservations-check', [
            'name' => trans('theme::app.reservations-check'),
            'view' => 'templates.reservations-check',
        ]);
        HookAction::registerThemeTemplate('success', [
            'name' => trans('theme::app.success'),
            'view' => 'templates.success',
        ]);
        HookAction::registerThemeTemplate('failed', [
            'name' => trans('theme::app.failed'),
            'view' => 'templates.failed',
        ]);
    }

    public function registerSidebars()
    {
        HookAction::registerSidebar('home', [
            'label' => trans('theme::app.home'),
            'description' => trans('theme::app.home_page_sidebar'),
        ]);

        HookAction::registerSidebar('sidebar', [
            'label' => trans('theme::app.sidebar'),
            'description' => trans('theme::app.sidebar_page'),
        ]);
    }

    public function registerWidgets()
    {
        // HookAction::registerWidget('slider_movie', [
        //     'label' => trans('theme::app.slider_movie'),
        //     'description' => trans('theme::app.slider_movie_description'),
        //     'widget' => new SliderMovie(),
        // ]);

        // HookAction::registerWidget('genre_movie', [
        //     'label' => trans('theme::app.genre_movie'),
        //     'description' => trans('theme::app.genre_movie_description'),
        //     'widget' => new GenreMovie(),
        // ]);

        HookAction::registerWidget('slider', [
            'label' => trans('theme::app.slider'),
            'description' => trans('theme::app.slider_description'),
            'widget' => new SliderWidget(),
        ]);

        // HookAction::registerWidget('popular_movies', [
        //     'label' => trans('theme::app.popular_movies'),
        //     'description' => trans('theme::app.popular_movies_description'),
        //     'widget' => new PopularWidget(),
        // ]);
    }
}
