@extends('layouts.app')

@section('content')
<h1>Edit User</h1>
<form method="POST" action="{{ route('admin.users.update', $user['id']) }}">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $user['name'] }}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $user['email'] }}" required>

    <button type="submit">Update</button>
</form>
@endsection
