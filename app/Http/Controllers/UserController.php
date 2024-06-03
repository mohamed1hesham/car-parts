<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userpage(){
        return view('admin.users.user');
    }
}
