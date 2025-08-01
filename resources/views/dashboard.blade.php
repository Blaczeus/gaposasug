<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        (function () {
            const appearance = '{{ $appearance ?? "system" }}';
            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    <style>
        html {
            background-color: oklch(1 0 0);
        }

        html.dark {
            background-color: oklch(0.145 0 0);
        }
    </style>

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard-assets/img/favicon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/fonts/flaticon.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('dashboard-assets/css/fullcalendar.min.css') }}"> -->
    <!-- FullCalendar v6+ compiled CSS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js'></script>
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/style.css') }}">

    <!-- Modernizr -->
    <script src="{{ asset('dashboard-assets/js/modernizr-3.6.0.min.js') }}"></script>

    <!-- JS Files -->
    <script src="{{ asset('dashboard-assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/jquery.dataTables.min.js') }}"
    <script src="{{ asset('dashboard-assets/js/main.js') }}"></script>

    @routes
    @vite(['resources/js/app.ts'])
    @inertiaHead
</head>
<body class="font-sans antialiased">
    @inertia
</body>
</html>
