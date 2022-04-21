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

Route::postTypeResource('packages', 'PackageController');
Route::Resource('services', 'ServiceController');
Route::Resource('timeslots', 'TimeslotController');
Route::get('/setting/booking', 'SettingsController@index')->name('admin.setting.get');
Route::post('/setting/booking', 'SettingsController@save')->name('admin.setting.post');
Route::get('/booking/details/{id}', 'BookingController@getBookingDetails')->name('admin.bookings.view');
Route::get('/booking/add-new/{id}', 'BookingController@addNewBooking')->name('admin.bookings.addnew');
Route::get('/booking/cancel/{id}', 'BookingController@getBookingCancel')->name('admin.bookings.cancel');
Route::get('/booking/refund/{id}', 'BookingController@getBookingRefund')->name('admin.bookings.refund');
Route::get('/booking/complete/{id}', 'BookingController@getBookingComplete')->name('admin.bookings.complete');
Route::get('/booking/send-sms/{id}', 'BookingController@getBookingSendSMS')->name('admin.bookings.sendsms');

Route::Resource('bookings', 'BookingController');
