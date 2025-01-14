<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/media/list/', 'RegenerateController@getMedias')->name('admin.media.list');
Route::post('/media/generate/', 'RegenerateController@reGenerateThumble')->name('admin.media.generate');
Route::get('/media/package_resize', 'RegenerateController@PackageImageCompress')->name('admin.media.package_resize');
Route::get('/media/theme_resize', 'RegenerateController@ThemeImageCompress')->name('admin.media.theme_resize');