<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .header-bg {
            background-image: url('https://source.unsplash.com/1920x1024/');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .header-bg-2 {
            background-image: url('https://source.unsplash.com/1920x1024/?teams');
        }
        .header-bg-3 {
            background-image: url('https://source.unsplash.com/1920x1024/?nature');
        }
        .header-bg-4 {
            background-image: url('https://source.unsplash.com/1920x1024/?mountains');
        }
    </style>
</head>
<body>
    <div id="app">
        @include('home.base.navbar')

        <main>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </main>

        @include('home.base.footer')
    </div>
</body>
</html>
