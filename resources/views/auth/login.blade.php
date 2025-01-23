@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card p-4" style="width: 300px;">
            <h3 class="mb-3 text-center">{{ __('Login') }}</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                    <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
            </form>
            <div class="card-footer text-center">
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-primary font-weight-bold">{{ __('Register') }}</a>
                </p>
            </div>
        </div>
    </div>
@endsection
