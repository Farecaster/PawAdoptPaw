<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function yourRequest()
    {
        $user = User::findOrFail(auth()->id());
        // dd($user->adoptionRequests);
        return view('adopt.my-request', ['adoptionRequests' => $user->adoptionRequests]);
    }
    public function incomingRequest()
    {
        $user = Auth::user();
        $incomingRequests = AdoptionRequest::whereHas('pet', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        return view('adopt.incoming-request', ['incomingRequests' => $incomingRequests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($pet)
    {
        return view('adopt.create', ['pet' => $pet]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $pet)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'contact_number' => 'required|numeric',
            'veterinary_information' => 'required|accepted',
            'adoption_agreement' => 'required|accepted',
            'additional_comment' => 'required',
        ]);
        $userId = auth()->id();

        // Check if the user already has an adoption request
        $existingRequest = AdoptionRequest::where('user_id', $userId)->first();

        if ($existingRequest) {
            // User already has a request, handle accordingly (e.g., show a message)
            return redirect()->back()->with('error', 'You have already submitted an adoption request.');
        }

        $data['user_id'] = $userId;
        $data['pet_id'] = $pet;

        AdoptionRequest::create($data);
        return redirect(route('pets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AdoptionRequest $adoptionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdoptionRequest $adoptionRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdoptionRequest $adoptionRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdoptionRequest $adoptionRequest)
    {
        //
    }
}
