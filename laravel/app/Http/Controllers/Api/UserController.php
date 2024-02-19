<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function show(User $id)
    {
        $pets = $id->pets()->get(); // Fix: Call paginate() before get()

        return response()->json([
        'user' => $id,
        'pets' => $pets]);
    }
    public function update(Request $request, User $id){
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
        return response(['message' => 'done']);
    }
}
