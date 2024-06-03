<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProductController;

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
    Route::get('user/dashboard', [UserController::class, 'userpage'])->name('user.page');
    
    
    Route::group(["prefix" => "dashboard"], function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('list', [AdminController ::class, 'admin']);
        Route::get('add', [AdminController::class, 'add']);
        Route::post ('add', [AdminController::class, 'insert']);
        Route::get ('edit/{id}', [AdminController::class, 'edit']);
        Route::post ('edit/{id}', [AdminController::class, 'update']);
        Route::get ('delete/{id}', [AdminController::class, 'delete']);
    
    });

});




// Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');






Route::get('admin/category/list', [CategoryController::class, 'list']);
Route::get('admin/category/add', [CategoryController::class, 'add']);
Route::post('admin/category/add', [CategoryController::class, 'insert']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('admin/category/edit/{id}', [CategoryController::class, 'update'])->name('edit_category');
Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);


Route::get('/admin/sub_category/list', [SubCategoryController::class, 'list'])->name('sub_category.list');
Route::get('/admin/sub_category/add', [SubCategoryController::class, 'add'])->name('sub_category.add');
Route::post('/admin/sub_category/insert', [SubCategoryController::class, 'insert'])->name('sub_category.insert');
Route::get('/admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
Route::post('/admin/sub_category/edit/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_category.delete');



Route::get('/admin/product/list', [ProductController::class, 'list'])->name('product.list');
// Route::get('/admin/product/add', [SubCategoryController::class, 'add'])->name('product.add');
// Route::post('/admin/product/insert', [SubCategoryController::class, 'insert'])->name('product.insert');
// Route::get('/admin/product/edit/{id}', [SubCategoryController::class, 'edit'])->name('product.edit');
// Route::post('/admin/product/edit/{id}', [SubCategoryController::class, 'update'])->name('product.update');
// Route::get('admin/product/delete/{id}', [SubCategoryController::class, 'delete'])->name('product.delete');


// Route::prefix('admin/sub_category')->middleware('auth')->group(function () {
//     Route::get('list', [SubCategoryController::class, 'list'])->name('admin.sub_category.list');
//     Route::get('add', [SubCategoryController::class, 'add'])->name('admin.sub_category.add');
//     Route::post('insert', [SubCategoryController::class, 'insert'])->name('admin.sub_category.insert');
//     Route::get('edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.sub_category.edit');
//     Route::post('update/{id}', [SubCategoryController::class, 'update'])->name('admin.sub_category.update');
//     Route::get('delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.sub_category.delete');

    // Route::get('admin/admin/list',[AdminController::class,'list']);