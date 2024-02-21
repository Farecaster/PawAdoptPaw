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
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                            aria-current="page" href="{{ route('homepage') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                            href="{{ route('about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('hta') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                            href="{{ route('hta') }}">HOW TO ADOPT</a>
                    </li>
                    @auth
                        <li
                            class="nav-item dropdown {{ Request::is('my-requests*') || Request::is('pending-request*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle {{ Request::is('my-requests*') || Request::is('pending-request*') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="#" id="requestsDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">FIND A PET</a>
                            <ul class="dropdown-menu" aria-labelledby="requestsDropdown">
                                <li><a class="dropdown-item {{ Request::is('my-requests*') ? 'active' : '' }}"
                                        href="{{ route('my.requests') }}">MY REQUESTS</a></li>
                                <li><a class="dropdown-item {{ Request::is('pending-request*') ? 'active' : '' }}"
                                        href="{{ route('pending.request') }}">ADOPTION STATUS</a></li>
                            </ul>
                        </li>
                    @endauth
                    @auth
                        <li
                            class="nav-item dropdown {{ Request::is('post-for-adoption*') || Request::is('incoming-requests*') || Request::is('on-going-requests') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle {{ Request::is('post-for-adoption*') || Request::is('incoming-requests*') || Request::is('on-going-requests*') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="#" id="requestsDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">ADOPT MY PET</a>
                            <ul class="dropdown-menu" aria-labelledby="requestsDropdown">
                                <li><a class="dropdown-item {{ Request::is('post-for-adoption*') ? 'active' : '' }}"
                                        href="{{ route('post-for-adoption') }}">POST FOR ADOPTION</a></li>
                                <li><a class="dropdown-item {{ Request::is('incoming-requests*') ? 'active' : '' }}"
                                        href="{{ route('incoming.requests') }}">INCOMING REQUESTS</a></li>
                                <li><a class="dropdown-item {{ Request::is('on-going-requests') ? 'active' : '' }}"
                                        href="{{ route('on-going.requests') }}">YOUR ACCEPTED REQUESTS</a></li>
                            </ul>
                        </li>

                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('pets*') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                            href="#" id="petsDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            PETS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dogs') }}">DOGS</a></li>
                            <li><a class="dropdown-item" href="{{ route('cats') }}">CATS</a></li>
                            <li><a class="dropdown-item" href="{{ route('pets') }}">ALL</a></li>
                        </ul>
                    </li>


                    @guest
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('signup') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('signup') }}">SIGNUP</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                                class="nav-link {{ Request::is('login') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}">LOGIN</a>
                        </li>
                    @endguest
                    @auth


                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('requests') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="{{ route('history') }}">HISTORY</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('user*') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (Auth::user()->img == null)
                                    <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                @else
                                    <img src="{{ asset(Auth::user()->img) }}" alt="User Image"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                @endif
                                <!-- Bootstrap person icon -->
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">PROFILE</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">LOGOUT</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>

        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
