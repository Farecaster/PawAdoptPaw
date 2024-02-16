@extends('layout.app')
@section('content')
    <section id="petprofile" class="incoming section-padding">
        <div class="container user-profile mt-5">
            @if ($incomingRequests->isNotEmpty())                <h1 class="text-center">Incoming Request</h1>


                <div class="table-responsive">
                    <table class="table table-bordered mx-auto">
                        <thead>
                            <tr class="text-center">
                                <th>Pet Requested</th>
                                <th>Requester Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Contact Number</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($incomingRequests as $request)
                                <tr class="text-center">
                                    <td><img src="{{ $request->pet->img }}" alt="pet" width="100px">
                                        <div>
                                            <a
                                                href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a>
                                        </div>
                                    </td>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->address }}</td>
                                    <td>{{ $request->city }}</td>
                                    <td>{{ $request->contact_number }}</td>
                                    <td><a href="{{ route('incoming.requests.details', ['id' => $request->id]) }}">View
                                            Details</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center user-profile">No adoption requests available.</p>
            @endif
        </div>
    </section>
@endsection
