@extends('layout.app')

@section('content')
    <section class="pet section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-5 pt-5">
                    <div class="row z-depth-3">
                        <div class="card mb-3">
                            <img src="{{ asset($pet->img) }}" class="card-img-top mx-auto" alt=""
                                style="width: 80%; height: auto;>
                        </div>
                        </div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $pet->name }}</h1>
                                <h6 class="card-subtitle text-body-secondary">Breed: {{ $pet->breed }}</h6>
                                <h6 class="card-subtitle text-body-secondary">Age: {{ $pet->age }} years old</h6>
                                <h6 class="card-subtitle text-body-secondary">Specie: {{ $pet->species }}</h6>
                                <h6 class="card-subtitle text-body-secondary">Region: {{ $pet->region }}</h6>
                                <p class="card-text">{{ $pet->description }}</p>

                                @if ($pet->isAdopted())
                                    <p class="card-text">This pet has already found a new home.</p>
                                @else
                                    @auth
                                        @if (Auth::id() !== $pet->user->id)
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('pet.adopt.create', ['pet' => $pet]) }}"
                                                    class="btn btn-primary">Adopt Me</a>
                                                <button class="btn bg-danger text-white" data-bs-toggle="modal"
                                                    data-bs-target="#reportModal">Report</button>
                                            </div>
                                        @else
                                            <div class="d-flex gap-2">
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
                                        <a href="{{ route('login') }}" class="btn btn-primary">Log in to adopt this pet</a>
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
    </section>
    <!-- Modal -->


    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="adoptModalLabel" aria-hidden="true">
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
                            <label for="adopterName" class="form-label">Why are you reporting this
                                post?</label>
                            <input type="text" name="reason" class="form-control" id="adopterName"
                                placeholder="reason..." required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="liveToastBtn">Submit
                            Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
