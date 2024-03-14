@extends('layout.app')

@section('content')
    <section class="pet section-padding mt-">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <img src="{{ asset($pet->img) }}" class="card-img-top mx-auto" alt=""
                                    style="width: 80%; height: auto;">
                                <div class="card-body text-center">
                                    <h1 class="card-title" style="color:#bae8e8;">{{ $pet->name }}</h1>
                                    <h6 class="card-subtitle mb-2">Breed: {{ $pet->breed }}</h6>
                                    <h6 class="card-subtitle mb-2">Age: {{ $pet->age }} years old</h6>
                                    <h6 class="card-subtitle mb-2">Gender: {{ $pet->gender }}</h6>
                                    <h6 class="card-subtitle mb-2">Species: {{ $pet->species }}</h6>
                                    <h6 class="card-subtitle mb-2">Region: {{ $pet->region }}</h6>
                                    <p class="card-text">{{ $pet->description }}</p>

                                    @if ($pet->isAdopted())
                                        <p class="card-text">This pet has already found a new home.</p>
                                    @else
                                        @auth
                                            @if (Auth::id() !== $pet->user->id)
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('pet.adopt.create', ['pet' => $pet]) }}"
                                                        class="btn"class="btn"
                                                        style="background-color: #bae8e8; color: #272343;">Adopt Me</a>
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#reportModal">Report</button>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('pet.edit', ['pet' => $pet]) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('pet.delete', ['pet' => $pet]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                        @guest
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('login') }}" class="btn btn-primary">Log in to adopt
                                                    this
                                                    pet</a>
                                            </div>
                                        @endguest
                                        @if (Auth::id() != $pet->user->id)
                                            <div class="mt-3">
                                                <a href="{{ route('user.profile', ['id' => $pet->user->id]) }}"
                                                    class="btn btn-secondary">
                                                    <i class="bi bi-person"></i> {{ $pet->user->name }}
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (Auth::id() !== $pet->user->id)
        <div class="container">
            <h5>Pets you may also like</h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3">
                @foreach ($pets as $pet)
                    <div class="col">
                        <a href="{{ route('pet.show', ['pet' => $pet]) }}" class="text-decoration-none">
                            <div class="card" style="height: 100%;">
                                <img src="{{ asset($pet->img) }}" class="card-img-top" alt="..."
                                    style="height: 300px; object-fit: contain;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pet->name }}</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($pet->description, 100, $end = '...') }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button class="btn" style="background-color: #bae8e8; color: #272343;">Click for
                                        more</button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">{{ $pets->links() }}</div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pet.report', ['pet' => $pet]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason for reporting:</label>
                            <input type="text" name="reason" class="form-control" id="reason"
                                placeholder="Enter reason" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
