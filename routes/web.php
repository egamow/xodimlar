<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StructureController;



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


Route::view('/', 'login');

Route::name('user.')->group(function () {

    Route::get('/login', function () { if (Auth::check()) { return redirect(route('user.main')); }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('user.login'));
    })->name('logout');


    Route::get('/register', function () {
        if (Auth::check()) {
            return redirect(route('user.main'));
        }
        return view('register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'save']);

    Route::get('/main', [MainController::class, 'index'])->middleware('auth')->name('main');

//    Route::get('/profile/{id}', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
//    Route::post('/profile/{id}', [ProfileController::class, 'index']);

    Route::get('/structure', [StructureController::class, 'index'])->middleware('auth')->name('structure');

});


//    Pastdagi 3 ta apiResource lar uchun umumiy izoh:
//    Route::get('category', 'CategoryController@index');
//    Route::post('category', 'CategoryController@store');
//    Route::get('category/{id}', 'CategoryController@show');
//    Route::put('category/{id}', 'CategoryController@update');
//    Route::delete('category/{id}', 'CategoryController@destroy');
//    * Shu tepadagi 5 ta route uchun pastdagi bitta apiResource bilan yozish mumkin
//    Route::apiResource('category', 'CategoryController');
//    * 3 ta controller uchun pastda shunday umumiy korinishda yozib qoydim
//    * Izohlarni o'chirib yuborishingiz mumkin

Route::get("admin/reset/{id}", 'AdminController@reset')->middleware('auth')->name('admin.reset');
Route::resource("admin", 'AdminController')->middleware('auth');
Route::resource("employees", 'EmployeeController')->middleware('auth');
Route::resource("profile", 'ProfileController')->middleware('auth');

Route::apiResource('category', 'CategoryController');
Route::apiResource('department', 'DepartmentController');
Route::apiResource('position', 'PositionController');



