@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card p-4" style="width: 300px;">
        <h1 class="text-center text-danger">{{ __('Register') }}</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="surname">{{ __('Surname') }}</label>
                <input type="text" name="surname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">{{ __('Register') }}</button>
        </form>
    </div>
</div>
@endsection
