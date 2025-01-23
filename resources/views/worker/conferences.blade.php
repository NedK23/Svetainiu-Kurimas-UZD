@extends('layouts.app')

@section('content')
<h1>{{ __('Conferences') }}</h1>
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
            <tr>
                <td>{{ $conference['title'] }}</td>
                <td>{{ $conference['description'] }}</td>
                <td>{{ $conference['date'] }}</td>
                <td>{{ $conference['location'] }}</td>
                <td>
                    <a href="{{ route('worker.conference.show', $conference['id']) }}" class="btn btn-info">{{ __('View Details') }}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
