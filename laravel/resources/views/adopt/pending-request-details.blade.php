@extends('layout.app')

@section('content')
    <div class="container py-4" style="min-height: 100vh; margin-top: 20vh;">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($onGoingRequest->pet->img) }}" alt="Pet Image" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $onGoingRequest->pet->name }}</h5>
                        <ul class="list-unstyled" style="color: white; margin-bottom: 100px;">
                            <li><strong>Breed:</strong> {{ $onGoingRequest->pet->breed }}</li>
                            <li><strong>User Name:</strong> {{ $onGoingRequest->name }}</li>
                            <li><strong>Address:</strong> {{ $onGoingRequest->address }}</li>
                            <li><strong>City:</strong> {{ $onGoingRequest->city }}</li>
                            <li><strong>Contact Number:</strong> {{ $onGoingRequest->contact_number }}</li>
                            <li><strong>Additional Comment:</strong> {{ $onGoingRequest->additional_comment }}</li>
                        </ul>
                        <div>
                            <a href="{{ route('user.profile', ['id' => $onGoingRequest->pet->user_id]) }}"
                                class="btn" style="background-color: #bae8e8; color: #272343;">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
