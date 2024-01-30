@extends('layout.app')
@section('content')
    <section id="pet" class="pet section-padding">
        @include('shared.search-bar')

        <div class="container">
            @if ($pets->isEmpty())
                <h1>No pets Available</h1>
            @else
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
                                        <button class="btn btn-primary">Click for more</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <div class="container">{{ $pets->links() }}</div>




    <!-- Modal -->
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
                            <input type="email" class="form-control" id="adopterAddress" placeholder="Enter your address"
                                required>
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
                    <button type="button" class="btn btn-success">Submit Adoption</button>
                </div>
            </div>
        </div>
    </div>
@endsection
