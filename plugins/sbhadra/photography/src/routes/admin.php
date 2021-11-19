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
Route::Resource('bookings', 'BookingController');
