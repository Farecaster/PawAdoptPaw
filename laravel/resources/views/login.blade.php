@extends('layout.app')

@section('content')
    ;
    <section id="login" class="login section-padding">
        <div class="login-content">
            <h1 class="h2-content">Paw-Adopt-Paw</h1>
            <h2 class="login-quote">Connect your Pets around the world</h2>
        </div>

        <div class="login-container">
            <form>
                <input type="text" placeholder="Username" required />
                <input type="password" placeholder="Password" required />
                <button type="submit" class="btn-login">Log In</button>
            </form>
            <p>Don't have an account? <a href="signup.html">Create Account</a></p>
        </div>
    </section>
@endsection
