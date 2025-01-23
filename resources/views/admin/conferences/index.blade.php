@extends('layouts.app')

<?php
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@section('content')

<div class="container mt-5">

    <h1 class="mb-4 text-danger font-weight-bold text-center">{{ __('Conference Management') }}</h1>

    <div class="card shadow mb-5">
        <div class="card-header bg-danger text-white">
            <h2 class="mb-0">{{ __('All Conferences') }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.conferences.create') }}" class="btn btn-outline-danger">
                    <i class="bi bi-plus-circle"></i> {{ __('Create New Conference') }}
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conferences as $conference)
                        <tr>
                            <td>{{ $conference['id'] }}</td>
                            <td>{{ $conference['title'] }}</td>
                            <td>{{ $conference['description'] }}</td>
                            <td>{{ $conference['date'] }}</td>
                            <td>
                                <a href="{{ route('admin.conferences.edit', $conference['id']) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> {{ __('Edit') }}
                                </a>
                                <form method="POST" action="{{ route('admin.conferences.destroy', $conference['id']) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> {{ __('Delete') }}
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

