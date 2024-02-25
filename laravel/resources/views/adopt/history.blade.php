@extends('layout.app')

@section('content')
    <section id="petprofile" class="history section-padding">
        <div class="container user-profile">
            @if ($historyOwner->isNotEmpty() || $historyAdopter->isNotEmpty())
                <h1 class="text-center mb-4">Adoption History</h1>

                @foreach ($historyOwner->merge($historyAdopter) as $request)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="{{ $request->pet->img }}" alt="pet" width="100px" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <span class="font-weight-bold">{{ $request->name }}</span>
                                    @if ($request->status == 'accepted')
                                        <span class="text-success">Successfully adopted</span>
                                    @elseif ($request->status == 'rejected')
                                        <span class="text-danger">Adoption request rejected</span>
                                    @elseif ($request->status == 'done')
                                        <span class="text-success">Successfully adopted</span>
                                    @endif
                                    <p class="mb-0">Pet: <a href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a></p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{ route('pending.requests.details', ['id' => $request->id]) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center user-profile">No history available.</p>
            @endif
        </div>
    </section>
@endsection
