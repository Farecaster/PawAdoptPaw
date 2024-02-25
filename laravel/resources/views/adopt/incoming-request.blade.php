@extends('layout.app')

@section('content')
    <section id="petprofile" class="incoming section-padding">
        <div class="container user-profile mt-5">
            @if ($incomingRequests->isNotEmpty())
                <div class="text-center mb-5">
                    <h1 class="display-4">Incoming Requests</h1>
                    <hr class="w-25 mx-auto">
                </div>

                <div class="row">
                    @foreach ($incomingRequests as $request)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border border-dark">
                                <img src="{{ $request->pet->img }}" alt="pet" class="card-img-top"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a>
                                    </h5>
                                    <p class="card-text"><strong>Requester Name:</strong> {{ $request->name }}</p>
                                    <p class="card-text"><strong>Address:</strong> {{ $request->address }}</p>
                                    <p class="card-text"><strong>City:</strong> {{ $request->city }}</p>
                                    <p class="card-text"><strong>Contact Number:</strong> {{ $request->contact_number }}</p>
                                    <a href="{{ route('incoming.requests.details', ['id' => $request->id]) }}"
                                        class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center my-5">
                    <h2 class="text-muted">No adopter requests available.</h2>
                    <p class="text-muted">By opening your heart and home to a new furry friend, you're not just giving them
                        a home, but you're also creating space for another animal in need to find love and care.</p>
                    <a href="{{ route('post-for-adoption.store') }}" class="btn btn-primary btn-lg mt-3">Find Your Pet a New
                        Home now!</a>
                </div>
            @endif
        </div>
    </section>
@endsection
