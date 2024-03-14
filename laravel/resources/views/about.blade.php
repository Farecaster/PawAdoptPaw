@extends('layout.app')

<!--Pet profile section-->
@section('content')
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h1><b>ABOUT US</b></h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="assets/pug.jpg" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="profile-text">
                        <h2>Paw-Adopt-Paw</h2>
                        <p> Paw-Adopt-Paw is your go-to destination for finding your new best friend. Our user-friendly pet
                            adoption website connects you with a diverse range of lovable animals in need of forever homes.
                            Browse profiles, find your perfect match, and embark on a journey of companionship and love.
                            Join us in our mission to make tails wag and hearts smile.</p>

                        <h2><br>Pet Adoption Warriors</h2>
                        <p>
                            PAW is a dedicated organization focused on finding loving homes for homeless pets. With a
                            compassionate team of volunteers and staff, they rescue, rehabilitate, and rehome animals in
                            need, providing support throughout the adoption process. Through education and community
                            outreach, P.A.W advocates for responsible pet ownership and works to create a more compassionate
                            society for animals.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end pp section-->
    <section class="team">
        <div class="container shadow">
            <h1>MEET OUR AWESOME TEAM</h1>
            <p style="font-weight: bold;">2nd Year BSIT students of PHINMA-University of Pangasinan</p>
            <br>
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col-md profile text-center">
                    <div class="img-box">
                        <img src="{{ asset('assets/paul.jpg') }}" class="cards-img">
                        <ul>
                            <a href="https://www.facebook.com/onepunch.me/"><li><i class="bi bi-facebook"></i></li></a>
                            <a href="https://www.linkedin.com/in/paul-vincent-sumalinog-a4bb79245/"><li><i class="bi bi-linkedin"></i></li></a>
                        </ul>
                    </div>
                    <h2>Paul Vincent Sumalinog</h2>
                    <h3>Project Manager</h3>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="img-box">
                        <img src="{{ asset('assets/miky.jpg') }}" class="cards-img">
                        <ul>
                            <a href="https://www.facebook.com/raquiniomikyla?mibextidfVIIUt"><li><i class="bi bi-facebook"></i></li></a>
                            <a href="https://www.linkedin.com/in/mikyla-raquinio-6a46341a4/"><li><i class="bi bi-linkedin"></i></li></a>
                        </ul>
                    </div>
                    <h2>Mikyla Raquinio</h2>
                    <h3>UI/UX Designer</h3>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="img-box">
                        <img src="{{ asset('assets/nath.jpg') }}" class="cards-img">
                        <ul>
                            <a href="https://www.facebook.com/raquiniomikyla?mibextidfVIIUt"><li><i class="bi bi-facebook"></i></li></a>
                            <a href="https://www.linkedin.com/in/nathaniel-ree-manzano-aa82372ba/"><li><i class="bi bi-linkedin"></i></li></a>
                        </ul>
                    </div>
                    <h2>Nathaniel Ree Manzano</h2>
                    <h3>Frontend Developer</h3>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="img-box">
                        <img src="{{ asset('assets/dindo.jpg') }}" class="cards-img">
                        <ul>
                            <a href="https://www.facebook.com/devillenadindojr/"><li><i class="bi bi-facebook"></i></li></a>
                            <a href="https://www.linkedin.com/in/dindo-jr-agcaoili-de-villena-97479b2ba/"><li><i class="bi bi-linkedin"></i></li></a>
                        </ul>
                    </div>
                    <h2>Dindo De Villena Jr</h2>
                    <h3>Backend Developer</h3>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="img-box">
                        <img src="{{ asset('assets/bea.jpg') }}" class="cards-img">
                        <ul>
                            <a href="https://www.facebook.com/profile.php?id=100083390659913"><li><i class="bi bi-facebook"></i></li></a>
                            <a href="https://www.linkedin.com/in/bea-salomon-b3738b288"><li><i class="bi bi-linkedin"></i></li></a>
                        </ul>
                    </div>
                    <h2>Beatriz Salomon</h2>
                    <h3>Researcher</h3>
                </div>
            </div>
        </div>
    </section>
@endsection
