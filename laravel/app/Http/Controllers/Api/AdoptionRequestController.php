<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdoptionRequest;
use Illuminate\Support\Facades\Auth;

class AdoptionRequestController extends Controller
{
    public function myRequest()
    {
        $user = Auth::user();
        $adoptionRequests = $user->adoptionRequests()
            ->where('status', 'pending')
            ->get();

        // Collect pet for each adoption request
        $adoptionRequests->map(function ($request) {
            return $request->pet;
        });

        return response()->json(
            $adoptionRequests
        );
    }


    public function incomingRequest()
    {
        $incomingRequests = AdoptionRequest::with('pet')
            ->whereHas('pet', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->where('status', 'pending')
            ->get();

        return response()->json($incomingRequests);
    }

    public function onGoingRequestOwner()
    {
        $onGoingRequests = AdoptionRequest::with('pet')
            ->whereHas('pet', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->where('status', 'accepted')
            ->get();

        return response()->json($onGoingRequests);
    }

    public function history()
    {
        $historyOwner = AdoptionRequest::with('pet')
            ->whereHas('pet', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereIn('status', ['rejected', 'done'])
            ->get();

        $historyAdopter = AdoptionRequest::where('user_id', auth()->id())->whereIn('status', ['rejected', 'done'])->get();

        return response()->json(['historyOwner' => $historyOwner, 'historyAdopter' => $historyAdopter]);
    }

    public function create($pet)
    {
        if (Auth::id() === $pet->user_id) {
            return response()->json(['error' => 'You are not authorized to create adoption request for your own pet.'], 403);
        }

        return response()->json(['pet' => $pet]);
    }

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

        $existingRequest = AdoptionRequest::where('user_id', auth()->id())
            ->where('pet_id', $pet)
            ->first();

        if ($existingRequest) {
            return response()->json(['error' => 'You have already submitted an adoption request for this pet.'], 403);
        }

        $data['user_id'] = auth()->id();
        $data['pet_id'] = $pet;

        AdoptionRequest::create($data);
        return response()->json(['message' => 'Adoption request created successfully'], 201);
    }

    public function myRequestEdit(AdoptionRequest $id)
    {
        if ($id->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($id);
    }

    public function update(Request $request, AdoptionRequest $id)
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

        $id->update($data);
        return response()->json(['message' => 'Adoption request updated successfully']);
    }

    public function acceptRequest(Request $request, AdoptionRequest $id)
    {
        if (Auth::id() !== $id->pet->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        AdoptionRequest::where('pet_id', $id->pet_id)
            ->where('status', 'pending')
            ->where('id', '!=', $id->id)
            ->update(['status' => 'rejected']);

        $id->update(['status' => 'accepted']);
        return response()->json(['message' => 'Adoption request accepted successfully']);
    }

    public function rejectRequest(Request $request, AdoptionRequest $id)
    {
        if (Auth::id() !== $id->pet->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $id->update(['status' => 'rejected']);
        return response()->json(['message' => 'Adoption request rejected successfully']);
    }

    public function doneRequest(Request $request, AdoptionRequest $id)
    {
        if (Auth::id() !== $id->pet->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $id->update(['status' => 'done']);
        return response()->json(['message' => 'Adoption request marked as done successfully']);
    }

    public function myRequestDestroy(AdoptionRequest $id)
    {
        if (Auth::id() !== $id->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $id->delete();
        return response()->json(['message' => 'Adoption request deleted successfully']);
    }
}
