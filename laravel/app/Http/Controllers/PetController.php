<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Report;
use App\Models\reportedPost;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::query();

        if (request()->has('search')) {
            $pets = $pets->where('breed', 'like', '%' . request()->get('search', '') . '%');
        }

        // Exclude pets with accepted adoption requests
        $pets = $pets->whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status', ['accepted', 'done']);
        });


        return view('pet.pets', [
            'pets' => $pets->paginate(10)
        ]);
    }
    public function showdogs()
    {
        $pets = Pet::where('species', 'dog')
            // Exclude pets with accepted adoption requests
            ->whereDoesntHave('adoptionRequests', function ($query) {
                $query->whereIn('status', ['accepted', 'done']);
            })->paginate(10);

        return view('pet.dogs', [
            'dogs' => $pets
        ]);
    }
    public function showcats()
    {
        $pets = Pet::where('species', 'cat')
            // Exclude pets with accepted adoption requests
            ->whereDoesntHave('adoptionRequests', function ($query) {
                $query->whereIn('status', ['accepted', 'done']);
            })->paginate(10);

        return view('pet.dogs', [
            'dogs' => $pets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post-for-adoption');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function report(Request $request, Pet $pet)
    {
        $data = $request->validate([
            'reason' => 'required|max:255'
        ]);

        $data['user_id'] = auth()->id();
        $data['pet_id'] = $pet->id;
        Report::create($data);
        return redirect(route('pets'));
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:35',
            'age' => 'required|integer|min:1',
            'species' => 'required|in:dog,cat',
            'breed' => 'required|string|max:35',
            'region' => 'required|string|max:35',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
        ]);


        $filename = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = $file->storeAs('pet_image', $filename, 'public');
            // if (File::exists($product->product_image)) {
            //     File::delete($product->product_image);
            // }
        }
        $data['img'] = 'storage/' . $path;
        $data['user_id'] = auth()->user()->id;
        Pet::create($data);
        return redirect(route('pets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {

        $pet = Pet::with('user')->find($pet->id);
        return view('pet.profile', [
            'pet' => $pet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        if (auth()->id() !== $pet->user->id) {
            abort(404);
        }
        if ($pet->adoptionRequests()->whereIn('status', ['accepted', 'done'])->exists()) {
            abort(404);
        }

        return view('pet.edit', ['pet' => $pet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        if (auth()->id() !== $pet->user->id) {
            abort(404);
        }
        $data = $request->validate([
            'name' => 'required|string|max:35',
            'age' => 'required|integer|min:1',
            'species' => 'required|in:dog,cat',
            'breed' => 'required|string|max:35',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
        ]);


        $filename = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = $file->storeAs('pet_image', $filename, 'public');
            if (File::exists($pet->img)) {
                File::delete($pet->img);
            }
        }
        $pet->update([
            'name' => $request->name,
            'age' => $request->age,
            'species' => $request->species,
            'breed' => $request->breed,
            'description' => $request->description,
            'img' => 'storage/' . $path,
        ]);
        return redirect(route('pets'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if (Gate::allows('admin') || auth()->id() === $pet->user->id) {
            if (File::exists($pet->img)) {
                File::delete($pet->img);
            }
            $pet->delete();

            if (Gate::allows('admin')) {
                // Redirect to the admin dashboard for admins
                return redirect(route('admin.index'));
            } else {
                // Redirect to the pets index page for non-admins
                return redirect(route('pets'));
            }
        }

        abort(403, 'Unauthorized');
    }
}
