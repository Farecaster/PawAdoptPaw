@extends('layout.app')
@section('content')
    <div class="container text-center user-profile">
        <div class="request-details">
            <div class="pet-info">
                {{-- @dd($incomingRequest->pet->img); --}}
                <img src="{{ asset($onGoingRequest->pet->img) }}" alt="Pet Image" class="img-fluid thumbnail">
                <div class="pet-details">
                    <h2>{{ $onGoingRequest->pet->name }}</h2>
                    <p>Breed: {{ $onGoingRequest->pet->breed }}</p>
                    <!-- Add more pet details as needed -->
                </div>
            </div>

            <div class="user-info mt-4">
                <h2>User Information</h2>
                <p><strong>Name:</strong> {{ $onGoingRequest->name }}</p>
                <p><strong>Address:</strong> {{ $onGoingRequest->address }}</p>
                <p><strong>City:</strong> {{ $onGoingRequest->city }}</p>
                <p><strong>Contact Number:</strong> {{ $onGoingRequest->contact_number }}</p>
                <p><strong>Additional Comment:</strong></p>
                <div class="additional-comment overflow-auto" style="max-height: 150px;">
                    {{ $onGoingRequest->additional_comment }}
                </div>
                <div class="actions mt-4">
                    <a href="{{ route('user.profile', ['id' => $onGoingRequest->user_id]) }}" class="btn btn-primary">View
                        Profile</a>

                    @if ($onGoingRequest->status !== 'done' && $onGoingRequest->status !== 'rejected')
                        <form action="{{ route('done.request', ['id' => $onGoingRequest->id]) }}" method="POST">
                            @csrf
                            @method('put')
                            <button class="btn btn-success">Done</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
