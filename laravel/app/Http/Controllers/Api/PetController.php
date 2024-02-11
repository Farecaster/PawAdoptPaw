<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user(); // Assuming you are using Laravel's built-in authentication

        $pets = Pet::whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status', ['accepted', 'done']);
        })
            ->where('user_id', '!=', $currentUser->id)
            ->get();

        return response()->json($pets);
    }
}
