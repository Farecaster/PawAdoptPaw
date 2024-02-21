<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function userAvailablePets(User $id)
    {
        $pets = $id->pets()->where('user_id', $id->id)->whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status',  ['accepted', 'done']);
        })->get();

        return response()->json($pets);
    }

    public function showdogs()
    {

        $currentUser = auth()->user();

        $pets = Pet::where('species', 'dog')
            // Exclude pets with accepted adoption requests
            ->whereDoesntHave('adoptionRequests', function ($query) {
                $query->whereIn('status', ['accepted', 'done']);
            })->where('user_id', '!=', $currentUser->id)
            ->get();

        return response()->json($pets);
    }

    public function showcats()
    {
        $currentUser = auth()->user();

        $pets = Pet::where('species', 'cat')
            // Exclude pets with accepted adoption requests
            ->whereDoesntHave('adoptionRequests', function ($query) {
                $query->whereIn('status', ['accepted', 'done']);
            })->where('user_id', '!=', $currentUser->id)
            ->get();

        return response()->json($pets);
    }

    public function report(Request $request, Pet $pet)
    {
        // Validate the request data
        $data = $request->validate([
            'reason' => 'required|max:255'
        ]);

        // Create a new report record
        $report = new Report();
        $report->reason = $data['reason'];
        $report->user_id = auth()->id();
        $report->pet_id = $pet->id;
        $report->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Report created successfully'], 201);
    }


    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:35',
            'age' => 'required|integer|min:1',
            'species' => 'required',
            'breed' => 'required|string|max:35',
            'gender' => 'required|string|max:35',
            'region' => 'required|string|max:35',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|', // Assuming it's an image upload
        ]);

        // Store the image file
        $filename = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->storeAs('pet_image', $filename, 'public');
            $data['img'] = 'storage/' . $path;
        }

        // Create a new pet record
        $data['user_id'] = auth()->user()->id;
        Pet::create($data);

        // Return a JSON response indicating success
        return response()->json(['message' => 'Pet created successfully']);
    }

    public function show(Pet $pet)
    {
        // Retrieve the pet with its associated user
        $pet = Pet::with('user')->find($pet->id);

        // Return the pet data as JSON response
        return response()->json(['pet' => $pet]);
    }

    public function update(Request $request, Pet $pet)
    {
        // Check if the authenticated user is the owner of the pet
        if (auth()->id() !== $pet->user->id) {
            return response()->json(['error' => 'You are not authorized to update this pet.'], 403);
        }

        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:35',
            'age' => 'required|integer|min:1',
            'species' => 'required',
            'breed' => 'required|string|max:35',
            'gender' => 'required|string|max:35',
            'region' => 'required|string|max:35',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Assuming it's an image upload
        ]);

        // Handle image upload
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->storeAs('pet_image', $filename, 'public');
            if ($pet->img && File::exists(public_path($pet->img))) {
                File::delete(public_path($pet->img));
            }
            $data['img'] = 'storage/' . $path;
        }

        // Update the pet record
        $pet->update($data);

        // Return a JSON response indicating success
        return response()->json(['message' => 'Pet updated successfully']);
    }



    public function destroy(Pet $pet)
    {
        // Check if the authenticated user is an admin or the owner of the pet
        if (auth()->user()->can('admin') || auth()->id() === $pet->user_id) {
            // Delete the pet's image file if it exists
            if ($pet->img && File::exists(public_path($pet->img))) {
                File::delete(public_path($pet->img));
            }

            // Delete the pet record
            $pet->delete();

            // Return a success message as a JSON response
            return response()->json(['message' => 'Pet deleted successfully']);
        }

        // Return an error response with a status code of 403 (Forbidden)
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
