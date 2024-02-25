@extends('layout.app')
@section('content')
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
                <img src="{{ asset('assets/uno.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Transform Lives: Adopt a Pet Today!</h5>
                    <p>Adopting a pet may not change the world, but for that pet, their world will be forever changed.</p>
                    <p><a href="/signup" class="btn bg-black text-white mt3">ADOPT NOW!</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/dos.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Find Your Furry Friend: Adopt, Don't Shop!</h5>
                    <p>Adopt, Don't Shop: Find Your Perfect Companion and Save a Life!</p>
                    <p><a href="#" class="btn bg-black text-white mt3">ADOPT NOW!</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/tre.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Welcome Unconditional Love into Your Home: Adopt a Shelter Pet.</h5>
                    <p>Rescue, Love, Repeat: Change a Life, Adopt a Pet!</p>
                    <p><a href="/signup" class="btn bg-black text-white mt3">ADOPT NOW!</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section id="petprofile" class="profile section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2><b>MEET OUR TEAM</b></h2>
                        <p>Our team comprises talented students eager to innovate and excel. Together, we're dedicated to
                            delivering outstanding results, fueled by collaboration and creativity.</p>

                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-6">
                    <div class="card h-100">
                        <img src="{{ asset('assets/boxer.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><b>Paul Vincent Sumalinog</b></h4>
                            <h6><b>Back-end Developer</b></h6>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, dolore
                                possimus sapiente debitis dicta ea vel ex reprehenderit nobis aliquam suscipit nostrum. Esse
                                magni est deserunt natus eligendi molestiae mollitia?</p>
                            <a href="https://www.facebook.com/onepunch.me" style="margin-right: 10px">
                                <i class="bi bi-facebook text-black" style="font-size: 30px;"></i>
                            </a>
                            <a href="https://github.com/Paulvincent1" style="margin-right: 10px">
                                <i class="bi bi-github text-black" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card h-100">
                        <img src="{{ asset('assets/shihtzu.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><b>Mikyla Raquinio</b></h4>
                            <h6><b>Front-end Developer</b></h6>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, dolore
                                possimus sapiente debitis dicta ea vel ex reprehenderit nobis aliquam suscipit nostrum. Esse
                                magni est deserunt natus eligendi molestiae mollitia?</p>
                            <a href="https://www.facebook.com/raquiniomikyla" style="margin-right: 10px">
                                <i class="bi bi-facebook text-black" style="font-size: 30px;"></i>
                            </a>
                            <a href="https://github.com/mikylaraquinio" style="margin-right: 10px">
                                <i class="bi bi-github text-black" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card h-100">
                        <img src="{{ asset('assets/siamese.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><b>Nathaniel Ree Manzano</b></h4>
                            <h6><b>Mobile App Developer</b></h6>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, dolore
                                possimus sapiente debitis dicta ea vel ex reprehenderit nobis aliquam suscipit nostrum. Esse
                                magni est deserunt natus eligendi molestiae mollitia?</p>
                            <a href="https://www.facebook.com/nathaniereeee" style="margin-right: 10px">
                                <i class="bi bi-facebook text-black" style="font-size: 30px;"></i>
                            </a>
                            <a href="https://github.com/Farecaster" style="margin-right: 10px">
                                <i class="bi bi-github text-black" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card h-100">
                        <img src="{{ asset('assets/siamese.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><b>Beatriz Salomon</b></h4>
                            <h6><b>UX / UI Designer</b></h6>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, dolore
                                possimus sapiente debitis dicta ea vel ex reprehenderit nobis aliquam suscipit nostrum. Esse
                                magni est deserunt natus eligendi molestiae mollitia?</p>
                            <a href="https://www.facebook.com/profile.php?id=100083390659913" style="margin-right: 10px">
                                <i class="bi bi-facebook text-black" style="font-size: 30px;"></i>
                            </a>
                            <a href="https://github.com" style="margin-right: 10px">
                                <i class="bi bi-github text-black" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card h-100">
                        <img src="{{ asset('assets/siamese.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><b>Dindo De Villena Jr.</b></h4>
                            <h6><b>QA Tester</b></h6>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, dolore
                                possimus sapiente debitis dicta ea vel ex reprehenderit nobis aliquam suscipit nostrum. Esse
                                magni est deserunt natus eligendi molestiae mollitia?</p>
                            <a href="https://www.facebook.com/devillenadindojr" style="margin-right: 10px">
                                <i class="bi bi-facebook text-black" style="font-size: 30px;"></i>
                            </a>
                            <a href="https://github.com/Dodins" style="margin-right: 10px">
                                <i class="bi bi-github text-black" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
