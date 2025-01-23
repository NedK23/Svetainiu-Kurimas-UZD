@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $conference['title'] }}</h1>
                <p class="card-text"><strong>{{ __('Description') }}:</strong> {{ $conference['description'] }}</p>
                <p class="card-text"><strong>{{ __('Date') }}:</strong> {{ $conference['date'] }}</p>
                <p class="card-text"><strong>{{ __('Location') }}:</strong> {{ $conference['location'] }}</p>

                <form method="POST" action="{{ route('user.conference.register', $conference['id']) }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg mt-3">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
