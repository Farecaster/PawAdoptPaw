<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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



Route::get('/',  function () {
    return view('homepage');
})->name('homepage')->middleware('auth');

// Authentication //
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupStore'])->name('signup.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/hta',  function () {
    return view('hta');
})->name('hta');

Route::get('/about',  function () {
    return view('about');
})->name('about');


Route::get('/pets',  function () {
    return view('petprofile');
})->name('petprofile');

Route::get('/pets/dogs',  function () {
    return view('dogs');
})->name('dogs');
Route::get('/pets/cats',  function () {
    return view('cats');
})->name('cats');
