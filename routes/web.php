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
    return redirect('/login');
});

Route::get('/home', function () {
    return redirect(route('user.home'));
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::resource('jadwal', 'App\Http\Controllers\JadwalController', [
        "as" => "admin"
    ]);
    Route::resource('reservasi', 'App\Http\Controllers\ReservasiController', [
        "as" => "admin"
    ]);
    Route::resource('dokter', 'App\Http\Controllers\DokterController', [
        "as" => "admin"
    ]);
    Route::resource('spesialis', 'App\Http\Controllers\SpesialisController', [
        "as" => "admin"
    ]);
    Route::resource('user', 'App\Http\Controllers\UsersController', [
        "as" => "admin"
    ]);
    Route::resource('profile', 'App\Http\Controllers\ProfileController', [
        "as" => "admin"
    ]);
});



Route::group(['prefix' => 'user'], function () {
    Route::get('home', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');
    Route::resource('jadwal',  'App\Http\Controllers\Jadwal2Controller', [
        "as" => "user"
    ]);
    Route::resource('reservasi',  'App\Http\Controllers\Reservasi2Controller', [
        "as" => "user"
    ]);
    Route::resource('profile',  'App\Http\Controllers\Profile2Controller', [
        "as" => "user"
    ]);
});
