@extends('layout.app')
@section('content')
    <section id="login" class="login section-padding">
        <div class="doggy">
            <img src="assets/img4.jpg" class="img-fluid" alt="cutepussy Image">
        </div>

        <div class="login-content">
            <h1 class="h2-content" style="color: #272343;">Paw-Adopt-Paw</h1>
            <h2 class="login-quote" style="color: #2d334a;">Connect Pets Around the World!</h2>
        </div>

        <div class="login-container">
            <form action="{{ route('signup.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Username" id="username" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="email" name="email" placeholder="Email" id="email" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="password" name="password" placeholder="Password" id="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="password" name="password_confirmation" placeholder="Confirm password" id="confirmPassword"
                        required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn-login" style="background-color: #272343;">Sign Up</button>
            </form>
            <div class="signup-link">
                <a href="{{ route('login') }}">
                    <p style="font-weight: 600;  text-align: center;">Already have an account? LogIn</p>
                </a>
            </div>
        </div>
    </section>
@endsection




{{-- @extends('layout.app')
@section('content')
    <section id="login" class="login section-padding">
        <div class="cutepussy">
            <img src="assets/cutepussy.jpg" class="img-fluid" alt="cutepussy Image">
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                       <div class="card">
                        <div class="card-header bg-black text-white">
                            <h3 class="text-center">Sign Up</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('signup.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="name" class="form-control" id="username"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="confirmPassword" required>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Sign Up</button>
                            </form>
                            <p class="mt-3" style="text-align: center;">Already have an account? <a
                                    href="{{ route('login') }}">Log In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
