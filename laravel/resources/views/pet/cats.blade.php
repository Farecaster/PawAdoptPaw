@extends('layout.app')

@section('content')

    <section id="pet" class="pet section-padding">

        @include('shared.search-bar')

        <div class="container">
            @if ($cats->isEmpty())
                <h1>No pets Available</h1>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach ($cats as $cat)
                        <div class="col mb-4">
                            <a href="{{ route('pet.show', ['pet' => $cat]) }}" class="text-decoration-none">
                                <div class="card h-100">
                                    <img src="{{ asset($cat->img) }}" class="card-img-top" alt="...">
                                    <div class="card-body" style="height: 150px;"> <!-- Set a fixed height for the card body -->
                                        <h5 class="card-title">{{ $cat->name }}</h5>
                                        <p class="card-text">
                                            {{ \Illuminate\Support\Str::limit($cat->description, 100, $end = '...') }}
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn" style="background-color: #bae8e8; color: #272343;">Click for more</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <div class="container mt-4">{{ $cats->links() }}</div>
@endsection
