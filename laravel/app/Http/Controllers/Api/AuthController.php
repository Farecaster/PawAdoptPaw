<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();
        return [
            'message' => 'Logged Out'
        ];
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if the user is banned
            if ($user->is_banned) {
                // If the user is banned, return an error response
                return response()->json(['error' => 'Your account has been banned.'], 403);
            }
    
            // If the user is not banned, generate token and return it
            $token = $user->createToken('myapptoken')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
    
        // If authentication fails, return an error response
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function test(){
        return response()->json([
            'message' => 'test'
        ]);
    }
}
