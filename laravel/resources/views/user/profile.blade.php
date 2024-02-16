@extends('layout.app')

@section('content')

<div class="header-wrapper">
    <header></header>
    <div class="cols-container">
        <div class="left-col d-flex justify-content-center align-items-center">
            <section class="profile text-center d-flex align-items-center">
                <div class="img-container">
                    <img src="{{ asset('assets/boxer.jpg') }}" alt="Profile Image">
                    <span>
                        @auth
                        @if (Auth::id() === $user->id)
                        <div>
                            <a href="#">Edit</a>
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
                        <a href="">Available Pets</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ route('post-for-adoption') }}">Post for Adoption</a>
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
                                <button class="btn btn-primary">Click for more</button>
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
@endsection
