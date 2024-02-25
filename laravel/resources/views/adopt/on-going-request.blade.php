@extends('layout.app')

@section('content')
    <section id="petprofile" class="ongoing section-padding">
        <div class="container user-profile">
            @if ($onGoingRequests->isNotEmpty())
                <div class="text-center mb-5">
                    <h1 class="display-4">On Going Requests</h1>
                    <hr class="w-25 mx-auto">
                </div>

                <div class="row">
                    @foreach ($onGoingRequests as $request)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border border-dark shadow">
                                <img src="{{ asset($request->pet->img) }}" class="card-img-top" alt="pet"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('pet.show', ['pet' => $request->pet->id]) }}"
                                            class="text-dark">{{ $request->pet->name }}</a></h5>
                                    <p class="card-text"><strong>Requester Name:</strong> {{ $request->name }}</p>
                                    <p class="card-text"><strong>Address:</strong> {{ $request->address }}</p>
                                    <p class="card-text"><strong>City:</strong> {{ $request->city }}</p>
                                    <a href="{{ route('ongoing.requests.details', ['id' => $request->id]) }}"
                                        class="btn btn-primary">View Details</a>
                                    <form action="{{ route('done.request', ['id' => $request->id]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-success ml-2">Done</button>
                                    </form>
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
