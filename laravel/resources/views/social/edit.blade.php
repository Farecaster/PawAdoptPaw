@extends('layout.app')
@section('content')
    <div class="container edit-content d-flex justify-content-center mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card card-content mb-4">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                @if (!$id->user->img)
                                    <img src="{{ asset('assets/no_img.jpg') }}" alt="User Image"
                                        style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid">
                                @else
                                    <img src="{{ asset($id->user->img) }}" alt="User Image"
                                        style="width: 60px; height: 60px; border-radius: 50%;" class="img-fluid">
                                @endif
                                <h6 class="text-black ms-2">{{ $id->user->name }}</h6>
                            </div>
                            @if ($id->user->id != auth()->id())
                                <i class="bi bi-exclamation-circle text-danger report-btn" data-bs-toggle="modal"
                                    data-bs-target="#reportModal" data-post-id="{{ $id->id }}"></i>
                            @else
                                <div>
                                    <i class="bi bi-trash text-danger" data-post-id="{{ $id->id }}"></i>
                                    <i id="submitIcon" class="bi bi-check2-square text-primary"></i>
                                </div>
                            @endif

                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('social.update', ['id' => $id->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="text" class="form-control" name="caption"
                                            value="{{ $id->caption }}">
                                        @error('caption')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="file" class="form-control" name="img"
                                            value="{{ $id->img }}">
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" id="hiddenSubmit" style="display: none;"></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <img src="{{ asset($id->img) }}" alt="...">
                        <hr>
                        @if (Auth::user()->likes->contains($id->id))
                            <!-- If the user has liked the post, display the filled heart icon -->
                            <i class="bi bi-heart-fill" id="heart"
                                data-post-id="{{ $id->id }}">{{ $id->likes->count() }}</i>
                        @else
                            <!-- If the user has not liked the post, display the empty heart icon -->
                            <i class="bi bi-heart" id="heart"
                                data-post-id="{{ $id->id }}">{{ $id->likes->count() }}</i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to the icon
        document.getElementById('submitIcon').addEventListener('click', function() {
            // Trigger the form submission
            document.getElementById('hiddenSubmit').click();
        });
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.bi-trash', function(e) {
                e.preventDefault();

                var id = $(this).data('post-id');
                console.log(id);
                var deleteButton = $(this);
                var confirmation = confirm("Are you sure you want to delete this?");

                if (confirmation) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: "/pet-social/" + id,
                        success: function(response) {
                            console.log('Post deleted successfully');
                            // Redirect to another page after successful delete
                            window.location.href = "/pet-social/";
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
@endsection
