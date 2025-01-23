@extends('layouts.app')

@section('content')
<p>Session Language: {{ session('language') }}</p>
<p>Current Locale: {{ App::getLocale() }}</p>
<h1>{{ __('All Conferences') }}</h1>
<a href="{{ route('admin.users.index') }}">Manage Users</a>
<a href="{{ route('admin.conferences.index') }}">Manage Conferences</a>
@endsection
