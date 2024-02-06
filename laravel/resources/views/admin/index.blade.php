@include('admin.shared.header')
@include('admin.shared.nav')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Current Users</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">{{ $userCount }}</div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.users') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>

                </div>

            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Pets Available for Adoption</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">{{ $availablePetsCount }}</div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.pets') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Overall adopted pet</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">{{ $adoptedPetCount }}</div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.adopted-pets') }}">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Banned Users</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">{{ $banned }}</div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.banned-users') }}">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Reported post
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Pet ID</th>
                                <th>Pet Name</th>
                                <th>Reason</th>
                                <th>Profile</th>
                                <th>Delete Post</th>
                                <th>Ban</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->pet->id }}</td>
                                    <td>{{ $report->pet->name }}</td>
                                    <td>{{ $report->reason }}</td>
                                    <td><a href="{{ route('admin.user-profile', ['id' => $report->pet->user->id]) }}">{{ $report->pet->user->name }}<i
                                                class="bi bi-arrow-up-right"></i></a></td>
                                    <td>
                                        <form action="{{ route('pet.delete', ['pet' => $report->pet->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-white" value="Delete this post">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.ban', ['id' => $report->pet->user->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="submit" class="btn btn-danger" value="Ban this User">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@include('admin.shared.footer')
