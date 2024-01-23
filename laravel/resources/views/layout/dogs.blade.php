<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Dashboard</title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="assets/logo.png" alt="" class="d-inline-block align-top" />
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <img src="assets/logo.png" alt="" class="d-inline-block align-top" />
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link bg-success rounded px-3 text-light" href="{{ route('petprofile') }}"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pets
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('dogs') }}">Dogs</a></li>
                                <li><a class="dropdown-item" href="{{ route('cats') }}">Cats</a></li>
                                <li><a class="dropdown-item" href="{{ route('petprofile') }}">All</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ route('hta') }}">How to Adopt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ route('signup') }}">Sign Up</a>
                        </li>

                    </ul>
                </div>
            </div>
            <a href="{{ route('login') }}" class="login-button">LogIn</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!--End Navbar-->
    <!--profiles-->
    <section id="pet" class="pet section-padding">
        <div class="container ">
            <div class="row g-3 justify-content-center">
                <div class="row row-cols-1 row-cols-lg-4 g-4 py-5">
                    <a href="max.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/labrador1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Max</h5>
                                    <p class="card-title"> An energetic and friendly Labrador.</p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="bella.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/shihtzu.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Bella</h5>
                                    <p class="card-title"> A sweet and affectionate Shih Tzu.</p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="Duke.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/boxer.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Duke</h5>
                                    <p class="card-title"> A playful, friendly and energetic Boxer. </p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/border.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Luna</h5>
                                <p class="card-title"> A highly intelligent and energetic Border Collie. </p>
                            </div>
                            <div class="d-flex justify-content-around mb-3">
                                <button class="btn btn-primary">Click for more</button>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="pet-details.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/german.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Rocky</h5>
                                    <p class="card-title"> A loyal and intelligent German Shepherd. </p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
    </section>
    <footer class="footer bg-dark text-light py-5 bottom mt-5">
        <div class="container">
            <div class="row justify-content-center gy-3">
                <div class="col-9 col-lg-6 paw-adopt-paw">
                    <p class="display-5 text-warning text-center text-lg-start">
                        PAW ADOPT PAW
                    </p>
                    <small class="text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Perspiciatis a cumque recusandae impedit magnam provident fugiat,
                        sequi eligendi. Sapiente impedit nemo obcaecati quo minima officia
                        quasi unde soluta sint numquam.</small>
                </div>
                <div class="col-9 col-lg-6">
                    <p class="display-5 text-warning text-center text-lg-start">
                        P.A.W
                    </p>
                    <small class="text-white-50">P.A.W stands for all pets are amazing Lorem ipsum dolor sit amet
                        consectetur adipisicing elit.</small>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center justify-content-lg-start">
                <div class="d-none d-lg-inline col-9 col-lg-6">
                    <p class="text-white">
                        Copyright 2024 all rights reserved by:
                        <span class="text-warning">P.A.W</span>
                    </p>
                </div>
                <div class="d-lg-none col-sm-6 text-center">
                    <p class="text-white text-size">
                        Copyright 2024 all rights reserved by:
                        <span class="text-warning">P.A.W</span>
                    </p>
                </div>
                <div class="col-9 col-lg-6 text-center">
                    <p>
                        <a href="" class="no-text-decoration text-light">
                            <i class="bi bi-instagram"></i></a>
                        <a href="" class="no-text-decoration text-light ms-4">
                            <i class="bi bi-facebook"></i></a>
                        <a href="" class="no-text-decoration text-light ms-4">
                            <i class="bi bi-twitter-x"></i></a>
                        <a href="" class="no-text-decoration text-light ms-4">
                            <i class="bi bi-envelope-paper-heart"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

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
                            <input type="text" class="form-control" id="adopterName"
                                placeholder="Enter your name" required>
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
                            <input type="text" class="form-control" id="adopterNumber" placeholder="+639"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="adopterEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="adopterEmail"
                                placeholder="Enter your email" required>
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


</body>

</html>
