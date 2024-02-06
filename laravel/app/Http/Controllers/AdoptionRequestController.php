<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function myRequest()
    {
        $user = User::findOrFail(auth()->id());
        $adoptionRequests = $user->adoptionRequests()->where('status', 'pending')->get();
        // dd($user->adoptionRequests);
        return view('adopt.my-request', ['adoptionRequests' => $adoptionRequests]);
    }
    public function incomingRequest()
    {
        $incomingRequests = AdoptionRequest::with('pet')->whereHas('pet', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->where('status', 'pending')->get();

        return view('adopt.incoming-request', ['incomingRequests' => $incomingRequests]);
    }

    public function onGoingRequestOwner()
    {
        $onGoingRequests = AdoptionRequest::with('pet')
            ->whereHas('pet', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->where('status', 'accepted')
            ->get();

        return view('adopt.on-going-request', ['onGoingRequests' => $onGoingRequests]);
    }
    public function history()
    {
        //owner logic
        $historyOwner = AdoptionRequest::with('pet')
            ->whereHas('pet', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereIn('status', ['rejected', 'done'])
            ->get();

        //adopter logic
        $historyAdopter = AdoptionRequest::where('user_id', auth()->id())->whereIn('status', ['rejected', 'done'])->get();
        return view('adopt.history', ['historyOwner' => $historyOwner, 'historyAdopter' => $historyAdopter]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($pet)
    {
        if (auth()->id() === Pet::find($pet)->user_id) {
            abort(404);
        }
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

        // Check if the user already has an adoption request for the specific pet
        $existingRequest = AdoptionRequest::where('user_id', $userId)
            ->where('pet_id', $pet)
            ->first();

        if ($existingRequest) {
            // User already has a request for this pet, handle accordingly (e.g., show a message)
            return redirect()->back()->with('error', 'You have already submitted an adoption request for this pet.');
        }

        $data['user_id'] = $userId;
        $data['pet_id'] = $pet;

        AdoptionRequest::create($data);
        return redirect(route('pets'));
    }


    /**
     * Display the specified resource.
     */
    public function showIncomingRequestDetails(AdoptionRequest $id)
    {

        // Check if the authenticated user is the owner of the pet
        if (auth()->id() !== $id->pet->user_id) {
            abort(404);
        }
        if ($id->status !== 'pending') {
            abort(404);
        }

        // Display the details of the incoming adoption request
        return view('adopt.incoming-request-details', ['incomingRequest' => $id]);
    }

    public function onGoingRequestDetails(AdoptionRequest $id)
    {
        if (auth()->id() !== $id->pet->user_id) {
            abort(404);
        }
        return view('adopt.on-going-request-details', ['onGoingRequest' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function myRequestEdit(AdoptionRequest $id)
    {
        if ($id->user_id !== auth()->id()) {
            return abort(404);
        }
        return view('adopt.my-request-edit', ['requests' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdoptionRequest $adoptionRequest)
    {
        //
    }
    public function acceptRequest(Request $request, AdoptionRequest $id)
    {
        // Check if the authenticated user is the owner of the related pet
        if (auth()->id() !== $id->pet->user_id) {
            abort(403, 'Unauthorized'); // You can customize the error message and status code
        }
        // Reject other pending adoption requests for the same pet
        AdoptionRequest::where('pet_id', $id->pet_id)
            ->where('status', 'pending')
            ->where('id', '!=', $id->id) // Exclude the current request
            ->update(['status' => 'rejected']);

        // Update the status of the current adoption request to accepted
        $id->update([
            'status' => 'accepted',
        ]);
        return redirect(route('ongoing.requests.owner'));
    }
    public function rejectRequest(Request $request, AdoptionRequest $id)
    {
        // Check if the authenticated user is the owner of the related pet
        if (auth()->id() !== $id->pet->user_id) {
            abort(403, 'Unauthorized'); // You can customize the error message and status code
        }

        // Update the status of the adoption request
        $id->update([
            'status' => 'rejected',
        ]);
        return redirect(route('history'));
    }
    public function doneRequest(Request $request, AdoptionRequest $id)
    {
        // Check if the authenticated user is the owner of the related pet
        if (auth()->id() !== $id->pet->user_id) {
            abort(403, 'Unauthorized'); // You can customize the error message and status code
        }

        // Update the status of the adoption request
        $id->update([
            'status' => 'done',
        ]);
        return redirect(route('history'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function myRequestDestroy(AdoptionRequest $id)
    {
        if (auth()->id() !== $id->user_id) {
            abort(404);
        }
        $id->delete();
        return redirect(route('my.requests'));
    }
}
