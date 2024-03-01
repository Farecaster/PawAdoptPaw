@extends('layout.app')

@section('content')
    <div class="container py-4" style="min-height: 100vh; margin-top: 20vh;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>User Profile</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pet-info text-center">
                                    <img src="{{ asset($incomingRequest->pet->img) }}" alt="Pet Image"
                                        class="img-fluid mb-3">
                                    <h5>{{ $incomingRequest->pet->name }}</h5>
                                    <p class="mb-1">Breed: {{ $incomingRequest->pet->breed }}</p>
                                    <!-- Add more pet details as needed -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="user-info">
                                    <h5>User Information</h5>
                                    <p><strong>Name:</strong> {{ $incomingRequest->name }}</p>
                                    <p><strong>Address:</strong> {{ $incomingRequest->address }}</p>
                                    <p><strong>City:</strong> {{ $incomingRequest->city }}</p>
                                    <p><strong>Contact Number:</strong> {{ $incomingRequest->contact_number }}</p>
                                    <p><strong>Additional Comment:</strong></p>
                                    <div class="additional-comment overflow-auto" style="max-height: 150px; color: #fffffe;">
                                        {{ $incomingRequest->additional_comment }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-md-6">
                                <div class="actions text-center">
                                    <a href="{{ route('user.profile', ['id' => $incomingRequest->user_id]) }}"
                                        class="btn btn-primary btn-block mb-2">View Profile</a>

                                    <form action="{{ route('accept.request', ['id' => $incomingRequest->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-block mb-2">Accept</button>
                                    </form>

                                    <form action="{{ route('reject.request', ['id' => $incomingRequest->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-block">Reject</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
