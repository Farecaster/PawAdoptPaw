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
                                    <h1 class="card-title">{{ $pet->name }}</h1>
                                    <h6 class="card-subtitle mb-2 text-muted">Breed: {{ $pet->breed }}</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">Age: {{ $pet->age }} years old</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">Gender: {{ $pet->gender }}</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">Species: {{ $pet->species }}</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">Region: {{ $pet->region }}</h6>
                                    <p class="card-text">{{ $pet->description }}</p>

                                    @if ($pet->isAdopted())
                                        <p class="card-text">This pet has already found a new home.</p>
                                    @else
                                        @auth
                                            @if (Auth::id() !== $pet->user->id)
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('pet.adopt.create', ['pet' => $pet]) }}"
                                                        class="btn btn-primary">Adopt Me</a>
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

                                        <div class="mt-3">
                                            <a href="{{ route('user.profile', ['id' => $pet->user->id]) }}"
                                                class="btn btn-secondary">
                                                <i class="bi bi-person"></i> {{ $pet->user->name }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
