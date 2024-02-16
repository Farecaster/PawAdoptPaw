@extends('layout.app')
@section('content')
    <section id="petprofile" class="history section-padding">
        <div class="container user-profile">
            @if ($historyOwner->isNotEmpty() || $historyAdopter->isNotEmpty())
                <h1 class="text-center">Adoption History</h1>

                @foreach ($historyOwner->merge($historyAdopter) as $request)
                    <div class="mb-4">
                        <img src="{{ $request->pet->img }}" alt="pet" width="100px" class="mr-3">
                        <span class="font-weight-bold">{{ $request->name }}</span>

                        @if ($request->status == 'accepted')
                            successfully adopted
                        @elseif ($request->status == 'rejected')
                            adoption request rejected
                        @elseif ($request->status == 'done')
                            successfully adopted
                        @endif

                        <a href="{{ route('pet.show', ['pet' => $request->pet->id]) }}">{{ $request->pet->name }}</a>.
                        <a href="{{ route('ongoing.requests.details', ['id' => $request->id]) }}">View Details</a>
                    </div>
                @endforeach
            @else
                <p class="text-center user-profile">No history available.</p>
            @endif
        </div>
    </section>
@endsection
