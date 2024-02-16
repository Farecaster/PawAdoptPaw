@extends('layout.app')

@section('content')
    <section class="pet section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-5 pt-5">
                    <div class="row z-depth-3">
                        <div class="card mb-3">
                            <img src="{{ asset($pet->img) }}" class="card-img-top mx-auto" alt="" style="width: 80%; height: auto;>
                        </div>
                        </div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $pet->name }}</h1>
                                <h6 class="card-subtitle text-body-secondary">Breed: {{ $pet->breed }}</h6>
                                <h6 class="card-subtitle text-body-secondary">Age: {{ $pet->age }} years old</h6>
                                <h6 class="card-subtitle text-body-secondary">Specie: {{ $pet->species }}</h6>
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
                                                    data-bs-target="#adoptModal">Report</button>
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

                        <div class="modal fade" id="adoptModal" tabindex="-1" aria-labelledby="adoptModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="adoptModalLabel">Adopt Me</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Adoption Form -->
                                        <form>
                                            <div class="mb-3">
                                                <label for="adopterName" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="adopterName" placeholder="Enter your name"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="adopterEmail" class="form-label">Address</label>
                                                <input type="email" class="form-control" id="adopterAddress"
                                                    placeholder="Enter your address" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="adopterEmail" class="form-label">City</label>
                                                <input type="text" class="form-control" id="adopterCity" placeholder="City" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="adopterEmail" class="form-label">Phone number</label>
                                                <input type="text" class="form-control" id="adopterNumber" placeholder="+639" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="adopterEmail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="adopterEmail" placeholder="Enter your email"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="adopterEmail" class="form-label">Date of Birth</label>
                                                <input type="month" class="form-control" id="adopterBirtdate" placeholder="Birthdate"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="adopterEmail" class="form-label">Veterinary Information:<br>Are you committed
                                                    to providing regular veterinary care for your pet,
                                                    including vaccinations and preventative medications?</label>
                                                <input type="checkbox" class="form-control" id="adopterEmail"required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="additionalComments" class="form-label">Why do you want to adopt a pet?</label>
                                                <textarea class="form-control" id="additionalComments" rows="4"
                                                    placeholder="Any additional comments or questions"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="liveToastBtn">Submit Request</button>

                                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                                <div class="toast-header">
                                                    <img src="..." class="rounded me-2" alt="...">
                                                    <strong class="me-auto">Bootstrap</strong>
                                                    <small>11 mins ago</small>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="toast-body">
                                                    Request sent.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="adoptModal" tabindex="-1" aria-labelledby="adoptModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="adoptModalLabel">Adopt Me</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Adoption Form -->
                                    <form id="adoptionForm" action="{{ route('pet.adopt.store', ['pet' => $pet]) }}" method="POST">
                                        @csrf
                                        <!-- Include the adoption form code here -->
                                        <div class="mb-3">
                                            <label for="adopterName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="adopterName" placeholder="Enter your name" required>
                                        </div>
                                        <!-- ... (rest of the adoption form code) ... -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="submitAdoptionRequest">Submit Request</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- ... (rest of the modal footer code) ... -->
                                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <img src="..." class="rounded me-2" alt="...">
                                                <strong class="me-auto">Bootstrap</strong>
                                                <small>11 mins ago</small>
                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">
                                                Request sent.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </section>
@endsection
