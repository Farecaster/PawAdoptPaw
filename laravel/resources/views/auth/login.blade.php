@extends('layout.app')

@section('content')
    <section id="login" class="login section-padding">
        <div class="login-content">
            <h1 class="h2-content">Paw-Adopt-Paw</h1>
            <h2 class="login-quote">Connect your Pets around the world</h2>
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
            <p>Don't have an account? <a href="{{ route('signup') }}">Create Account</a></p>
        </div>
    </section>
@endsection
