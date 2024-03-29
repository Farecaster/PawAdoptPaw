<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetSocial;
use App\Models\ReportedPetSocialPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PetSocialController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        // Retrieve posts along with information about whether the authenticated user has liked each post
        $posts = PetSocial::with(['likes' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->with('user')->whereDoesntHave('user', function ($query) {
            $query->where('id', Auth::id());
        })->inRandomOrder()->get();

        $posts->transform(function ($post) {
            $post->like_count = $post->likes()->count();
            if (Auth::user()->likes->contains($post->id)) {
                $post->is_Liked = 1;
            } else {
                $post->is_Liked = 0;
            }
            unset($post->likes); // Remove the likes collection from the response
            return $post;
        });


        return response()->json($posts);
    }
    public function ownposts()
    {
        $userId = Auth::id();

        // Retrieve posts along with information about whether the authenticated user has liked each post
        $posts = PetSocial::with(['likes' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->with('user')->whereHas('user', function ($query) {
            $query->where('id', auth()->id());
        })->orderBy('id', 'DESC')->get();

        $posts->transform(function ($post) {
            $post->like_count = $post->likes()->count();
            if (Auth::user()->likes->contains($post->id)) {
                $post->is_Liked = 1;
            } else {
                $post->is_Liked = 0;
            }
            unset($post->likes); // Remove the likes collection from the response
            return $post;
        });


        return response()->json($posts);
    }
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
        return response()->json(['message' => 'Posted Successfully']);
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
        $data = $request->validate([
            'reason' => 'required|string|min:1|max:255',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['pet_social_id'] = $id->id;

        ReportedPetSocialPost::create($data);
        return response()->json(['message' => 'Posted Successfully']);
    }

    public function show(User $id)
    {
        $posts = $id->PetSocials()->get();
        return response()->json(['posts' => $posts, 'user' => $id]);
    }
    public function edit(PetSocial $id)
    {
        if (auth()->id() != $id->user_id) {
            abort(404);
        }
        return response()->json($id);
    }
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
        return response()->json('success');
    }
    public function destroy(PetSocial $id)
    {
        if (File::exists($id->img)) {
            File::delete($id->img);
        }
        $id->delete();
        return response()->json('success');
    }
}
