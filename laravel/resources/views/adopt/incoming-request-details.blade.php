@extends('layout.app')
@section('content')
    <div class="container text-center user-profile">
        <div class="request-details">
            <div class="pet-info">
                {{-- @dd($incomingRequest->pet->img); --}}
                <img src="{{ asset($incomingRequest->pet->img) }}" alt="Pet Image" class="img-fluid thumbnail">
                <div class="pet-details">
                    <h2>{{ $incomingRequest->pet->name }}</h2>
                    <p>Breed: {{ $incomingRequest->pet->breed }}</p>
                    <!-- Add more pet details as needed -->
                </div>
            </div>

            <div class="user-info mt-4">
                <h2>User Information</h2>
                <p><strong>Name:</strong> {{ $incomingRequest->name }}</p>
                <p><strong>Address:</strong> {{ $incomingRequest->address }}</p>
                <p><strong>City:</strong> {{ $incomingRequest->city }}</p>
                <p><strong>Contact Number:</strong> {{ $incomingRequest->contact_number }}</p>
                <p><strong>Additional Comment:</strong></p>
                <div class="additional-comment overflow-auto" style="max-height: 150px;">
                    {{ $incomingRequest->additional_comment }}
                </div>
                <div class="actions mt-4">
                    <a href="{{ route('user.profile', ['id' => $incomingRequest->user_id]) }}" class="btn btn-primary">View
                        Profile</a>

                    <form action="{{ route('accept.request', ['id' => $incomingRequest->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                    <form action="{{ route('reject.request', ['id' => $incomingRequest->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
