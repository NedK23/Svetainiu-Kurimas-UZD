@extends('layouts.app')

@section('content')
<div class="container mt-4">
<h1 class="mb-4 text-danger font-weight-bold text-center">{{ __('Edit User') }}</h1>
<form method="POST" action="{{ route('admin.users.update', $user['id']) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
    <label for="name">{{ __('Name') }}:</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ $user['name'] }}" required>
    </div>

    <div class="form-group mb-3">
    <label for="email">{{ __('Email') }}:</label>
    <input class="form-control" type="email" id="email" name="email" value="{{ $user['email'] }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ __('Update User') }}</button>
</form>
</div>
@endsection
