<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/signup', [App\Http\Controllers\Api\UserApiController::class, 'signup'])->name('signup');
Route::post('/login', [App\Http\Controllers\Api\UserApiController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Api\UserApiController::class, 'logout'])->name('logout');
Route::post('/verify_images', [App\Http\Controllers\Api\UserApiController::class, 'verify_images'])->name('verify_images');

Route::group(['middleware' => ['auth:sanctum']], function () {
    // return $request->user();

});
