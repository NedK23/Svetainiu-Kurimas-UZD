@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-danger font-weight-bold text-center">{{ __('Edit Conference') }}</h1>

    <form method="POST" action="{{ route('admin.conferences.update', $id) }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" name="title" class="form-control" value="{{ $conference['title'] }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" class="form-control" required>{{ $conference['description'] }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" class="form-control" value="{{ $conference['date'] }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Update Conference') }}</button>
    </form>
</div>
@endsection

