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

Route::Resource('feedbacks', 'FeedbackController');
Route::Resource('feedback-pages', 'FeedbackPageController');
Route::post('feedbacks/change/status', 'FeedbackController@ChangeStatus')->name('admin.feedback.status');
//Route::post('feedbacks/change/status','CalendarController@delete')->name('admin.calendar.delete');