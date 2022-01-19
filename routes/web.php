<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo "Coming Soon";
});

// Auth::routes();
// Admin Auth routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//Admin Dashboard routes
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/users/verify/{id}', [App\Http\Controllers\Admin\UserController::class, 'verifyUser'])->name('verifyUser');
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('deleteUser');
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('editUser');
Route::post('/admin/users/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('updateUser');

Route::prefix('admin')->group(function () {
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::get('/users/verify/{id}', [App\Http\Controllers\Admin\UserController::class, 'verifyUser'])->name('verifyUser');
    Route::get('/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('deleteUser');
    Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('editUser');
    Route::post('/users/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('updateUser');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('createUser');
    Route::post('/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('addUser');
});
