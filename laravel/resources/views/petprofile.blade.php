@extends('layout.app')
@section('content')
    <section id="pet" class="pet section-padding">
        <div class="container">
            <div class="row g-3 justify-content-center">
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/labrador1.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Max</h1>
                            <h4 class="card-subtitle text-body-secondary">Labrador Retriever</h4>
                            <p class="card-text">
                                Max is an energetic and friendly Labrador. He loves outdoor activities and playing
                                fetch.
                                Max is good with children and other dogs, and he's always eager to please.
                                He's house-trained and knows basic commands like sit and stay.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/siamese.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Chloe</h1>
                            <h4 class="card-subtitle text-body-secondary">Siamese</h4>
                            <p class="card-text">
                                Chloe is a vocal and affectionate Siamese cat. She loves to be the center
                                of attention and enjoys sitting on laps. Chloe is litter-trained and has a beautiful
                                coat with striking blue eyes. She's social and enjoys interactive play.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/shihtzu.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Bella</h1>
                            <h4 class="card-subtitle text-body-secondary">Shih Tzu</h4>
                            <p class="card-text">
                                Bella is a sweet and affectionate Shih Tzu. She enjoys cuddling on
                                the couch and is great with families. Bella is low-energy and prefers
                                short walks. She's house-trained and has a calm demeanor, making her a great companion.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/mainecoon.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Oliver</h1>
                            <h4 class="card-subtitle text-body-secondary">Maine Coon</h4>
                            <p class="card-text">
                                Oliver is a gentle giant with a laid-back demeanor. He enjoys
                                lounging around and is great with families. Oliver has a luxurious,
                                long coat and tufted ears. He's litter-trained and is known for his friendly nature.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/boxer.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Duke</h1>
                            <h4 class="card-subtitle text-body-secondary">Boxer</h4>
                            <p class="card-text">
                                Duke is a playful and friendly Boxer. He's great with children and enjoys
                                socializing with other dogs at the park. Duke is energetic and needs regular
                                exercise. He's house-trained and loves to be the center of attention.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/persian.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Cleo</h1>
                            <h4 class="card-subtitle text-body-secondary">Persian</h4>
                            <p class="card-text">
                                Cleo is a regal and elegant Persian cat. She prefers a calm environment and
                                enjoys grooming sessions. Cleo has a distinctive flat face and a soft, luxurious
                                coat. She's litter-trained and appreciates a cozy spot for napping.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/border.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Luna</h1>
                            <h4 class="card-subtitle text-body-secondary">Border Collie</h4>
                            <p class="card-text">
                                Luna is a highly intelligent and energetic Border Collie. She's great with active
                                families who enjoy outdoor activities. Luna excels in agility training and is quick
                                to learn new tricks. She's affectionate and thrives on mental stimulation.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/bengal.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Milo</h1>
                            <h4 class="card-subtitle text-body-secondary">Bengal</h4>
                            <p class="card-text">
                                Milo is an adventurous and playful Bengal cat. He loves interactive toys and
                                climbing structures. Milo is litter-trained and has a sleek, spotted coat.
                                He's curious and enjoys exploring his surroundings.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/german.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Rocky</h1>
                            <h4 class="card-subtitle text-body-secondary">German Shepherd</h4>
                            <p class="card-text">
                                Rocky is a loyal and intelligent German Shepherd. He's protective and
                                makes an excellent guard dog. Rocky is good with older children and adults,
                                and he thrives on mental stimulation and obedience training. He's house-trained
                                and excels in agility activities.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card">
                        <img src="assets/ragdoll.jpg" alt="" class="card-img-top" />
                        <div class="card-body">
                            <h1 class="card-title">Lina</h1>
                            <h4 class="card-subtitle text-body-secondary">Ragdoll</h4>
                            <p class="card-text">
                                Luna is a laid-back and affectionate Ragdoll cat. She loves to be held and
                                tends to go limp when picked up, hence the name "Ragdoll." Luna is litter-trained
                                and has striking blue eyes. She's a great companion for quiet evenings.
                            </p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    </section>

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
                    <button type="button" class="btn btn-success">Submit Adoption</button>
                </div>
            </div>
        </div>
    </div>
@endsection
