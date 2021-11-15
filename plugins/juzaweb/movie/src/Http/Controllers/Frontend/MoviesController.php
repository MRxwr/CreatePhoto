<?php

namespace Juzaweb\Movie\Http\Controllers\Frontend;

use Juzaweb\Http\Controllers\FrontendController;
use Juzaweb\Movie\Models\Movie\Movie;

class MoviesController extends FrontendController
{
    public function index()
    {
        $info = (object) [
            'name' => trans('theme::app.movies'),
        ];
        
        $items = Movie::select([
            'id',
            'name',
            'other_name',
            'short_description',
            'thumbnail',
            'slug',
            'views',
            'video_quality',
            'year',
            'tv_series',
            'current_episode',
            'max_episode',
        ])
            ->wherePublish()
            ->where('tv_series', '=', 0)
            ->orderBy('id', 'DESC')
            ->paginate(20);
        
        return view('genre.index', [
            'title' => get_config('movies_title'),
            'description' => get_config('movies_description'),
            'keywords' => get_config('movies_keywords'),
            'banner' => get_config('movies_banner'),
            'items' => $items,
            'info' => $info,
        ]);
    }
}