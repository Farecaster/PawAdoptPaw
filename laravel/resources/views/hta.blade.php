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
    <nav class="navbar navbar-expand-lg fixed-top ">
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
                            <a class="nav-link dropdown-toggle" href="pet-profile.html" role="button"
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
                            <a class="nav-link bg-success rounded px-3 text-light" href="{{ route('hta') }}">How to
                                Adopt</a>
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

    <!--Pet profile section-->
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h1>Ready to Welcome a New Friend?</h1>
                        <p>Follow These Simple Steps:</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                <div class="profile-text">
                    <h2>1. Explore Available Pets</h2>
                    <p>Click the Pets from the navbar to see the lovable animals waiting for their forever homes.
                        You can filter the listings based on species, breed, age, and more. Each pet's
                        profile includes details about their personality, history, and current needs.</p><br>
                    <h2>2. Find Your Perfect Match</h2>
                    <p>Take your time to read through the profiles and find a pet that matches your lifestyle,
                        preferences, and the care you can provide. Feel free to reach out if you have any questions
                        or need assistance in making the right choice.</p><br>
                    <h2>3. Submit an Adoption Application</h2>
                    <p>Once you've found a pet you'd like to adopt, click on the "Adopt Me" button on their profile
                        to access our online adoption application. Please fill out the form with accurate and detailed
                        information about your living situation, experience with pets, and your plans for caring for the
                        adopted pet.</p><br>
                    <h2>4. Application Review</h2>
                    <p>Our adoption team will carefully review your application to ensure that the pet you've chosen is
                        a good fit for your
                        home and lifestyle. We may contact you for additional information or clarification during this
                        process.</p><br>



                </div>
            </div>
            <div class="col-md-12">
                <div class="section-header text-center pb-5">
                    <h5><br>Thank you for choosing to adopt and giving a loving home to a pet in need.<br>
                        Your decision makes a world of difference in the lives of these wonderful animals.</h5>

                </div>
            </div>
    </section>
    <!--end pp section-->


    <footer>
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
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
