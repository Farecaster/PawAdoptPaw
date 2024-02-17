@extends('layout.app')
@section('content')
    <section id="pet" class="pet section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-5 pt-5">
                    <div class="row z-depth-3">
                        <div class="card mb-3">
                            <img src="assets/siamese.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Chloe</h2>
                                <h4 class="card-subtitle text-body-secondary">Siamese</h4><br>
                                <p class="card-text">Chloe is a vocal and affectionate Siamese cat.
                                    She loves to be the center of attention and enjoys sitting on laps.
                                    Chloe is litter-trained and has a beautiful coat with striking blue eyes.
                                    She's social and enjoys interactive play.</p>
                                <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                    data-bs-target="#adoptModal">Adopt Me</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <label for="adopterEmail" class="form-label">Veterinary Information:<br>Are you committed to
                                providing regular veterinary care for your pet,
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
@endsection
