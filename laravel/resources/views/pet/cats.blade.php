@extends('layout.app')

@section('content')

    <section id="pet" class="pet section-padding">

        @include('shared.search-bar')

        <div class="container">
            @if ($cats->isEmpty())
                <h1>No pets Available</h1>
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3">
                    @foreach ($cats as $cat)
                        <div class="col">
                            <a href="{{ route('pet.show', ['pet' => $cat]) }}" class="text-decoration-none">
                                <div class="card">
                                    <img src="{{ asset($cat->img) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cat->name }}</h5>
                                        <p class="card-text">
                                            {{ \Illuminate\Support\Str::limit($cat->description, 100, $end = '...') }}</p>
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
    <div class="container">{{ $cats->links() }}</div>
@endsection
