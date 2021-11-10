<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::view('/','login');

Route::name('user.')->group(function (){

    Route::view('/main', 'main')->middleware('auth')->name('main');
    Route::view('/profile', 'profile')->middleware('auth')->name('profile');

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');


    Route::get('/login', function(){
    if(Auth::check()){
        return redirect(route('user.main'));
    }
    return view('login');
    })->name('login');

    Route::post('/login',[\App\Http\Controllers\LoginController::class,'login']);

    Route::get('/logout', function() {
        Auth::logout();
        return redirect(route('user.login'));
    })->name('logout');




    Route::get('/register',function (){
        if(Auth::check()){
            return redirect(route('user.main'));
    }
    return view('register');
    })->name('register');

    Route::post('/register', [\App\Http\Controllers\RegisterController::class,'save']);
});



