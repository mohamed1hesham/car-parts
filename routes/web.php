<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(["prefix" => "admin"], function () {
    Route::get('/login', [AuthController::class, 'login_admin'])->name('login');
    Route::post('/login', [AuthController::class, 'auth_login_admin'])->name('post_login');
    Route::get('/logout', [AuthController::class, 'logout_admin'])->name('post_logout');
    
    Route::group(["prefix" => "dashboard"], function () {
        Route::get('/', [DashboardController::class, 'dashboard']);

        Route::get('list', [DashboardController::class, 'admin']);
    });
});
