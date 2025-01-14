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


Route::get('/setting/theme-option', 'ThemeoptionsController@index')->name('admin.theme-option.get');
Route::post('/setting/theme-option', 'ThemeoptionsController@doSave')->name('admin.theme-option.post');