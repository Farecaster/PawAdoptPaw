<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="assets/logo.png" alt="" class="d-inline-block align-top" />
        </a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img src="assets/logo.png" alt="" class="d-inline-block align-top" />
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="v{{ route('petprofile') }}">Pet Profile</a>
                    </li>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('dogs') }}">Dogs</a></li>
                        <li><a class="dropdown-item" href="{{ route('cats') }}">Cats</a></li>
                        <li><a class="dropdown-item" href="{{ route('petprofile') }}">All</a></li>
                    </ul>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="{{ route('hta') }}">How to Adopt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="{{ route('about') }}">About Us</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link bg-success rounded px-3 text-light" href="{{ route('signup') }}">Sign
                                Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="login-button">LogIn</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="{{ route('about') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>

        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
