<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App || Admin</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

    <link href="{{ asset('css/admin/adminlte.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/OverlayScrollbars.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet" />
    
    <!-- Script -->
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('js/admin/adminlte.js') }}"></script>
    <script src="{{ asset('js/admin/select2.min.js') }}"></script>
</head>
<body>
    <div id="app">
        @if(Auth::user())
            @include('Layouts.admin-side-menu') 
        <div class="content-wrapper">
        @endif
            <main>
                @yield('content')
            </main>
        @if(Auth::user())
            </div>
        @endif
    </div>
</body>
</html>
