@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow mb-5">
        <div class="card-header bg-success text-white">
            <h1 class="text-center">{{ $conference['title'] }}</h1>
        </div>
        <div class="card-body">
            <p class="lead"><strong>{{ __('Description') }}:</strong> {{ $conference['description'] }}</p>
            <p><strong>{{ __('Date') }}:</strong> {{ $conference['date'] }}</p>
            <p><strong>{{ __('Location') }}:</strong> {{ $conference['location'] }}</p>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="text-secondary">{{ __('Registered Users') }}</h3>
        @if (count($registrations) > 0)
            <table class="table table-striped table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Surname') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $registration['name'] }}</td>
                            <td>{{ $registration['surname'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">{{ __('No users have registered for this conference yet.') }}</p>
        @endif
    </div>
</div>
@endsection
