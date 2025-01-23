@extends('layouts.app')

@section('content')

    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user['id'] }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user['id']) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@section('content')

<div class="container mt-5">

    <h1 class="mb-4 text-danger font-weight-bold text-center">{{ __('User Management') }}</h1>

    <div class="card shadow mb-5">
        <div class="card-header bg-danger text-white">
            <h2 class="mb-0">{{ __('All Users') }}</h2>
        </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('admin.users.edit', $user['id']) }}">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@endsection
