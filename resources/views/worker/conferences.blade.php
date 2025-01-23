@extends('layouts.app')

@section('content')
<h1>{{ __('Conferences') }}</h1>

{{-- Upcoming Conferences --}}
<h2>{{ __('Future Conferences') }}</h2>
<table class="table">
    <thead>
        <tr>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conferences as $conference)
            @if (strtotime($conference['date']) >= strtotime(now()))
                <tr>
                    <td>{{ $conference['title'] }}</td>
                    <td>{{ $conference['description'] }}</td>
                    <td>{{ $conference['date'] }}</td>
                    <td>{{ $conference['location'] }}</td>
                    <td>
                        <a href="{{ route('worker.conference.show', $conference['id']) }}" class="btn btn-info">{{ __('View Details') }}</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<h2 class="mt-5">{{ __('Past Conferences') }}</h2>
<table class="table table-light">
    <thead>
        <tr>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conferences as $conference)
            @if (strtotime($conference['date']) < strtotime(now()))
                <tr class="text-muted">
                    <td>{{ $conference['title'] }}</td>
                    <td>{{ $conference['description'] }}</td>
                    <td>{{ $conference['date'] }}</td>
                    <td>{{ $conference['location'] }}</td>
                    <td>
                        <a href="{{ route('worker.conference.show', $conference['id']) }}" class="btn btn-info">{{ __('View Details') }}</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection
