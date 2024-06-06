<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', mahasiswaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login') ->middleware('guest');
Route::get('/register', [RegisterController::class, 'index']) ->name('register') ->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']) ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

