<?php

use App\Http\Controllers\AdminController;
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
Route::get('/pets', [PetController::class, 'index'])->name('pets')->middleware('auth');
Route::get('/pets/{pet}', [PetController::class, 'show'])->name('pet.show');
Route::post('/pets/{pet}', [PetController::class, 'report'])->name('pet.report');
Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pet.edit');
Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pet.update');
Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('pet.delete');

//adopt a pet
Route::get('/pets/{pet}/adopt', [AdoptionRequestController::class, 'create'])->name('pet.adopt.create');
Route::post('/pets/{pet}/adopt', [AdoptionRequestController::class, 'store'])->name('pet.adopt.store');

Route::get('/my-requests', [AdoptionRequestController::class, 'myRequest'])->name('my.requests');
Route::get('/my-requests/{id}/edit', [AdoptionRequestController::class, 'myRequestEdit'])->name('my.requests.edit');
Route::put('/my-requests/{id}', [AdoptionRequestController::class, 'update'])->name('my.requests.update');
Route::delete('/my-requests/{id}', [AdoptionRequestController::class, 'myRequestDestroy'])->name('my.requests.delete');

Route::get('/incoming-requests', [AdoptionRequestController::class, 'incomingRequest'])->name('incoming.requests');
Route::put('/incoming-requests/{id}/accept', [AdoptionRequestController::class, 'acceptRequest'])->name('accept.request');
Route::put('/incoming-requests/{id}/reject', [AdoptionRequestController::class, 'rejectRequest'])->name('reject.request');
Route::get('/incoming-requests/details/{id}', [AdoptionRequestController::class, 'showIncomingRequestDetails'])->name('incoming.requests.details');
//on going
Route::get('/on-going-requests/owner', [AdoptionRequestController::class, 'onGoingRequestOwner'])->name('ongoing.requests.owner');

Route::put('/on-going-requests/{id}/done', [AdoptionRequestController::class, 'doneRequest'])->name('done.request');
Route::get('/on-going-requests/details/{id}', [AdoptionRequestController::class, 'onGoingRequestDetails'])->name('ongoing.requests.details');
//history
Route::get('/history', [AdoptionRequestController::class, 'history'])->name('history');

Route::get('/users/{id}', [UserController::class, 'show'])->name('user.profile');

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function () {
    // Admin-only routes here
    //admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/banned', [AdminController::class, 'bannedusers'])->name('admin.banned-users');
    Route::get('/admin/pets', [AdminController::class, 'pets'])->name('admin.pets');
    Route::get('/admin/pets/adopted', [AdminController::class, 'Adoptedpets'])->name('admin.adopted-pets');
    Route::get('/admin/user/{id}', [AdminController::class, 'show'])->name('admin.user-profile');
    Route::put('/admin/user/{id}', [AdminController::class, 'ban'])->name('admin.ban');
    Route::put('/admin/user/{id}/unban', [AdminController::class, 'unban'])->name('admin.unban');
    Route::get('/admin/user/pet/{id}', [AdminController::class, 'showPost'])->name('admin.post');
});
