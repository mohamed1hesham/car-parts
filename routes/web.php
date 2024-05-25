<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Routing\Controllers\Middleware;

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
        Route::get('list', [AdminController ::class, 'admin']);
        Route::get('add', [AdminController::class, 'add']);
        Route::post ('add', [AdminController::class, 'insert']);
        Route::get ('edit/{id}', [AdminController::class, 'edit']);
        Route::post ('edit/{id}', [AdminController::class, 'update']);
        Route::get ('delete/{id}', [AdminController::class, 'delete']);
    
    });

});




Route::get('admin/category/list', [CategoryController::class, 'list']);
Route::get('admin/category/add', [CategoryController::class, 'add']);
Route::post('admin/category/add', [CategoryController::class, 'insert']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('admin/category/edit/{id}', [CategoryController::class, 'update'])->name('edit_category');
Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);


Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);



    // Route::get('admin/admin/list',[AdminController::class,'list']);