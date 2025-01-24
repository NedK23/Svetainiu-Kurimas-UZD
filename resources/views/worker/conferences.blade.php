@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-success mb-4">{{ __('Conferences') }}</h1>

    <div class="card shadow mb-5">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">{{ __('Future Conferences') }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Location') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($conferences as $conference)
                        @if (strtotime($conference['date']) >= strtotime(now()))
                            <tr>
                                <td>{{ $conference['title'] }}</td>
                                <td>{{ $conference['description'] }}</td>
                                <td>{{ $conference['date'] }}</td>
                                <td>{{ $conference['location'] }}</td>
                                <td>
                                    <a href="{{ route('worker.conference.show', $conference['id']) }}" class="btn btn-outline-success">{{ __('View Details') }}</a>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">{{ __('No Conferences available.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header bg-light text-success">
            <h2 class="mb-0">{{ __('Past Conferences') }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Location') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($conferences as $conference)
                        @if (strtotime($conference['date']) < strtotime(now()))
                            <tr class="text-muted">
                                <td>{{ $conference['title'] }}</td>
                                <td>{{ $conference['description'] }}</td>
                                <td>{{ $conference['date'] }}</td>
                                <td>{{ $conference['location'] }}</td>
                                <td>
                                    <a href="{{ route('worker.conference.show', $conference->id) }}" class="btn btn-outline-secondary">{{ __('View Details') }}</a>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">{{ __('No Conferences available.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
