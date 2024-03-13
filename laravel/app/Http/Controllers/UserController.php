<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        $pets = $id->pets()->whereDoesntHave('adoptionRequests', function ($query) {
            $query->whereIn('status', ['accepted', 'done']);
        })->paginate(12);
        // $pets = $id->pets()->paginate(12); // Fix: Call paginate() before get()

        return view('user.profile', [
            'user' => $id,
            'pets' => $pets
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        $data = $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $filename = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = $file->storeAs('profile_image', $filename, 'public');
            if (File::exists($id->img)) {
                File::delete($id->img);
            }
        }

        $data['img'] = 'storage/' . $path;
        $id->update($data);
        notify()->success('', 'Profile Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        //
    }

    public function markAsRead()
    {
        $user = User::find(auth()->id());
        $user->notifications()->delete();
        return redirect()->back();
    }
}
