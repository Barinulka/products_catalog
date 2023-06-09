<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') Home page @show</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="{{ asset('assets/jquery.form.js') }}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script type="text/javascript">
        const _URL = '{{ route('home') }}';
        const _CATALOG_URL = '{{ route('catalog.index') }}';
    </script>
</head>
    <body>
        <div id="app">
            <x-navbar></x-navbar>

            <main class="album py-5 bg-light">
                <div class="container">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
