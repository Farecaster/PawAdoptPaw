<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('assets/logo.png') }}" alt="" class="d-inline-block align-top" />
        </a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img src="{{ asset('assets/logo.png') }}" alt="" class="d-inline-block align-top" />
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                            aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ Request::is('pets*') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                            href="{{ route('pets') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pets
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dogs') }}">Dogs</a></li>
                            <li><a class="dropdown-item" href="{{ route('cats') }}">Cats</a></li>
                            <li><a class="dropdown-item" href="{{ route('pets') }}">All</a></li>
                        </ul>
                    </li>

                    <li clas <li class="nav-item">
                        <a class="nav-link {{ Request::is('hta') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                            href="{{ route('hta') }}">How to Adopt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                            href="{{ route('about') }}">About Us</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('signup') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('signup') }}">Sign
                                Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                                class="nav-link {{ Request::is('login') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}">LogIn</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('post-for-adoption') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('post-for-adoption') }}">Post for Adoption</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('r') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('incoming.requests') }}">Incoming Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('requests') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('my.requests') }}">My requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('requests') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('ongoing.requests.owner') }}">On going requests(pet owner)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('requests') ? 'bg-success rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('history') }}">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2"
                                href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
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
