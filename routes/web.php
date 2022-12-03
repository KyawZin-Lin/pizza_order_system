<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Logout

Route::redirect('/','loginPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    //Dashboard

    Route::get('dashboard',[AuthController::class,'dashboard'])->name('auth#dashboard');

    //Admin
    //Category
    Route::group(['prefix'=>'category'], function(){
        Route::get('index',[CategoryController::class,'index'])->name('category#index');
    });


    //User
    Route::group(['prefix'=>'user'],function(){
        Route::get('home',function(){
            return view('user.home');
        })->name('user#home');
    });
});



