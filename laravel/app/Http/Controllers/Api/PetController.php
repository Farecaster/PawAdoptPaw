<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(){
        $pets = Pet::query();
        
        $pets = $pets->whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status', ['accepted', 'done'])->where('user_id', auth()->user()->id);
        })->get();

        return response()->json($pets);

    }

    
}
