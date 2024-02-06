@include('admin.shared.header')
@include('admin.shared.nav')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Banned Users
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
                        <th>Unban</th>

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
                            <td>
                                <form action="{{ route('admin.unban', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="submit" class="btn btn-primary" value="unban this user">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.shared.footer')
