<?php

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
    return view('layout.homepage');
})->name('homepage');


Route::get('/hta',  function () {
    return view('layout.hta');
})->name('hta');

Route::get('/about',  function () {
    return view('layout.about');
})->name('about');

Route::get('/signup',  function () {
    return view('layout.signup');
})->name('signup');

Route::get('/login',  function () {
    return view('layout.login');
})->name('login');

Route::get('/petprofile',  function () {
    return view('layout.petprofile');
})->name('petprofile');

Route::get('/dogs',  function () {
    return view('layout.dogs');
})->name('dogs');
Route::get('/cats',  function () {
    return view('layout.cats');
})->name('cats');
