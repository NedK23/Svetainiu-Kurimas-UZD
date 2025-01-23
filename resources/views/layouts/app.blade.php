<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Konferencijų sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- BRAND -->
            <a class="navbar-brand" href="{{ route('main') }}">Konferencijų sistema</a>

            <!-- NAVBAR -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('conference') }}">Klientas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('worker.conferences') }}">Klientas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Administratorius</a>
                    </li>
                </ul>

                <!-- RIGHT SIDE  -->
                <ul class="navbar-nav ml-auto">
                    @if(session('name') && session('surname'))
                <li class="nav-item">
                    <span class="navbar-text">
                        {{ session('name') }} {{ session('surname') }}
                    </span>
                    </li>
                    @endif
                    <!-- LANGUAGES -->
                    <ul>
                        @foreach (config('app.languages') as $lang => $language)
                            <li>
                                <a href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <li class="nav-item">
                        <!-- LOGOUT -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentLocale = "{{ app()->getLocale() }}";
        console.log('Current Locale:', currentLocale);
    </script>

</body>
</html>
