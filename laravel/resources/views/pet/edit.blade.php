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
        <img src="{{ asset($pet->img) }}" alt="" width="100px" class="col-7">
        <form action="{{ route('pet.update', ['pet' => $pet]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
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
                <label for="">breed:</label>
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
@endsection
