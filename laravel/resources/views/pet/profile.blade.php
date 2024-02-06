@extends('layout.app')
@section('content')
    <div class="container pet-profile">
        <img src="{{ asset($pet->img) }}" alt="" width="100px">
        <h1>{{ $pet->name }}</h1>
        <h1>{{ $pet->age }}</h1>
        <h1>{{ $pet->species }}</h1>
        <h1>{{ $pet->breed }}</h1>
        <p>{{ $pet->description }}</p>

        @if ($pet->isAdopted())
            <p>This pet has already found a new home.</p>
        @else
            @auth
                @if (Auth::id() !== $pet->user->id)
                    <a href="{{ route('pet.adopt.create', ['pet' => $pet]) }}">Adopt Me</a>
                    <div>
                        <button class="btn bg-danger text-white" data-bs-toggle="modal"
                            data-bs-target="#adoptModal">Report</button>
                    </div>
                @else
                    <a href="{{ route('pet.edit', ['pet' => $pet]) }}">Edit</a>
                    <form action="{{ route('pet.delete', ['pet' => $pet]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                @endif
            @endauth
            @guest
                <a href="{{ route('login') }}">Log in to adopt this pet</a>
            @endguest

            <div>
                <a href="{{ route('user.profile', ['id' => $pet->user->id]) }}">{{ $pet->user->name }}</a>
            </div>
        @endif
    </div>


    <div class="modal fade" id="adoptModal" tabindex="-1" aria-labelledby="adoptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adoptModalLabel">Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Adoption Form -->
                    <form method="POST" action="{{ route('pet.report', ['pet' => $pet]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="adopterName" class="form-label">Why are you reporting this post?</label>
                            <input type="text" name="reason" class="form-control" id="adopterName"
                                placeholder="reason..." required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="liveToastBtn">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
