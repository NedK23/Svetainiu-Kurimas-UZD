@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body text-center">
            <h3 class="card-title mb-3">{{ __('Welcome') }}, {{$name ?? 'Name'}}!</h3>
            <p class="card-text mb-4">{{ __('Role') }}: {{ $role ?? 'User' }}</p>

            <h5>{{ __('Choose Your System') }}:</h5>

            <div class="d-grid gap-3 mt-3">
                <a href="{{ route('conference') }}" class="btn btn-primary">{{ __('Client System') }}</a>
                <a href="{{ route('worker.conferences') }}" class="btn btn-warning">{{ __('Worker System') }}</a>
                <a href="{{ route('admin.conferences.index') }}" class="btn btn-danger">{{ __('Admin System') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
