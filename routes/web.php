<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('sign-in');
});


Route::get('/index', function () {
    return view('index');
});

Route::get('/profile', function () {
    return view('profile');
});

//
//Route::get('/user', function () {
//    return view('user');
//});
//
// Route::get('/user/{id}/{name}', function ($id,$name) {
//    return 'ID:'.$id.'. Name: '.$name;
//});
