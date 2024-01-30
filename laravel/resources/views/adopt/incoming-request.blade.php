@extends('layout.app')

@section('content')
    <div class="container mt-5">
        @if ($incomingRequests->isNotEmpty())
            <h1 class="text-center">Incoming Request</h1>


            <div class="table-responsive">
                <table class="table table-bordered mx-auto">
                    <thead>
                        <tr>
                            <th>Pet Requested</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Contact Number</th>
                            <th>Details</th>
                            <th>Reject</th>
                            <th>Accept</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($incomingRequests as $request)
                            <tr>
                                <td><img src="{{ $request->pet->img }}" alt="pet" width="100px"></td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->address }}</td>
                                <td>{{ $request->city }}</td>
                                <td>{{ $request->contact_number }}</td>
                                <td><a href="">View</a></td>
                                <td><a href="">Reject</a></td>
                                <td><a href="">Accept</a></td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center user-profile">No adoption requests available.</p>
        @endif
    </div>
@endsection
