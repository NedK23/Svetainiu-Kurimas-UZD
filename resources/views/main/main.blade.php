@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Studentų informacija -->
    <h1>Welcome!</h1>
    <p><strong>Student:</strong> {{$name ?? 'Name'}} {{ $surname ?? 'Surname'}}</p>
    <p><strong>Group:</strong> PIT-22-NL</p>

    <!-- Nuorodos į vaidmenų posistemius -->
    <h2>Pasirinkite posistemį:</h2>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('conference') }}" class="btn btn-primary">Kliento posistemis</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('worker.conferences') }}" class="btn btn-warning">Darbuotojo posistemis</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.conferences.index') }}" class="btn btn-danger">Administratoriaus posistemis</a>
        </li>
    </ul>
</div>
@endsection
