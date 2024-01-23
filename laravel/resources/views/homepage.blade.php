<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="stylesheet1.css" />
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                            <a class="nav-link bg-success rounded px-3 text-light" aria-current="page"
                                href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('petprofile') }}" role="button"
                                data-bs-toggle="dropdown" aria-expanded="true">
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
    <!--Hero-->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/uno.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Transform Lives: Adopt a Pet Today!</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, consequuntur.</p>
                    <p><a href="pet-profile.html" class="btn bg-success mt3">Browse Adoptable Pets</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/dos.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Find Your Furry Friend: Adopt, Don't Shop!</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, consequuntur.</p>
                    <p><a href="#" class="btn bg-success mt3">Browse Adoptable Pets</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/tre.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Welcome Unconditional Love into Your Home: Adopt a Shelter Pet.</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, consequuntur.</p>
                    <p><a href="#" class="btn bg-success mt3">Browse Adoptable Pets</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--cards-->

    <section id="petprofile" class="profile section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Available Pets For Adoption</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, libero.</p>

                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/boxer.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Duke</h5>
                            <p class="card-text">Meet Duke, a playful and friendly Boxer.
                                He's great with children and enjoys socializing with other dogs at the park.
                                Duke is energetic and needs regular exercise. He's house-trained and loves to
                                be the center of attention.</p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/shihtzu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bella</h5>
                            <p class="card-text">Meet Bella, a sweet and affectionate Shih Tzu.
                                She enjoys cuddling on the couch and is great with families.
                                Bella is low-energy and prefers short walks. She's house-trained and
                                has a calm demeanor, making her a great companion.</p>
                            <button class="btn bg-success text-dark" data-bs-toggle="modal"
                                data-bs-target="#adoptModal">Adopt Me</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/siamese.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Chloe</h5>
                            <p class="card-text">Meet Chloe, a vocal and affectionate Siamese cat.
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
    </section>
    <!--How to adopt section-->
    <section id="htp" class="htp-section-padding">
        <div class="container shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h1>How to Adopt</h1>
                        <h3>Welcome to the Adoption Process at Paw-Adopt-Paw!</h3>
                        <p>At Paw-Adopt-Paw, we strive to make the adoption process as
                            seamless and joyful as possible. Your decision to adopt a pet is a
                            wonderful journey, and we're here to guide you every step of the way.</p>
                        <h3>Ready to Welcome a New Friend?</h3>
                        <a href="hta.html" class="btn bg-success mt3">Click here</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Pet profile section-->
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h1>About Us</h1>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, libero.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="assets/quatro.jpg" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="profile-text">
                        <h1>Welcome to Paw-Adopt-Paw,<br> Where love finds a home.</h1>
                        <p>At Paw-Adopt-Paw, our mission is simple yet profound-to bring joy, companionship,
                            and a forever home to every pet in need. As passionate advocates for animal welfare,
                            we believe that every pet deserves a chance to experience love and care.</p>


                        <br>Join us in creating a world where every pet knows the warmth of a loving home. Together,
                        we can make a lasting impact on the lives of those who cannot speak for themselves.<br>

                        <br>Thank you for choosing Paw-Adopt-Paw, where compassion meets companionship.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end pp section-->

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




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>