<?php

namespace App\Http\Controllers\Api;

use App\Events\AcceptRequestEvent;
use App\Events\AdoptionRequestEvent;
use App\Events\DoneRequestEvent;
use App\Events\RejectRequestEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdoptionRequest;
use App\Models\Pet;
use App\Notifications\AcceptRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AdoptionRequest as NotificationsAdoptionRequest;
use App\Notifications\DoneRequest;
use App\Notifications\RejectRequest;

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
    public function showIncomingRequestDetails(AdoptionRequest $id)
    {

        // Check if the authenticated user is the owner of the pet
        if (auth()->id() !== $id->pet->user_id) {
            return response()->json([
                "message" => "unauthorized"
            ]);
        }
        if ($id->status !== 'pending') {
            return response()->json([
                "message" => "not found"
            ]);
        }

        // Display the details of the incoming adoption request
        return response()->json($id);
    }

    public function pendingRequest()
    {
        $onGoingRequests = AdoptionRequest::with('pet')
            ->whereHas('user', function ($query) {
                $query->where('id', Auth::id());
            })
            ->whereIn('status', ['accepted', 'rejected'])
            ->get();

        return response()->json($onGoingRequests);
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
    public function onGoingRequestDetails(AdoptionRequest $id)
    {
        if (auth()->id() !== $id->pet->user_id) {
            return response()->json([
                'message' => "unathenticated"
            ]);
        }
        return response()->json($id);
    }

    public function history()
    {
        $historyOwner = AdoptionRequest::with('pet')
            ->whereHas('pet', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereIn('status', ['rejected', 'done'])
            ->get();

        $historyAdopter = AdoptionRequest::where('user_id', auth()->id())
            ->whereIn('status', ['rejected', 'done'])
            ->get();

        $history = [];

        foreach ($historyOwner as $request) {
            $statusMessage = $request->status == 'done' ? 'successfully adopted' : 'adoption request rejected';
            $history[] = [
                'status' => $statusMessage,
                'pet_name' => $request->pet->name,
                'pet_img' => $request->pet->img,
                'details_url' => route('pending.requests.details', ['id' => $request->id])
            ];
        }

        foreach ($historyAdopter as $request) {
            $statusMessage = $request->status == 'done' ? 'successfully adopted' : 'adoption request rejected';
            $history[] = [
                'status' => $statusMessage,
                'pet_name' => $request->pet->name,
                'pet_img' => $request->pet->img,
                'details_url' => route('pending.requests.details', ['id' => $request->id])
            ];
        }

        return response()->json($history);
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

        $pet = Pet::findOrFail($pet);
        $owner = $pet->user()->first();
        $notifurl = route('incoming.requests');
        $owner->notify(new NotificationsAdoptionRequest($pet->name, $notifurl));
        event(new AdoptionRequestEvent($pet->name, $notifurl, $owner->id));

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

        $requester = $id->user()->first();
        $requester->notify(new AcceptRequest(route('pending.request')));
        event(new AcceptRequestEvent($id->pet->user->name, route('pending.request'), $id->user->id));

        return response()->json(['message' => 'Adoption request accepted successfully']);
    }

    public function rejectRequest(Request $request, AdoptionRequest $id)
    {
        if (Auth::id() !== $id->pet->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $id->update(['status' => 'rejected']);

        $requester = $id->user()->first();
        $requester->notify(new RejectRequest(route('pending.request')));
        event(new RejectRequestEvent($id->pet->user->name, route('pending.request'), $id->user->id));

        return response()->json(['message' => 'Adoption request rejected successfully']);
    }

    public function doneRequest(Request $request, AdoptionRequest $id)
    {
        if (Auth::id() !== $id->pet->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $id->update(['status' => 'done']);

        $requester = $id->user()->first();
        $requester->notify(new DoneRequest($id->pet->name, route('history'), $id->user->name));
        event(new DoneRequestEvent($id->pet->user->name, route('pending.request'), $id->user->id));
        
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
