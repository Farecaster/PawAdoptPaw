<?php

use App\Http\Controllers\Api\AdoptionRequestController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PetController;
use App\Http\Controllers\Api\PetSocialController as ApiPetSocialController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PetSocialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//PRIVATE ROUTES
Route::group(['middleware' => ['auth:sanctum', 'not_banned']], function () {


    //AUTH CONTROLLER
    Route::post('/logout', [AuthController::class, 'logout']);

    //PET CONTROLLER
    Route::get('/pets', [PetController::class, 'index']);
    Route::get('/pets/user/{id}', [PetController::class, 'userAvailablePets']);
    Route::get('/pets/dogs', [PetController::class, 'showdogs']);
    Route::get('/pets/cats', [PetController::class, 'showcats']);
    Route::post('/pets/{pet}', [PetController::class, 'report']);
    Route::post('/post-for-adoption', [PetController::class, 'store']);
    Route::put('/pets/{pet}', [PetController::class, 'update']);
    Route::delete('pets/{pet}', [PetController::class, 'destroy']);
});




//AR CONTROLLER
Route::group(['middleware' => ['auth:sanctum', 'not_banned']], function () {
    Route::get('/pets/{pet}/adopt', [AdoptionRequestController::class, 'create']);
    Route::post('/pets/{pet}/adopt', [AdoptionRequestController::class, 'store']);

    Route::get('/my-requests', [AdoptionRequestController::class, 'myRequest']);
    Route::get('/my-requests/{id}/edit', [AdoptionRequestController::class, 'myRequestEdit']);
    Route::put('/my-requests/{id}', [AdoptionRequestController::class, 'update']);
    Route::delete('/my-requests/{id}', [AdoptionRequestController::class, 'myRequestDestroy']);

    Route::get('/incoming-requests', [AdoptionRequestController::class, 'incomingRequest']);
    Route::put('/incoming-requests/{id}/accept', [AdoptionRequestController::class, 'acceptRequest']);
    Route::put('/incoming-requests/{id}/reject', [AdoptionRequestController::class, 'rejectRequest']);
    Route::get('/incoming-requests/details/{id}', [AdoptionRequestController::class, 'showIncomingRequestDetails']);
    //on going
    Route::get('/on-going-requests', [AdoptionRequestController::class, 'onGoingRequestOwner']);
    Route::get('/pending-request', [AdoptionRequestController::class, 'pendingRequest']);

    Route::put('/on-going-requests/{id}/done', [AdoptionRequestController::class, 'doneRequest']);
    Route::get('/on-going-requests/details/{id}', [AdoptionRequestController::class, 'onGoingRequestDetails']);
    //history
    Route::get('/history', [AdoptionRequestController::class, 'history']);


    Route::get('/users/current', [UserController::class, 'getCurrentUserId']);
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.profile');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('/pet-social', [ApiPetSocialController::class, 'index']);
    Route::get('/pet-social/ownposts', [ApiPetSocialController::class, 'ownposts']);
    Route::get('/pet-social/user/{id}', [ApiPetSocialController::class, 'show']);
    Route::post('/pet-social/post', [ApiPetSocialController::class, 'store']);
    Route::get('/pet-social/{id}/edit', [ApiPetSocialController::class, 'edit']);
    Route::put('/pet-social/{id}/update', [ApiPetSocialController::class, 'update']);
    Route::post('/pet-social/{id}/like', [ApiPetSocialController::class, 'like']);
    Route::post('/pet-social/{id}/unlike', [ApiPetSocialController::class, 'unlike']);
    Route::post('/pet-social/{id}', [ApiPetSocialController::class, 'reports']);
    Route::delete('/pet-social/{id}', [ApiPetSocialController::class, 'destroy']);
});


//PUBLIC ROUTES
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pets/{pet}', [PetController::class, 'show']);
