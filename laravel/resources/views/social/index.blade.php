    @extends('layout.app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="d-none d-lg-block col-lg-4 col-xl-3 d-flex align-items-end justify-content-end text-center">
                    <div class="card main-content left" style="background-color: #e3f6f5">
                        <div class="card-title">
                            <a href="{{ route('social.user', ['id' => Auth::id()]) }}">
                                @if (Auth::user()->img == null)
                                    <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                        style="width: 60px; height: 60px; border-radius: 50%;"class="img-fluid img">
                                @else
                                    <img src="{{ asset(Auth::user()->img) }}" alt="User Image"
                                        style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid img">
                                @endif
                                <h6 class="ms-2" style="color: #2d334a">{{ Auth::user()->name }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-9 scrollable-content">
                    <div class="card main-content">
                        <div class="card-body" style="background-color: #e3f6f5">
                            <div class="card-title d-flex align-items-center">
                                <a href="{{ route('social.user', ['id' => Auth::id()]) }}">
                                    @if (Auth::user()->img == null)
                                        <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                            style="width: 60px; height: 60px; border-radius: 50%;"class="img-fluid">
                                    @else
                                        <img src="{{ asset(Auth::user()->img) }}" alt="User Image"
                                            style="width: 60px; height: 60px; border-radius: 50%;">
                                    @endif
                                </a>
                                <a href="{{ route('social.user', ['id' => Auth::id()]) }}">
                                    <h6 class="ms-2" style="color: #2d334a">{{ Auth::user()->name }}</h6>
                                </a>

                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">

                                        @csrf
                                        @method('post')
                                        <ul id="errorList"></ul>
                                        <ul id="successList"></ul>
                                        <input type="text" class="form-control caption" name="caption"
                                            placeholder="Write something you want">
                                        @error('caption')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="file" class="form-control" name="img" id="file">
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <button class="btn btn-primary post-btn">Post</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($posts as $post)
                        <div class="card card-content mb-4">
                            <div class="card-body" style="background-color: #e3f6f5">
                                <div class="card-title d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('social.user', ['id' => $post->user->id]) }}">
                                            @if (!$post->user->img)
                                                <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                                    style="width: 60px; height: 60px; border-radius: 50%;"
                                                    class="img-fluid">
                                            @else
                                                <img src="{{ asset($post->user->img) }}" alt="User Image"
                                                    style="width: 60px; height: 60px; border-radius: 50%;">
                                            @endif
                                        </a>
                                        <a href="{{ route('social.user', ['id' => $post->user->id]) }}">
                                            <h6 class="ms-2" style="color: #2d334a;">{{ $post->user->name }}</h6>
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
                        <ul id="errorList-modal"></ul>
                        <ul id="successList-modal"></ul>
                        <form action="">
                            <input type="text" name="caption" placeholder="Write something you want"
                                class="caption-modal">
                            <input type="file" name="img" id="file-modal" value="null" class="form-control">

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
                        <ul id="successListReport"></ul>
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
                $(document).on('click', '.post-btn', function(e) {
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

                            $('#exampleModal').find('input').val("");
                            $('#errorList').html("");
                            $('#errorList').removeClass("alert alert-danger");
                            $('.caption').val("");
                            $('#file').val("");
                            $('#successList').html("");
                            $('#successList').addClass('alert alert-success');
                            $('#successList').append("<li> Posted successfully </li>");
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            $('#errorList').html("");
                            $('#successList').html("");
                            $('#successList').removeClass("alert alert-success");
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
                $(document).on('click', '.btn-post', function(e) {
                    e.preventDefault();
                    console.log('hi');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var formData = new FormData();
                    formData.append('caption', $('.caption-modal').val());
                    var file = $('#file-modal')[0].files[0];
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

                            $('#exampleModal').find('input').val("");
                            $('#errorList-modal').html("");
                            $('#errorList-modal').removeClass("alert alert-danger");
                            $('.caption-modal').val("");
                            $('#file-modal').val("");
                            $('#successList-modal').html("");
                            $('#successList-modal').addClass('alert alert-success');
                            $('#successList-modal').append("<li> Posted successfully </li>");

                            setTimeout(function() {
                                $('#exampleModal').modal('hide');
                                $('#successList-modal').html("");
                                $('#successList-modal').removeClass("alert alert-success");
                            }, 1000);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            $('#errorList-modal').html("");
                            $('#successList-modal').html("");
                            $('#successList-modal').removeClass("alert alert-success");
                            $('#errorList-modal').addClass('alert alert-danger');
                            $('#errorList-modal').append('<li>' + JSON.parse(xhr.responseText)
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
                            $('#errorListReport').html("");
                            $('#successListReport').addClass('alert alert-success');
                            $('#successListReport').append('<li> Reported Successfully! </li>');
                            $('#reportModal').find('input').val("");

                            var delayInMilliseconds = 1000;

                            // Close the modal after the delay
                            setTimeout(function() {
                                $('#reportModal').modal('hide');
                            }, delayInMilliseconds);
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
