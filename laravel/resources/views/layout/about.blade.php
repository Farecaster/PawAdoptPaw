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
                            <a class="nav-link mx-lg-2" href="{{ route('hta') }}">How to Adopt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-success rounded px-3 text-light" href="{{ route('about') }}">About
                                Us</a>
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
                        <h2>Welcome to Paw-Adopt-Paw,<br> Where love finds a home.</h2>
                        <p>At Paw-Adopt-Paw, our mission is simple yet profound-to bring joy, companionship,
                            and a forever home to every pet in need. As passionate advocates for animal welfare,
                            we believe that every pet deserves a chance to experience love and care.</p>
                        <h2><br>Our Commitment:</h2>
                        <p>At the heart of our organization lies a deep commitment to the well-being of animals.
                            We work tirelessly to rescue, rehabilitate, and rehome pets who have faced hardships,
                            providing them with a second chance at a happy life. Our team is driven by a shared love
                            for animals and a belief that every adoption is a transformative journey for both the pet
                            and the adopter.</p>
                        <h2><br>Why Choose Paw-Adopt-Paw?</h2>
                        <p> • Compassion and Care: We go beyond the conventional adoption process. Our dedicated team
                            takes the time to understand the unique needs and personalities of each pet, ensuring the
                            perfect match between pet and adopter.<br>
                            <br>• Community Impact: By choosing [Organization Name], you become a part of a community
                            that
                            actively contributes to positive change in the lives of animals. Whether through adoption,
                            volunteering, or donations, your involvement makes a tangible difference.<br>

                            <br>• Transparency: We believe in transparency in all our operations. From the adoption
                            process to
                            the use of donations, we are committed to keeping our supporters informed every step of the
                            way.
                        </p>
                        <h2><br>How You Can Make a Difference:</h2>
                        <p>• Adopt a Friend: Explore our gallery of lovable pets waiting for their forever homes.
                            Your decision to adopt not only changes the life of a pet but also enriches your own.<br>

                            <br>• Volunteer: Join our community of passionate volunteers and play a direct role in
                            caring
                            for and socializing with our animals.<br>

                            <br>• Donate: Your support helps us provide medical care, food, and shelter to pets in need.
                            Every donation, no matter the size, contributes to the well-being of our furry friends.<br>

                            <br>Join us in creating a world where every pet knows the warmth of a loving home. Together,
                            we can make a lasting impact on the lives of those who cannot speak for themselves.<br>

                            <br>Thank you for choosing Paw-Adopt-Paw, where compassion meets companionship.
                        </p>
                    </div>
                </div>
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
