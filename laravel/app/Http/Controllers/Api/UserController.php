<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $id)
    {
        $pets = $id->pets()->get(); // Fix: Call paginate() before get()

        return response()->json([
        'user' => $id,
        'pets' => $pets]);
    }
}
