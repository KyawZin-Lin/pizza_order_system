<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //direct to login page

    public function loginPage()
    {
        return view('loginPage');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function dashboard()
    {

        if (Auth::user()->role == 'admin') {
            return redirect()->route('category#index');
        } else {
            return redirect()->route('user#home');
        };
    }
}
