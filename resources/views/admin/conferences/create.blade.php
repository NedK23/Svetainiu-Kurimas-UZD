@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Create Conference</h1>

    <form method="POST" action="{{ route('admin.conferences.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Conference</button>
    </form>
</div>
@endsection
