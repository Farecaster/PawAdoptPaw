@extends('layout.app')

@section('content')
    <section id="petprofile" class="ongoing section-padding">
        <div class="container">
            @if ($onGoingRequests->isNotEmpty())
                <h1 class="text-center mb-4">Pending Requests</h1>

                <div class="row">
                    @foreach ($onGoingRequests as $request)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset($request->pet->img) }}" class="card-img-top" alt="pet">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a>
                                    </h5>
                                    <p class="card-text"><strong>Requester Name:</strong> {{ $request->name }}</p>
                                    <p class="card-text"><strong>Address:</strong> {{ $request->address }}</p>
                                    <p class="card-text"><strong>City:</strong> {{ $request->city }}</p>
                                    <p class="card-text"><strong>STATUS:</strong>
                                        @if ($request->status == 'accepted')
                                            <span class="text-success">{{ $request->status }}</span>
                                        @else
                                            <span class="text-danger">{{ $request->status }}</span>
                                        @endif
                                    </p>
                                    <a href="{{ route('pending.requests.details', ['id' => $request->id]) }}"
                                        class="btn btn-primary btn-block">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center my-5">
                    <h2 class="text-muted">No accepted requests available</h2>
                    <p class="text-muted">It seems there are no accepted requests at the moment.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
