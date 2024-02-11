@include('admin.shared.header')
@include('admin.shared.nav')
<div class="container pet-profile mt-5">
    <img src="{{ asset($pet->img) }}" alt="" width="100px">
    <h1>{{ $pet->name }}</h1>
    <h1>{{ $pet->age }}</h1>
    <h1>{{ $pet->species }}</h1>
    <h1>{{ $pet->breed }}</h1>
    <p>{{ $pet->description }}</p>



    <form action="{{ route('pet.delete', ['pet' => $pet]) }}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Delete this post">
    </form>

</div>


@include('admin.shared.footer')
