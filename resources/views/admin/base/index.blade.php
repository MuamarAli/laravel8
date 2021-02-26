<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/szychwpzvg4l1zjh0f86q1fj6ebb4qk6f8mw4nrfgs913cxx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('admin.base.navbar')

        <main class="container py-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>


    <script>
        @yield('javascript')

        $('#tagSelect').select2({
            placeholder: 'Please select tag',
            allowClear: true
        });

        tinymce.init({
            selector: 'textarea.wysiwyg',
            height: '360',
            menubar:false,
            statusbar: false,
            plugins: "code paste",
            toolbar: 'formatselect bold italic underline strikethrough | code undo redo',
            resize: false,
            branding: false,
            relative_urls : false,
            browser_spellcheck: true,
        });
    </script>
</body>
</html>
