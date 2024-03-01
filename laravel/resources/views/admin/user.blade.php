@include('admin.shared.header')
@include('admin.shared.nav')

<div class="container user-profile">
    <div class="d-flex justify-content-center align-items-center flex-column"> <!-- Centering container -->
        <section class="profile text-center text-justify">
            <div class="img-container">
                @if ($user->img == null)
                    <img src="{{ asset('assets/no_img.jpg') }}" alt="Profile Image" class="img-thumbnail rounded-circle" width="100px">
                @else
                    <img src="{{ asset($user->img) }}" alt="Profile Image" class="img-thumbnail rounded-circle" width="100px">
                @endif
                <span>
                    @auth
                        @if (Auth::id() === $user->id)
                            <div>
                                <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#reportModal">
                                    <i class="bi bi-pencil-square text-primary"></i>
                                </a>
                            </div>
                        @endif
                    @endauth
                </span>
                <h1 class="h1" style="color: #fffffe;">{{ $user->name }}</h1>
                <h4 class="h4" style="color: #94a1b2;">{{ $user->email }}</h4>
            </div>
        </section>
    </div> <!-- End of centering container -->

    <section id="pet" class="pet section-padding">
        <div class="container">
            @if ($pets->isEmpty())
                <h1>No pets available</h1>
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3">
                    @foreach ($pets as $pet)
                        <div class="col">
                            <a href="{{ route('admin.post', ['id' => $pet]) }}" class="text-decoration-none">
                                <div class="card h-100" style="background-color: #242629;">
                                    <img src="{{ asset($pet->img) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #94a1b2;">{{ $pet->name }}</h5>
                                        <p class="card-text" style="color: #fffffe">
                                            {{ \Illuminate\Support\Str::limit($pet->description, 100, $end = '...') }}
                                        </p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-center">
                                        <button class="btn" style="background-color: #7f5af0; color:#fffffe;">Click for more</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <div class="container">{{ $pets->links() }}</div>
</div>

@include('admin.shared.footer')
