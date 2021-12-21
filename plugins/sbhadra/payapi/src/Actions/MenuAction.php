<?php

namespace Sbhadra\Payapi\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Payapi\Http\Controllers\AjaxController;
use Sbhadra\Payapi\Models\Movie\Movie;

class MenuAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {  
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'addSettingForm']);
        // $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'addAdminMenus']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addAjaxTheme']);
    }


    public function addSettingForm()
    {
        HookAction::addSettingForm('mymo', [
            'name' => trans('mymo::app.mymo_setting'),
            'view' => view('mymo::setting.tmdb'),
            'priority' => 20
        ]);
    }

    // public function addAdminMenus()
    // {
    //     HookAction::addAdminMenu(
    //         trans('mymo::app.banner_ads'),
    //         'banner-ads',
    //         [
    //             'icon' => 'fa fa-file',
    //             'position' => 30,
    //             'parent' => 'setting',
    //         ]
    //     );

    //     HookAction::addAdminMenu(
    //         trans('mymo::app.video_ads'),
    //         'video-ads',
    //         [
    //             'icon' => 'fa fa-video-camera',
    //             'position' => 31,
    //             'parent' => 'setting',
    //         ]
    //     );
    // }

    // public function addAjaxTheme()
    // {
    //     HookAction::registerFrontendAjax('movie-rating', [
    //         'callback' => [app(AjaxController::class), 'setRating']
    //     ]);

    //     HookAction::registerFrontendAjax('movie-download', [
    //         'callback' => [app(AjaxController::class), 'download']
    //     ]);

    //     HookAction::registerFrontendAjax('get-player', [
    //         'callback' => [app(AjaxController::class), 'getPlayer']
    //     ]);

    //     HookAction::registerFrontendAjax('set-view', [
    //         'callback' => [app(AjaxController::class), 'setMovieView']
    //     ]);

    //     HookAction::registerFrontendAjax('popular-movies', [
    //         'callback' => [app(AjaxController::class), 'getPopularMovies']
    //     ]);

    //     HookAction::registerFrontendAjax('movies-genre', [
    //         'callback' => [app(AjaxController::class), 'getMoviesByGenre']
    //     ]);

    //     HookAction::registerFrontendAjax('mymo_filter_form', [
    //         'callback' => [app(AjaxController::class), 'getFilterForm'],
    //     ]);
    // }

    
}
