@include('admin.shared.header')
@include('admin.shared.nav')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Current Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Pet Social Profile</th>
                        <th>Ban</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('admin.user-profile', ['id' => $user->id]) }}">{{ $user->name }}<i
                                        class="bi bi-arrow-up-right"></i></a></td>
                            <td><a href="{{ route('admin.user-social', ['id' => $user->id]) }}">{{ $user->name }}<i
                                        class="bi bi-arrow-up-right"></i></a></td>
                            <td>


                                <input type="submit" class="btn btn-danger ban-user" value="Ban this User"
                                    data-user-id="{{ $user->id }}">

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.shared.footer')
<script>
    $(document).ready(function() {

        $(document).on('click', '.ban-user-social, .ban-user', function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            console.log(userId);

            var confirmation = confirm("Are you sure you want to ban this user?");
            if (confirmation) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/admin/user/" + userId,
                    success: function(response) {
                        console.log(response);
                        window.location.href = "/admin/users";
                    }
                });
            }
        });

    });
</script>
