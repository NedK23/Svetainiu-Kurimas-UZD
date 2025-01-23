@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">{{ __('All Conferences') }}</h1>
    <div class="row">
        @forelse ($conferences as $conference)
            @if (strtotime($conference['date']) >= strtotime(now()))
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $conference['title'] }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>{{ __('Date') }}:</strong> <span class="badge bg-info text-dark">{{ $conference['date'] }}</span></p>
                            <p class="card-text"><strong>{{ __('Location') }}:</strong> {{ $conference['location'] }}</p>
                            <p class="card-text">{{ Str::limit($conference['description'], 100, '...') }}</p>
                            <a href="{{ route('user.conference.show', $conference['id']) }}" class="btn btn-primary btn-block">{{ __('More Info') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <p class="text-muted">{{ __('No Conferences available.') }}</p>
        @endforelse
    </div>
@endsection
