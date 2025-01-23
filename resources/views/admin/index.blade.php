@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body text-center">
            <h3 class="text-danger">{{ __('Admin Conference') }}</h3>

            <h5>{{ __('Actions') }}:</h5>

            <div class="d-grid gap-3 mt-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger btn-lg mx-3">{{ __('Manage Users') }}</a>
                <a href="{{ route('admin.conferences.index') }}" class="btn btn-danger btn-lg mx-3">{{ __('Manage Conferences') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
