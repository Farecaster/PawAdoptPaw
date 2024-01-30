@extends('layout.app')
@section('content')
    <div class="container user-profile">
        @auth
            @if (Auth::id() === $user->id)
                <div>
                    <a href="">Edit</a>
                </div>
            @endif
        @endauth
        <img src="https://images.unsplash.com/photo-1498758536662-35b82cd15e29?q=80&w=1976&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="" class="col-sm-1 img-thumbnail rounded-circle" width="100px">
        <h1 class="col">{{ $user->name }}</h1>
        <h2 class="col">{{ $user->email }}</h2>
        <section id="pet" class="pet section-padding">

            <div class="container">
                @if ($pets->isEmpty())
                    <h1>No pets Available</h1>
                @else
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3">
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
        <div class="container">{{ $pets->links() }}</div>

    </div>
@endsection
