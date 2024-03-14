@extends('layout.app')

@section('content')
    <section>
        <section class="py-5 my-5">
            <div class="container" style="background-color: #272343;">
                <h1 style="color: #fffffe; margin-left: 20px;">Pet Details</h1>
                <div class="row g-2 align-items-start">
                    <div class="col-6">
                        <div>
                            <div class="profile-tab-nav border-right">
                                <div class="p-3">
                                    <div class="header-wrapper">
                                        <div class="container text-center">
                                            <div class="row">
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset($pet->img) }}" class="card-img-top mx-auto"
                                                        alt="" style="width: 80%; height: auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3">
                            <br>
                            <h1 class="card-title" style="color: #fffffe;">{{ $pet->name }}</h1>
                            <br>
                            <p class="card-subtitle mb-2" style="color: #fffffe;"><strong>Breed:
                                </strong>{{ $pet->breed }}</p>
                            <p class="card-subtitle mb-2" style="color: #fffffe;"><strong>Age: </strong>{{ $pet->age }}
                                years old</p>
                            <p class="card-subtitle mb-2" style="color: #fffffe;"><strong>Gender:
                                </strong>{{ $pet->gender }}</p>
                            <p class="card-subtitle mb-2" style="color: #fffffe;"><strong>Species:
                                </strong>{{ $pet->species }}</p>
                            <p class="card-subtitle mb-2" style="color: #fffffe;"><strong>Region:
                                </strong>{{ $pet->region }}</p>
                            <p class="card-text"><strong>About pet: </strong>{{ $pet->description }}</p>
                            <br>

                            @if ($pet->isAdopted())
                                <p class="card-text">This pet has already found a new home.</p>
                            @else
                                @auth
                                    @if (Auth::id() !== $pet->user->id)
                                        <div class="d-flex justify-content-start gap-2">
                                            <a href="{{ route('pet.adopt.create', ['pet' => $pet]) }}" class="btn"class="btn"
                                                style="background-color: #bae8e8; color: #272343;">Adopt Me
                                            </a>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#reportModal">Report</button>

                                            <a href="{{ route('user.profile', ['id' => $pet->user->id]) }}"
                                                class="btn btn-secondary">
                                                <i class="bi bi-person"></i> {{ $pet->user->name }}
                                            </a>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-start gap-2">
                                            <a href="{{ route('pet.edit', ['pet' => $pet]) }}" class="btn btn-warning">Edit</a>
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
                                            this pet
                                        </a>
                                    </div>
                                @endguest
                            @endif
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
