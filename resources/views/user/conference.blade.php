@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ __('All Conferences') }}</h1>

        <div class="row">
            @foreach ($conferences as $conference)
                @if (strtotime($conference['date']) >= strtotime(now()))
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $conference['title'] }}</h5>
                                <p class="card-text">{{ __('Date') }}: {{ $conference['date'] }}</p>
                                <a href="{{ route('user.conference.show', $conference['id']) }}" class="btn btn-primary">{{ __('More Info') }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

@endsection
