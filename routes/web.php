<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('login');

    Route::group(["prefix" => "dashboard"], function () {
        Route::get('/', function () {
            return view('admin.pages.dashboard');
        });
        Route::get('list', function () {
            return view('admin.admin.list');
        });
    });
});