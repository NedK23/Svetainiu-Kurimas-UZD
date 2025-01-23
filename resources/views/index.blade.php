@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body text-center">
            <h3 class="card-title mb-3">{{ __('Welcome') }}, {{ session('user_name', 'Name') }}!</h3>
            <p class="card-text mb-4">{{ __('Role') }}: {{ session('user_role', 'Role') }}</p>

            <h5>{{ __('Choose Your System') }}:</h5>



            <div class="d-grid gap-3 mt-3">
                <a href="{{ route('conference') }}" class="btn btn-primary">{{ __('Client System') }}</a>

                @if(in_array(session('user_role'), ['worker', 'admin']))
                <a href="{{ route('worker.conferences') }}" class="btn btn-warning">{{ __('Worker System') }}</a>
                @endif

                @if(in_array(session('user_role'), [ 'admin']))
                <a href="{{ route('admin.index') }}" class="btn btn-danger">{{ __('Admin System') }}</a>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
