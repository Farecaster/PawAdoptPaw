@extends('layout.app')
@section('content')
    <div class="container d-flex justify-content-center postform">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <form action="{{ route('pet.update', ['pet' => $pet]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h1>Edit</h1>
                            <div>
                                <label for="">Name:</label>
                                <input type="text" name="name" required value="{{ $pet->name }}">
                            </div>
                            <div>
                                <label for="">Age:</label>
                                <input type="text" name="age" required value="{{ $pet->age }}">
                            </div>
                            <div>
                                <label for="">Species:</label>
                                <input type="text" name="species" required value="{{ $pet->species }}">
                            </div>
                            <div>
                                <label for="">Breed:</label>
                                <input type="text" name="breed" required value="{{ $pet->breed }}">
                            </div>
                            <div>
                                <label for="">Description:</label>
                                <input type="text" name="description" required value="{{ $pet->description }}">
                            </div>
                            <div>
                                <label for="">Image:</label>
                                <input type="file" name="img" required value="{{ $pet->img }}">
                            </div>
                            <input type="submit" value="Update">
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset($pet->img) }}" alt="" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
