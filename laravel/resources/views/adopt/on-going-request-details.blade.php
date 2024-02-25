@extends('layout.app')

@section('content')
    <div class="container py-4" style="min-height: 100vh; margin-top: 20vh;">
        <div class="row justify-content-center">
            <div class="col-md-10"> <!-- Increased the width to col-md-10 -->
                <div class="card shadow" style="min-height: inherit;">
                    <!-- Added min-height: inherit; to override the parent container's height -->
                    <div class="card-header bg-primary text-white text-center">
                        <h4>User Profile</h4>
                    </div>

                    <div class="card-body py-4"> <!-- Increased the padding to py-4 -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pet-info text-center">
                                    <img src="{{ asset($onGoingRequest->pet->img) }}" alt="Pet Image"
                                        class="img-fluid mb-3 rounded-circle" style="width: 150px; height: 150px;">
                                    <h5>{{ $onGoingRequest->pet->name }}</h5>
                                    <p class="mb-1">Breed: {{ $onGoingRequest->pet->breed }}</p>
                                    <!-- Add more pet details as needed -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="user-info">
                                    <h5>User Information</h5>
                                    <p><strong>Name:</strong> {{ $onGoingRequest->name }}</p>
                                    <p><strong>Address:</strong> {{ $onGoingRequest->address }}</p>
                                    <p><strong>City:</strong> {{ $onGoingRequest->city }}</p>
                                    <p><strong>Contact Number:</strong> {{ $onGoingRequest->contact_number }}</p>
                                    <p><strong>Additional Comment:</strong></p>
                                    <div class="additional-comment overflow-auto" style="max-height: 150px;">
                                        {{ $onGoingRequest->additional_comment }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-md-6">
                                <div class="actions text-center">
                                    <a href="{{ route('user.profile', ['id' => $onGoingRequest->user_id]) }}"
                                        class="btn btn-outline-primary btn-block mb-2">View Profile</a>

                                    @if ($onGoingRequest->status !== 'done' && $onGoingRequest->status !== 'rejected')
                                        <form action="{{ route('done.request', ['id' => $onGoingRequest->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-success btn-block">Done</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
