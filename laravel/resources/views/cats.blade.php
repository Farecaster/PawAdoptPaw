@extends('layout.app');

<<<<<<< HEAD
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
                            <a class="nav-link mx-lg-2" aria-current="page" href="homepage.html">Home</a>
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
                            <a class="nav-link mx-lg-2" href="hta.html">How to Adopt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="about us.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.html" class="login-button">LogIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="SignUp.html">Sign Up</a>
                        </li>

                    </ul>
                </div>
            </div>

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
                    <a href="Chloe.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/siamese.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Chloe</h5>
                                    <p class="card-title"> A vocal and affectionate Siamese cat. </p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="oliver.html">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/mainecoon.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Oliver</h5>
                                    <p class="card-title"> A gentle giant with a laid-back demeanor..</p>
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
                                <img src="assets/persian.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Cleo</h5>
                                    <p class="card-title"> A litter-trained regal and elegant Persian cat. </p>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-primary">Click for more</button>
                                </div>
                            </div>
                        </div>
                    </a>
=======
@section('content');
<section id="pet" class="pet section-padding">
    <div class="container ">
        <div class="row g-3 justify-content-center">
            <div class="row row-cols-1 row-cols-lg-4 g-4 py-5">
                <a href="Chloe.html">
>>>>>>> 398192ae97fff88904bcf3e8c1b373dfe4f7bb44
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/siamese.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chloe</h5>
                                <p class="card-title"> A vocal and affectionate Siamese cat. </p>
                            </div>
                            <div class="d-flex justify-content-around mb-3">
                                <button class="btn btn-primary">Click for more</button>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="oliver.html">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/mainecoon.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Oliver</h5>
                                <p class="card-title"> A gentle giant with a laid-back demeanor..</p>
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
                            <img src="assets/persian.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cleo</h5>
                                <p class="card-title"> A litter-trained regal and elegant Persian cat. </p>
                            </div>
                            <div class="d-flex justify-content-around mb-3">
                                <button class="btn btn-primary">Click for more</button>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/bengal.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Milo</h5>
                            <p class="card-title"> An adventurous and playful Bengal cat. </p>
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
                            <img src="assets/ragdoll.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Lina</h5>
                                <p class="card-title"> A laid-back and affectionate Ragdoll cat. </p>
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
@endsection