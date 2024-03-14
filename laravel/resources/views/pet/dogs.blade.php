@extends('layout.app')
@section('content')
    <section id="pet" class="pet section-padding">

        {{--@include('shared.search-bar')--}}
        
        <div class="container">
            @if ($dogs->isEmpty())
                <h1>No pets Available</h1>
            @else
            <h2>Available Dogs</h2>
            <br>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3">
                    @foreach ($dogs as $dog)
                        <div class="col">
                            <a href="{{ route('pet.show', ['pet' => $dog]) }}" class="text-decoration-none">
                                <div class="card">
                                    <img src="{{ asset($dog->img) }}" class="card-img-top" alt="..."
                                    style="height: 300px; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $dog->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <div class="container">{{ $dogs->links() }}</div>
@endsection
