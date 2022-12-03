<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //direct to login page

    public function loginPage()
    {
        return view('loginPage');
    }
    public function registerPage(){
        return view('register');
    }
}
