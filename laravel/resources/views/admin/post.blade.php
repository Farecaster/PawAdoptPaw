@include('admin.shared.header')
@include('admin.shared.nav')


<section id="post" class="post section-padding">
    <div class="container pet-profile mt-5 mb-5">
        <div class="card mx-auto" style="max-width: 30rem; background-color: #242629;">
            <img src="{{ asset($pet->img) }}" alt="{{ $pet->name }}" class="card-img-top">
            <div class="card-body">
                <h2 class="card-title" style="color: #fffffe;">{{ $pet->name }}</h2>
                <ul class="list-group list-group-flush" style="background-color: #242629;">
                    <li class="list-group-item" style="background-color: #242629; color: #94a1b2;"><strong>Age:</strong> {{ $pet->age }}</li>
                    <li class="list-group-item" style="background-color: #242629; color: #94a1b2;"><strong>Species:</strong> {{ $pet->species }}</li>
                    <li class="list-group-item" style="background-color: #242629; color: #94a1b2;"><strong>Breed:</strong> {{ $pet->breed }}</li>
                    <li class="list-group-item" style="background-color: #242629; color: #94a1b2;"><strong>Description:</strong> {{ $pet->description }}</li>
                </ul>
            </div>

            <div class="card-footer d-flex justify-content-center align-items-center">
                <form action="{{ route('pet.delete', ['pet' => $pet]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn" style="background-color: #7f5af0; color: #fffffe;">Delete this post</button>
                </form>
            </div>
        </div>
    </div>
</section>

@include('admin.shared.footer')
