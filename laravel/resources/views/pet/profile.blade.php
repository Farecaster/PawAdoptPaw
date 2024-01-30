@extends('layout.app')
@section('content')
    <div class="container pet-profile">

        <img src="{{ asset($pet->img) }}" alt="" width="100px">
        <h1>{{ $pet->name }}</h1>
        <h1>{{ $pet->age }}</h1>
        <h1>{{ $pet->species }}</h1>
        <h1>{{ $pet->breed }}</h1>
        <p>{{ $pet->description }}</p>

        @auth
            @if (Auth::id() !== $pet->user->id)
                <a href="{{ route('pet.adopt.create', ['pet' => $pet]) }}">Adopt Me</a>
            @else
                <a href="{{ route('pet.edit', ['pet' => $pet]) }}">Edit</a>
                <form action="{{ route('pet.delete', ['pet' => $pet]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            @endif
        @endauth
        @guest
            <a href="{{ route('login') }}">Log in to adopt this pet</a>
        @endguest

        <div>
            <a href="{{ route('user.profile', ['id' => $pet->user->id]) }}">{{ $pet->user->name }}</a>
        </div>

    </div>
@endsection
