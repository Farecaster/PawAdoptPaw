@extends('layout.app')

@section('content')
    <section id="petprofile" class="myrequest section-padding">
        <div class="container user-profile">
            @if ($adoptionRequests->isNotEmpty())
                <h1 class="text-center">Adoption Request</h1>


                <div class="table-responsive">
                    <table class="table table-bordered mx-auto">
                        <thead>
                            <tr class="text-center">
                                <th>Pet Requested</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($adoptionRequests as $request)
                                <tr class="text-center">
                                    <td><img src="{{ $request->pet->img }}" alt="pet" width="100px">
                                        <div>
                                            <a
                                                href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a>
                                        </div>
                                    </td>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->address }}</td>
                                    <td><a href="{{ route('my.requests.edit', ['id' => $request->id]) }}">Edit</a></td>
                                    <td>
                                        <form action="{{ route('my.requests.delete', ['id' => $request->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <!-- Add more columns as needed -->

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
