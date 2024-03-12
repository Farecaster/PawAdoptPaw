@include('admin.shared.header')
@include('admin.shared.nav')

<div class="container">
    <div class="row">
        <div class="d-none d-lg-block col-lg-4 col-xl-3 d-flex align-items-end justify-content-end text-center">

            <div class="card main-content left">
                <div class="card-title">

                    @if ($user->img == null)
                        <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                            style="width: 60px; height: 60px; border-radius: 50%;"class="img-fluid img">
                    @else
                        <img src="{{ asset($user->img) }}" alt="User Image"
                            style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid img">
                    @endif
                    <h6 class="text-black ms-2" data-user-id="{{ $user->id }}">{{ $user->name }}</h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-9 scrollable-content user-content">
            <div class=" user-content"></div>
            @foreach ($posts as $post)
                <div class="card card-content mb-4">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">

                                @if (!$post->user->img)
                                    <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                        style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid">
                                @else
                                    <img src="{{ asset($post->user->img) }}" alt="User Image"
                                        style="width: 60px; height: 60px; border-radius: 50%;">
                                @endif

                                <h6 class="text-black ms-2">{{ $post->user->name }}</h6>

                            </div>

                            <i class="bi bi-trash3 text-danger report-btn" data-post-id="{{ $post->id }}"></i>


                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-text text-black">{{ $post->caption }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset($post->img) }}" alt="..." class="img-fluid">
                        </div>
                        <hr>
                        @if (Auth::user()->likes->contains($post->id))
                            <!-- If the user has liked the post, display the filled heart icon -->
                            <i class="bi bi-heart-fill" id="heart"
                                data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</i>
                        @else
                            <!-- If the user has not liked the post, display the empty heart icon -->
                            <i class="bi bi-heart" id="heart"
                                data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</i>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('admin.shared.footer')
<script>
    $(document).ready(function() {
        $(document).on('click', '.bi-trash3', function(e) {
            e.preventDefault();
            var postId = $(this).data('post-id');
            var userId = $('h6').data('user-id');
            console.log(postId, userId);
            var confirmation = confirm("Are you sure you want to delete this?");
            if (confirmation) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/admin/pet-social/" + postId + "/delete",
                    success: function(response) {
                        console.log(response);
                        window.location.href = "/admin/pet-social/user/" + userId;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting post:', error);
                        // Handle the error here, such as displaying an alert or logging the error
                    }
                });
            }


        });
    });
</script>
