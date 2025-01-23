@extends('layouts.app')

@section('content')
<h1>{{ __('All Conferences') }}</h1>
<a href="{{ route('admin.users.index') }}">{{ __('Manage Users') }}</a>
<a href="{{ route('admin.conferences.index') }}">{{ __('Manage Conferences') }}</a>
@endsection
