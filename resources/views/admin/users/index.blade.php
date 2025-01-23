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
                            <th>{{ __('Surname') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Group') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['surname'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user->roles->pluck('name')}}</td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('admin.users.edit', $user->id) }}">{{ __('Edit') }}</a>

                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                         {{ __('Delete') }}
                                    </button>
                                </form>
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
