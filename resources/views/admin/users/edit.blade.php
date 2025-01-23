@extends('layouts.app')

@section('content')
<div class="container mt-4">
<h1 class="mb-4 text-danger font-weight-bold text-center">{{ __('Edit User') }}</h1>
<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
    <label for="name">{{ __('Name') }}:</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ old('name',$user->name) }}" required>
    </div>

    <div class="form-group mb-3">
    <label for="surname">{{ __('Surname') }}:</label>
    <input class="form-control" type="text" id="surname" name="surname" value="{{ old('surname',$user->surname) }}" required>
    </div>

    <div class="form-group mb-3">
    <label for="email">{{ __('Email') }}:</label>
    <input class="form-control" type="email" id="email" name="email" value="{{ old('email',$user->email) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="role" class="form-label">{{ __('Group') }}</label>
        <select class="form-control" id="role" name="role" required>
            @foreach($roles as $id => $name)
                <option value="{{ $id }}" {{ $user->roles->pluck('id')->contains($id) ? 'selected' : '' }}>
                    {{ ucfirst($name) }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ __('Update User') }}</button>
</form>
</div>
@endsection
