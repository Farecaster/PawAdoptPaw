@extends('layout.app')
@section('content')
    <section id="login" class="login section-padding">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">
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
@endsection
