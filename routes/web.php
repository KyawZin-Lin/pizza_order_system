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
    Route::group(['prefix'=>'category','middleware'=>'admin_auth'], function(){

        Route::get('index',[CategoryController::class,'index'])->name('category#index');
        Route::get('create',[CategoryController::class,'create'])->name('category#create');
        Route::post('store',[CategoryController::class,'store'])->name('category#store');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
        Route::post('update/{id}',[CategoryController::class,'update'])->name('category#update');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    });


    //User
    Route::group(['prefix'=>'user','middleware'=>'user.auth'],function(){
        Route::get('home',function(){
            return view('user.home');
        })->name('user#home');
    });
});



