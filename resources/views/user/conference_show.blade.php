@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $conference['title'] }}</h1>
                <p class="card-text"><strong>Description:</strong> {{ $conference['description'] }}</p>
                <p class="card-text"><strong>Date:</strong> {{ $conference['date'] }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $conference['location'] }}</p>

                <form method="POST" action="{{ route('user.conference.register', $conference['id']) }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg mt-3">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
