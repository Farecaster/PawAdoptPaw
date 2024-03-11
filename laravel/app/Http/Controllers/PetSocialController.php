<?php

namespace App\Http\Controllers;

use App\Models\PetSocial;
use App\Models\ReportedPetSocialPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PetSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PetSocial::inRandomOrder()->get();

        return view('social.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required|string|min:1|max:255',
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = $file->storeAs('petsocial_image', $filename, 'public');
            $data['img'] = 'storage/' . $path;
        } else {
            $data['img'] = null;
        }

        $data['user_id'] = auth()->user()->id;

        PetSocial::create($data);
        return response()->json(['post' => $data]);
    }

    public function like(PetSocial $id)
    {
        $liker = auth()->user();
        $liker = $liker->likes()->attach($id);
        return response()->json('success', 200);
    }
    public function unlike(PetSocial $id)
    {
        $liker = auth()->user();
        $liker = $liker->likes()->detach($id);
        return response()->json('success', 200);
    }

    public function reports(Request $request, PetSocial $id)
    {
        if ($id->user->id == auth()->id()) {
            abort(404);
        }
        // Validate the request data
        $data = $request->validate([
            'reason' => 'required|string|min:1|max:255',
        ]);


        $data['user_id'] = auth()->user()->id;
        $data['pet_social_id'] = $id->id;
        ReportedPetSocialPost::create($data);


        // Return a response
        return response()->json(['message' => 'Posted Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        $posts = $id->PetSocials()->get();
        return view('social.profile', ['posts' => $posts, 'user' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetSocial $id)
    {
        if (auth()->id() != $id->user_id) {
            abort(404);
        }
        return view('social.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetSocial $id)
    {

        \Log::info('Request data:', $request->all());
        $data = $request->validate([
            'caption' => 'required|string|min:1|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        \Log::info($data);
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = $file->storeAs('petsocial_image', $filename, 'public');
            $data['img'] = 'storage/' . $path;
            if (File::exists($id->img)) {
                File::delete($id->img);
            }
        } else {
            $data['img'] = null;
        }

        $id->update($data);
        return redirect(route('social.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetSocial $id)
    {
        $id->delete();
        return response()->json('success');
    }
}
