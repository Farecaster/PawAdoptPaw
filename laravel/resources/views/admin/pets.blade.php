@include('admin.shared.header')
@include('admin.shared.nav')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Pets
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Breed</th>
                        <th>Profile</th>
                        <th>Ban</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet->id }}</td>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->breed }}</td>
                            <td><a href="{{ route('admin.post', ['id' => $pet->id]) }}">{{ $pet->name }}<i
                                        class="bi bi-arrow-up-right"></i></a></td>
                            <td>
                                <form action="{{ route('pet.delete', ['pet' => pet->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-white" value="Delete this post">
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
