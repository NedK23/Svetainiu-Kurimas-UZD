@extends('layouts.app')

<!-- Conference details -->
<!-- Data pulled from DB (database.sqlite) -->
<!-- Seeded by ConferenceSeeder -->

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title text-center">{{ $conference->title }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <h4 class="mb-4 text-secondary">{{ __('Conference Details') }}</h4>
                        <p class="card-text">
                            <strong class="text-dark">{{ __('Description') }}:</strong>
                            {{ $conference->description }}
                        </p>
                        <p class="card-text">
                            <strong class="text-dark">{{ __('Date') }}:</strong>
                            <span class="badge bg-info text-dark">{{ $conference->date }}</span>
                        </p>
                        <p class="card-text">
                            <strong class="text-dark">{{ __('Location') }}:</strong>
                            {{ $conference->location }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-5 text-center">
                        <br>
                        <br>
                        <form method="POST" action="{{ route('user.conference.register', $conference['id']) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg btn-block">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
