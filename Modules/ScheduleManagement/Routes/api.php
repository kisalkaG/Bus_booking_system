<?php

use Illuminate\Http\Request;
use Modules\ScheduleManagement\Http\Controllers\ScheduleManagementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/schedulemanagement', function (Request $request) {
//    return $request->user();
//});

Route::Resource('schedule-management', 'ScheduleManagementController')->middleware('auth:sanctum');
Route::Resource('schedule-booking', 'ScheduleBookingController')->middleware('auth:sanctum');
Route::get('get-all-bookings-by-id/{id}', 'ScheduleBookingController@getAllBookingsById')->middleware('auth:sanctum');
Route::post('cancel-booking', 'ScheduleBookingController@getAllBookingsById')->middleware('auth:sanctum');

