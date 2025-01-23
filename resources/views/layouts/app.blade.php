<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Konferencijų sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- BRAND -->
            <a class="navbar-brand" href="{{ route('main') }}">{{ __('Conference Sistem') }}</a>

            <!-- NAVBAR -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('conference') }}">{{ __('Client') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('worker.conferences') }}">{{ __('Worker') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">{{ __('Admin') }}</a>
                    </li>
                </ul>

                <!-- RIGHT SIDE -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-center">
                     @if(session('name') && session('surname'))
                    <li class="nav-item d-flex justify-content-center">
                        <span class="navbar-text text-light">
                            {{ session('name') }} {{ session('surname') }}
                        </span>
                    </li>
                @endif
                <!-- LANGUAGES -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Language') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (config('app.languages') as $lang => $language)
                            <li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{ $language }}</a></li>
                        @endforeach
                    </ul>
                </li>

                    <!-- LOGOUT BUTTON -->
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger disabled">{{ __('Logout') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>




</body>

</html>
