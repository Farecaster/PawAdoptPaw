@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="d-none d-lg-block col-lg-4 col-xl-3 d-flex align-items-end justify-content-end text-center">

                <div class="card main-content left">
                    <div class="card-title">
                        <a href="{{ route('social.user', ['id' => $user->id]) }}">
                            @if ($user->img == null)
                                <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                    style="width: 60px; height: 60px; border-radius: 50%;"class="img-fluid img">
                            @else
                                <img src="{{ asset($user->img) }}" alt="User Image"
                                    style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid img">
                            @endif
                            <h6 class="text-black ms-2">{{ $user->name }}</h6>
                        </a>
                        @if ($user->id == Auth::id())
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Create Post
                            </button>
                        @endif
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
                                    <a href="{{ route('social.user', ['id' => $post->user->id]) }}">
                                        @if (!$post->user->img)
                                            <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                                style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid">
                                        @else
                                            <img src="{{ asset($post->user->img) }}" alt="User Image"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                        @endif
                                    </a>
                                    <a href="{{ route('social.user', ['id' => $post->user->id]) }}">
                                        <h6 class="text-black ms-2">{{ $post->user->name }}</h6>
                                    </a>
                                </div>
                                @if ($post->user->id != auth()->id())
                                    <i class="bi bi-exclamation-circle text-danger report-btn" data-bs-toggle="modal"
                                        data-bs-target="#reportModal" data-post-id="{{ $post->id }}"></i>
                                @else
                                    <a href="{{ route('social.edit', ['id' => $post->id]) }}"><i
                                            class="bi bi-pencil-square text-primary"></i></a>
                                @endif

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
                            <img src="{{ asset($post->img) }}" alt="...">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorList"></ul>
                    <form action="">
                        <input type="text" name="caption" placeholder="Write something you want" class="caption">
                        <input type="file" name="img" id="file" value="null" class="form-control">
                        <label for="file" id="label" class="btn">Choose Image<i
                                class="bi bi-card-image"></i></label>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-post">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorListReport"></ul>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for reporting:</label>
                        <input type="text" name="reason" class="form-control reason" placeholder="Enter reason"
                            required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger submit">Submit Request</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-post, .post-btn', function(e) {
                e.preventDefault();
                console.log('hi');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formData = new FormData();
                formData.append('caption', $('.caption').val());
                var file = $('#file')[0].files[0];
                if (file) {
                    formData.append('img', file);
                } else {
                    formData.append('img', ''); // or null, depending on how your backend expects it
                }

                console.log(formData.get('caption')); // Logging caption value
                console.log(formData.get('img')); //
                $.ajax({
                    type: "POST",
                    url: "/pet-social/post",
                    data: formData,
                    dataType: "json",
                    contentType: false, // Set to false when sending FormData
                    processData: false, // Set to false when sending FormData
                    success: function(response) {
                        console.log('Successful response:', response);
                        $('#exampleModal').modal('hide');
                        $('#exampleModal').find('input').val("");
                        $('#errorList').html("");
                        $('.caption').val("");
                        $('#file').val("");
                        $('#successList').addClass('alert alert-success');
                        $('#successList').append("<li> Posted successfully </li>");
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#errorList').html("");
                        $('#errorList').addClass('alert alert-danger');
                        $('#errorList').append('<li>' + JSON.parse(xhr.responseText)
                            .message +
                            '</li>');
                    }
                });

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.bi-heart, .bi-heart-fill', function(e) { // Updated selector
                e.preventDefault();
                var postId = $(this).data('post-id');
                var heartIcon = $(this); // Store a reference to the heart icon
                heartIcon.prop('disabled', true);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if (heartIcon.hasClass('bi-heart')) {
                    // If heart icon is not filled, send a like request
                    $.ajax({
                        type: "POST",
                        url: "/pet-social/" + postId + "/like",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            heartIcon.removeClass('bi-heart').addClass('bi-heart-fill');
                            // Update the like count displayed on the button
                            var likeCount = parseInt(heartIcon.text());
                            heartIcon.text(likeCount + 1);
                            heartIcon.prop('disabled', false);
                        }
                    });
                } else if (heartIcon.hasClass('bi-heart-fill')) {
                    // If heart icon is filled, send an unlike request
                    $.ajax({
                        type: "POST",
                        url: "/pet-social/" + postId + "/unlike",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            heartIcon.removeClass('bi-heart-fill').addClass('bi-heart');
                            var likeCount = parseInt(heartIcon.text());
                            heartIcon.text(likeCount - 1);
                            heartIcon.prop('disabled', false);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var postId; // Declare postId in the outer scope

            $(document).on('click', '.report-btn', function(e) {
                e.preventDefault();
                postId = $(this).data('post-id');
            });

            $(document).on('click', '.submit', function(e) {
                e.preventDefault();

                if (!postId) {
                    console.error('postId is not set.');
                    return;
                }
                var data = {
                    'reason': $('.reason').val(),
                };
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/pet-social/" + postId,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#reportModal').modal('hide');
                        $('#reportModal').find('input').val("");
                        $('#errorListReport').html("");

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        console.log(postId);
                        $('#errorListReport').html("");
                        $('#errorListReport').addClass('alert alert-danger');
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr
                            .responseJSON.message : 'An error occurred.';
                        $('#errorListReport').append('<li>' + errorMessage + '</li>');
                    }
                });
            });
        });
    </script>
@endsection
