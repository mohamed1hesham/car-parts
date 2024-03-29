<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Facade;

class AuthController extends Controller
{
    public function login(){
        dd(Hash::make('123456')); 

        return view('admin.auth.login');
    }
}
