<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return view('home.index');
});

Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/dashboard', function(){
//     return view('dashboard.index');
// })->middleware('auth');

// Route::get('/welcome', function(){
//     return view('welcome.index');
// })->middleware('checkUserLogin:0');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login','authenticate')->name('process_login');
    Route::post('logout','logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['checkUserLogin:0']], function(){
        Route::view('welcome', 'firstTime.index', [
            "title" => "Welcome"
        ]);
    });
    Route::group(['middleware' => ['checkUserLogin:1']], function(){
        Route::view('biodata', 'biodata.index', [
            "title" => "Biodata"
        ]);
    });
    Route::group(['middleware' => ['checkUserLogin:2']], function(){
        Route::view('dashboard', 'dashboard.index');
    });
});
