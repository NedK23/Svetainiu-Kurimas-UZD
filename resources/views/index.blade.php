@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card p-4" style="width: 300px;">
            <h3 class="mb-3 text-center">Login</h3>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <form method="GET" action="{{ route('main') }}">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
        </div>
    </div>
@endsection
