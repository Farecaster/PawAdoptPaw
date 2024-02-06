<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function index()
    {
        //number of current users
        $userCount = User::count();

        //number of pets that available for adoption
        $petCount = Pet::whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status', ['accepted', 'done']);
        })->count();

        //number of overall adopted pet
        $adoptedPetCount = Pet::whereHas('adoptionRequests', function ($query) {
            $query->where('status', 'done');
        })->count();

        $reports = Report::whereDoesntHave('user', function ($query) {
            $query->where('is_admin', '1');
        })->get();

        $banned = User::where('is_banned', '1')->count();

        return view('admin.index', [
            'availablePetsCount' => $petCount,
            'userCount' => $userCount,
            'adoptedPetCount' => $adoptedPetCount,
            'reports' => $reports,
            'banned' => $banned,
        ]);
    }


    public function users()
    {
        $users = User::where('is_banned', '0')->where('is_admin', '0')->get();
        return view('admin.current-users', ['users' => $users]);
    }
    public function bannedusers()
    {
        $users = User::where('is_banned', '1')->where('is_admin', '0')->get();
        return view('admin.banned-users', ['users' => $users]);
    }
    public function pets()
    {
        $pets = Pet::whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status', ['accepted', 'done']);
        })->get();

        return view('admin.pets', ['pets' => $pets]);
    }
    public function Adoptedpets()
    {
        $pets = Pet::with('adoptionRequests')->whereHas('adoptionRequests', function ($query) {
            $query->where('status', 'done');
        })->get();
        return view('admin.adopted-pets', ['pets' => $pets]);
    }


    public function show(User $id)
    {
        $pets = $id->pets()->paginate(10); // Fix: Call paginate() before get()

        return view('admin.user', [
            'user' => $id,
            'pets' => $pets
        ]);
    }

    public function showPost(Pet $id)
    {
        $id = Pet::with('user')->find($id->id);
        return view('admin.post', [
            'pet' => $id
        ]);
    }
    public function unban(User $id)
    {

        $id->update(['is_banned' => false]);
        return redirect()->back();
    }
    public function ban(User $id)
    {
        // Log a message to check if the function is reached
        Log::info('Ban user function reached for user ID: ' . $id->id);

        // Delete associated pets and adoption requests
        $id->pets->each(function ($pet) {
            // Log a message for each pet to check if this part is reached
            Log::info('Deleting pet ID: ' . $pet->id);

            // Delete associated adoption requests
            $pet->adoptionRequests->each(function ($request) {
                Log::info('Deleting adoption request ID: ' . $request->id);
                $request->delete();
            });

            // Delete pet image from storage
            if (File::exists($pet->img)) {
                File::delete($pet->img);
            }

            // Delete the pet
            $pet->delete();
        });

        // Log a message to check if the user's is_banned status is updated
        Log::info('Updating user is_banned status for user ID: ' . $id->id);
        $id->update(['is_banned' => true]);

        return redirect()->back();
    }
}
