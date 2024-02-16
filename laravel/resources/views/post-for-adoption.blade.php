@extends('layout.app')
@section('content')

    <div class="d-flex justify-content-center align-items-center postform">
        <div class="py-2 text-center">
            <h2>Adoption Form</h2>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center postform">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('post-for-adoption.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container border p-3">
                <h4 class="mb-3">Pet Details</h4>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="name">Pet Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="age">Age:</label>
                        <input type="text" id="age" name="age" class="form-control" required value="{{ old('age') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="species">Species:</label>
                        <select id="species" name="species" class="form-control" required>
                            <option value="" {{ old('species') == '' ? 'selected' : '' }}>Choose...</option>
                            <option value="dog" {{ old('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                            <option value="cat" {{ old('species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="breed">Breed:</label>
                        <input type="text" id="breed" name="breed" class="form-control" required value="{{ old('breed') }}">
                    </div>
                    <div class="col-12">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" class="form-control" required value="{{ old('description') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="img">Image:</label>
                        <input type="file" id="img" name="img" class="form-control-file" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Post" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
