<?php

use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
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
})->name('homepage');

Route::get('/hta',  function () {
    return view('hta');
})->name('hta');

Route::get('/about',  function () {
    return view('about');
})->name('about');

// Authentication //
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/post-for-adoption', [PetController::class, 'create'])->name('post-for-adoption');
    Route::post('/post-for-adoption', [PetController::class, 'store'])->name('post-for-adoption.store');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signupStore'])->name('signup.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

//pets
Route::get('/pets/dogs', [PetController::class, 'showdogs'])->name('dogs');
Route::get('/pets/cats', [PetController::class, 'showcats'])->name('cats');
Route::get('/pets', [PetController::class, 'index'])->name('pets');
Route::get('/pets/{pet}', [PetController::class, 'show'])->name('pet.show');
Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pet.edit');
Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pet.update');
Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('pet.delete');

//adopt a pet
Route::get('/pets/{pet}/adopt', [AdoptionRequestController::class, 'create'])->name('pet.adopt.create');
Route::post('/pets/{pet}/adopt', [AdoptionRequestController::class, 'store'])->name('pet.adopt.store');
Route::get('/my-requests', [AdoptionRequestController::class, 'yourRequest'])->name('my.requests');
Route::get('/incoming-requests', [AdoptionRequestController::class, 'incomingRequest'])->name('incoming.requests');

Route::get('/users/{id}', [UserController::class, 'show'])->name('user.profile');
