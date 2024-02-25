@extends('layout.app')
@section('content')
    <section id="login" class="login section-padding">
        <div class="doggy">
            <img src="assets/cute-golden-retriever.jpg" class="img-fluid" alt="Doggy Image">
        </div>

        <div class="login-content">
            <h1 class="h2-content text-black">Paw-Adopt-Paw</h1>
            <h2 class="login-quote">Connect Pets Around the World!</h2>
        </div>

        <div class="login-container">
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" name="password" placeholder="Password" required />
                @error('password')
                    <span>{{ $message }}</span>
                @enderror

                <button type="submit" class="btn-login">Log In</button>
            </form>
            <div class="signup-link">
                <a href="{{ route('signup') }}">
                    <p>Don't have an account? Sign Up!</p>
                </a>
            </div>
        </div>
    </section>
@endsection
