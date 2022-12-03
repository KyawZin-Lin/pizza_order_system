<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //direct to Category index
    public function index(){
        return view('admin.category.index');
    }
}
