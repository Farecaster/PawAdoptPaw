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
        <form action="{{ route('post-for-adoption.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Name:</label>
                <input type="text" name="name" required value="{{ old('name') }}">
            </div>
            <div>
                <label for="">Age:</label>
                <input type="text" name="age" required value="{{ old('age') }}">
            </div>
            <div>
                <label for="">Species:</label>
                <input type="text" name="species" required value="{{ old('species') }}">
            </div>
            <div>
                <label for="">breed:</label>
                <input type="text" name="breed" required value="{{ old('breed') }}">
            </div>
            <div>
                <label for="">Description:</label>
                <input type="text" name="description" required value="{{ old('description') }}">
            </div>
            <div>
                <label for="">Image:</label>
                <input type="file" name="img" required>
            </div>
            <input type="submit" value="Post">
        </form>
    </div>
@endsection
