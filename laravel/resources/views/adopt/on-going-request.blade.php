@extends('layout.app')
@section('content')
    <div class="container user-profile">
        @if ($onGoingRequests->isNotEmpty())
            <h1 class="text-center">On Going Request</h1>


            <div class="table-responsive">
                <table class="table table-bordered mx-auto">
                    <thead>
                        <tr class="text-center">
                            <th>Pet Requested</th>
                            <th>Requester Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Details</th>
                            <th>Done</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($onGoingRequests as $request)
                            <tr class="text-center">
                                <td><img src="{{ asset($request->pet->img) }}" alt="pet" width="100px">
                                    <div>
                                        <a
                                            href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a>
                                    </div>
                                </td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->address }}</td>
                                <td>{{ $request->city }}</td>
                                <td><a href="{{ route('ongoing.requests.details', ['id' => $request->id]) }}">View
                                        Details</a></td>
                                <td>
                                    <form action="{{ route('done.request', ['id' => $request->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-success">Done</button>
                                    </form>
                                </td>
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
