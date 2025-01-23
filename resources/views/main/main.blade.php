@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ __('Welcome') }}!</h1>
    <p><strong>{{ __('Student') }}:</strong> {{$name ?? 'Name'}} {{ $surname ?? 'Surname'}}</p>
    <p><strong>{{ __('Group') }}:</strong> PIT-22-NL</p>

    <h2>{{ __('Choose Your Sistem') }}:</h2>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('conference') }}" class="btn btn-primary">{{ __('Client Sistem') }}</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('worker.conferences') }}" class="btn btn-warning">{{ __('Worker Sistem') }}</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.conferences.index') }}" class="btn btn-danger">{{ __('Admin Sistem') }}</a>
        </li>
    </ul>
</div>
@endsection
