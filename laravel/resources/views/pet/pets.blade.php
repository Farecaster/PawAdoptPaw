@extends('layout.app')
@section('content')
    <section id="pet" class="pet section-padding">
        @include('shared.search-bar')

        <div class="container">
            @if ($pets->isEmpty())
                <h1>No pets Available</h1>
            @else
                <h2>Available Pets</h2>
                <br>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3">
                    @foreach ($pets as $pet)
                        <div class="col">
                            <a href="{{ route('pet.show', ['pet' => $pet]) }}" class="text-decoration-none">
                                <div class="card" style="height: 100%;">
                                    <img src="{{ asset($pet->img) }}" class="card-img-top" alt="..."
                                        style="height: 300px; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card">{{ $pet->name }}</h5>
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
@endsection
