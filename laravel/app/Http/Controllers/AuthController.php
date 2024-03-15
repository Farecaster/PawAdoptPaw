<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function signupStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        notify()->success('', 'Account Created Successfully');
        return redirect(route('login'));
    }

    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($validated)) {
            // Check if the authenticated user is banned
            if (Auth::user()->is_banned) {
                Auth::logout(); // Log out the banned user
                return redirect(route('login'))->withErrors([
                    'email' => 'Your account has been banned.',
                ]);
            }

            request()->session()->regenerate();

            // Check if the authenticated user is an admin
            if (Auth::user()->is_admin) {
                return redirect(route('admin.index'))->with('success', 'Logged in successfully as admin!');
            }
            notify()->success('', 'Welcome ' . Auth::user()->name);
            return redirect(route('homepage'))->with('success', 'Logged in successfully!');
        }

        return redirect(route('login'))->withErrors([
            'email' => 'No matching user found with the provided email and password',
        ]);
    }


    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect(route('login'));
    }
}
