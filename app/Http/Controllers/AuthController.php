<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\UserController; 

class AuthController extends Controller
{
    public function login_admin()
    {
        if (!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

  // Import the UserController if it's in a different namespace

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1,
        'status' => 1, 'is_delete'=>0 ], $remember)) {
            return redirect()->route('admin.dashboard'); // Redirect admin to admin dashboard
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1,
        'status' => 0, 'is_delete'=>0 ], $remember)) {
            return redirect()->route('user.page'); // Redirect user to user dashboard
        } else {
            return Redirect::back()->withErrors(['message' => "Please enter correct email or password"]);
        }
    }
    



    public function logout_admin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
