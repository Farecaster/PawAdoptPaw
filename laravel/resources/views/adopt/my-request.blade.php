@extends('layout.app')

@section('content')
    <section id="petprofile" class="myrequest section-padding">
        <div class="container user-profile">
            @if ($adoptionRequests->isNotEmpty())
                <h1 class="text-center">Adoption Request</h1>

                <div class="row">
                    @foreach ($adoptionRequests as $request)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ $request->pet->img }}" class="card-img-top" alt="pet">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a></h5>
                                    <p class="card-text"><strong>Name:</strong> {{ $request->name }}</p>
                                    <p class="card-text"><strong>Address:</strong> {{ $request->address }}</p>
                                    <div class="text-center">
                                        <a href="{{ route('my.requests.edit', ['id' => $request->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('my.requests.delete', ['id' => $request->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center my-5">
                    <h2 class="text-muted">No adoption requests available.</h2>
                    <p class="text-muted">Explore our available pets and find your perfect match:</p>
                    <a href="{{ route('pets') }}" class="btn btn-primary btn-lg mt-3">Browse Available Pets</a>
                </div>
            @endif
        </div>
    </section>
@endsection
