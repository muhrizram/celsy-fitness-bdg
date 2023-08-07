<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Homepage
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

//Register
Route::controller(RegisterController::class)->group(function () {
    Route::group(['middleware' => ['guest', 'preventBackHistory']], function () {
        Route::get('/register', 'index');
        Route::post('/register', 'store')->name('post_register');
    });
});

//Login
Route::controller(LoginController::class)->group(function () {
    Route::group(['middleware' => ['guest','preventBackHistory']], function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'authenticate')->name('process_login');
    });
    Route::post('logout', 'logout')->name('logout');
});

//Member
Route::group(['middleware' => ['auth', 'checkUserLogin:1']], function () {
    Route::controller(MemberController::class)->group(function () {
        Route::get('/member', 'index');
        Route::post('/edit_exercise/{id}', 'edit_exercise');
    });
    Route::post('/member/{id}', [MemberController::class, 'edit_exercise']);
});

Route::group(['middleware' => ['auth', 'checkUserLogin:3']], function () {
    Route::controller(ProgressController::class)->group(function () {
        Route::get('/member/progress', 'index');
        Route::post('/member/progress/tambah', 'store');
    });
});


//Manager
Route::group(['middleware' => ['auth', 'checkUserLogin:2', 'preventBackHistory']], function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('dashboard');
    Route::controller(FoodController::class)->group(function () {
        Route::get('/manager/makanan', 'index');
        Route::get('/manager/makanan/tambah-data', 'create');
        Route::post('/manager/makanan/tambah-data', 'store');
        Route::get('/manager/makanan/checkSlug', 'checkSlug');
        Route::get('/manager/makanan/{food:slug}/ubah-data', 'edit');
        Route::post('/manager/makanan/{food:slug}', 'update');
        Route::post('/manager/makanan/{food:slug}/hapus', 'destroy');
    });
    Route::controller(ExerciseController::class)->group(function () {
        Route::get('/manager/gerakan-latihan', 'index');
        Route::get('/manager/gerakan-latihan/tambah-data', 'create');
        Route::post('/manager/gerakan-latihan/tambah-data', 'store');
        Route::get('/manager/gerakan-latihan/checkSlug', 'checkSlug');
        Route::get('/manager/gerakan-latihan/{exercise:slug}/ubah-data', 'edit');
        Route::post('/manager/gerakan-latihan/{exercise:slug}', 'update');
        Route::post('/manager/gerakan-latihan/{exercise:slug}/hapus', 'destroy');
    });
    Route::controller(ExerciseProgramController::class)->group(function () {
        Route::get('/manager/program-latihan/{id}', 'index');
        Route::get('/manager/program-latihan', 'gate');
        Route::get('/manager/program-latihan/{id}/tambah-data', 'create');
        Route::post('/manager/program-latihan/{id}/tambah-data', 'store');
        Route::get('/manager/program-latihan/{id}/{exerciseProgram:id}/ubah-data', 'edit');
        Route::post('/manager/program-latihan/{id}/{exerciseProgram:id}', 'update');
        Route::post('/manager/program-latihan/{id}/{exerciseProgram:id}/hapus', 'destroy');
    });
    Route::controller(UserDataController::class)->group(function () {
        Route::get('/manager/pengguna-aplikasi', 'index');
        Route::get('/manager/pengguna-aplikasi/{user:username}', 'show');
        Route::post('/manager/pengguna-aplikasi/{user:username}/hapus', 'destroy');
    });
});
