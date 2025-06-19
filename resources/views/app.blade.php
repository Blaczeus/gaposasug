<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Detect system dark mode preference --}}
    <script>
        (function() {
            const appearance = '{{ $appearance ?? "system" }}';
            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    {{-- Background color --}}
    <style>
        html {
            background-color: oklch(1 0 0);
        }

        html.dark {
            background-color: oklch(0.145 0 0);
        }
    </style>

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    {{-- Favicons --}}
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- Custom landing page head content --}}
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/fav.svg">
    <!-- animate css -->
    <link rel="stylesheet" href="/assets/css/plugins/animate.min.css">
    <!-- fontawesome 6.4.2 -->
    <link rel="stylesheet" href="/assets/css/plugins/fontawesome.min.css">
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <!-- swiper Css 10.2.0 -->
    <link rel="stylesheet" href="/assets/css/plugins/swiper.min.css">
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="/assets/css/vendor/magnific-popup.css">
    <!-- metismenu scss -->
    <link rel="stylesheet" href="/assets/css/vendor/metismenu.css">
    <!-- nice select js -->
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="/assets/css/style.css">

    {{-- Scripts --}}
    <!-- scripts -->
    <!-- jquery js -->
    <script src="/assets/js/vendor/jquery.min.js"></script>
    <!-- bootstrap 5.0.2 -->
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <!-- jquery ui js -->
    <script src="/assets/js/vendor/jquery-ui.js"></script>
    <!-- wow js -->
    <script src="/assets/js/vendor/waw.js"></script>
    <!-- mobile menu -->
    <script src="/assets/js/vendor/metismenu.js"></script>
    <!-- magnific popup -->
    <script src="/assets/js/vendor/magnifying-popup.js"></script>
    <!-- swiper JS 10.2.0 -->
    <script src="/assets/js/plugins/swiper.js"></script>
    <!-- counterup -->
    <script src="/assets/js/plugins/counterup.js"></script>
    <script src="/assets/js/vendor/waypoint.js"></script>
    <!-- isotop mesonary -->
    <script src="/assets/js/plugins/isotop.js"></script>
    <script src="/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/plugins/sticky-sidebar.js"></script>
    <script src="/assets/js/plugins/resize-sensor.js"></script>
    <script src="/assets/js/plugins/twinmax.js"></script>
    <!-- dymanic Contact Form -->
    <script src="/assets/js/plugins/contact.form.js"></script>
    <script src="/assets/js/plugins/nice-select.min.js"></script>
    <!-- main Js -->
    <script src="/assets/js/main.js"></script>

    @routes
    @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased">
    @inertia
</body>
</html>
