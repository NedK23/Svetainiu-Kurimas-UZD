@extends('layouts.app')

@section('content')
<h1>{{ $conference['title'] }}</h1>
<p>{{ $conference['description'] }}</p>
<p>{{ __('Date') }}: {{ $conference['date'] }}</p>
<p>{{ __('Location') }}: {{ $conference['location'] }}</p>

<h3>{{ __('Registered Users') }}</h3>
@if (count($registrations) > 0)
    <table class="table">
        <thead>
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
    <p>{{ __('No users have registered for this conference yet.') }}</p>
@endif
@endsection
