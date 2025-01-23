@extends('layouts.app')

@section('content')
<h1>Conferences</h1>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            <th>Action</th>
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
                    <a href="{{ route('worker.conference.show', $conference['id']) }}" class="btn btn-info">View Details</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
