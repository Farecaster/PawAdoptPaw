@extends('layout.app')

@section('content')
{{--<section>
    <div class="header-wrapper">
        <header></header>
        <div class="cols-container">
            <div class="left-col d-flex justify-content-center align-items-center">
                <section class="profile text-center d-flex align-items-center">
                    <div class="img-container">
                        @if ($user->img == null)
                            <img src="{{ asset('assets/no_img.jpg') }}" alt="Profile Image">
                        @else
                            <img src="{{ asset($user->img) }}" alt="Profile Image">
                        @endif
                        <span>
                            @auth
                                @if (Auth::id() === $user->id)
                                    <div>
                                        <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#reportModal"><i
                                                class="bi bi-pencil-square text-primary"></i></a>
                                    </div>
                                @endif
                            @endauth
                        </span>
                        <h1 class="h1">{{ $user->name }}</h1>
                        <h4 class="h4">{{ $user->email }}</h4>
                    </div>
                </section>
                <section class="text-center">
                    <ul class="nav justify-content-center">
                        <li class="nav-item mx-2">
                            <a href="" style="color: #272343";>Available Pets</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{ route('history') }}" #272343;>History</a>
                        </li>
                    </ul>

                </section>
            </div>
        </div>

        <section id="pets" class="pets section-padding">
            <div class="container">
                @if ($pets->isEmpty())
                    <h1>No pets Available</h1>
                @else
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($pets as $pet)
                            <div class="col">
                                <a href="{{ route('pet.show', ['pet' => $pet]) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset($pet->img) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $pet->name }}</h5>
                                            <p class="card-text">
                                                {{ \Illuminate\Support\Str::limit($pet->description, 100, $end = '...') }}
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <button class="btn"  style="background-color: #bae8e8; color: #272343;">Click for more</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <div class="container mt-4">
            {{ $pets->links() }}
        </div>
    </div>

    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="adoptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Adoption Form -->
                    <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="img" class="form-label"><i class="bi bi-camera"></i>Profile Picture:</label>

                            <input type="file" name="img" class="form-control" id="img" placeholder=""
                                required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                    class="bi bi-x-lg"></i></button>
                            <button type="submit" class="btn btn-success ms-2" id="liveToastBtn"><i
                                    class="bi bi-save2-fill"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<section>--}}

<section class="py-5 my-5">
    <div class="container bg-white shadow">
        <div class="row align-items-start">
            <h1 class="mb-5" style="color: #272343; padding-top: 20px; padding-left: 40px;">Profile</h1>
            <div class="col-4">
                <div>
                    <div class="profile-tab-nav border-right">
                        <div class="p-4">
                            <div class="header-wrapper">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <div class="img-container">
                                                @if ($user->img == null)
                                                    <img src="{{ asset('assets/no_img.jpg') }}" alt="Profile Image" class="rounded-circle profile-image">
                                                @else
                                                    <img src="{{ asset($user->img) }}" alt="Profile Image" class="rounded-circle profile-image">
                                                @endif
                                                <span>
                                                    @auth
                                                        @if (Auth::id() === $user->id)
                                                            <div>
                                                                <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#reportModal"><i
                                                                        class="bi bi-pencil-square text-primary"></i></a>
                                                            </div>
                                                        @endif
                                                    @endauth
                                                </span>
                                                <h4>{{ $user->name }}</h4>
                                                <h6>{{ $user->email }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" href="" id="pet"
                        role="tab" aria-controls="pets" aria-selected="true">Available Pets
                        </a>
                        <a class="nav-link" href="{{ route('history') }}" id="history-link"
                        role="tab" aria-controls="pets" aria-selected="false">History
                        </a>
                        <a class="nav-link {{ Request::is('post-for-adoption*') ? 'active' : '' }}"
                                        href="{{ route('post-for-adoption') }}">Post</a>
                        @auth
                        <li
                            class="nav-link dropdown {{ Request::is('post-for-adoption*') || Request::is('incoming-requests*') || Request::is('on-going-requests') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle {{ Request::is('post-for-adoption*') || Request::is('incoming-requests*') || Request::is('on-going-requests*') ? 'bg-black rounded px-3 text-light' : 'mx-lg-2' }}"
                                href="#" id="requestsDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Requests</a>
                            <ul class="dropdown-menu" aria-labelledby="requestsDropdown">
                                <li><a class="dropdown-item {{ Request::is('incoming-requests*') ? 'active' : '' }}"
                                        href="{{ route('incoming.requests') }}">INCOMING REQUESTS</a></li>
                                <li><a class="dropdown-item {{ Request::is('on-going-requests') ? 'active' : '' }}"
                                        href="{{ route('on-going.requests') }}">YOUR ACCEPTED REQUESTS</a></li>
                            </ul>
                        </li>

                    @endauth
                    </div>
                </div>
            </div>
            <div class="col">   
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="pets" role="tab-panel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Available Pets</h3>
                        <div class="row align-items-start">
                        @if ($pets->isEmpty())
                            <h1>No pets Available</h1>
                        @else
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                @foreach ($pets as $pet)
                                    <div class="col">
                                        <a href="{{ route('pet.show', ['pet' => $pet]) }}" class="text-decoration-none">
                                            <div class="card">
                                                <img src="{{ asset($pet->img) }}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $pet->name }}</h5>
                                                    <p class="card-text">
                                                        {{ \Illuminate\Support\Str::limit($pet->description, 100, $end = '...') }}
                                                    </p>
                                                </div>
                                                <div class="card-footer d-flex justify-content-center">
                                                    <button class="btn"  style="background-color: #bae8e8; color: #272343;">Click for more</button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
