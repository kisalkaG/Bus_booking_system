<?php
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\UserPasswordResetController;
use Modules\Auth\Http\Controllers\AdminPasswordResetController;
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


Route::post('admin-login',[AuthController::class,'loginAdmin']);
Route::post('register-user',[AuthController::class,'registerUser']);
Route::post('user-login',[AuthController::class,'loginUser']);


Route::post('admin/password/reset-token', [AdminPasswordResetController::class ,'adminPasswordForgot']);
Route::post('admin/password/reset', [AdminPasswordResetController::class, 'adminPasswordReset']);

Route::post('user/password/reset-token', [UserPasswordResetController::class ,'userPasswordForgot']);
Route::post('user/password/reset', [UserPasswordResetController::class, 'userPasswordReset']);
