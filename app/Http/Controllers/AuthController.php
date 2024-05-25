<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login_admin()
    {
        if (!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1,
        'status' => 1, 'is_delete'=>0 ], $remember)) {
            return view('admin.pages.dashboard');
        } else {
            return Redirect::back()->withErrors(['message' => "please enter correct email or password"]);
        }
    }



    public function logout_admin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
