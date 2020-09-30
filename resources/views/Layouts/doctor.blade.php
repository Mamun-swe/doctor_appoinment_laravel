<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iDoctor || Doctor Profile</title>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/website/notifIt.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/doctor/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/notifIt.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
    <div id="doctor-app">

        <!-- NavBar top -->
        <div class="navBar-top p-2 shadow-sm d-lg-none">
            <div class="d-flex">
                <div class="ml-auto">
                    <!-- Toggle Button -->
                    <button type="button" class="btn btn-light rounded-circle shadow-none d-lg-none" id="openMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button type="button" class="btn btn-light rounded-circle shadow-none d-lg-none" id="closeMenu">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <!-- Side menu -->
            <div class="side-menu" id="sideMenu">
                <div class="content shadow-sm">
                    <a href="{{route('home')}}" type="button" class="btn btn-block shadow-none">home</a>
                    <a href="" type="button" class="btn btn-block shadow-none active">dashboard</a>
                    <a href="" type="button" class="btn btn-block shadow-none">Appoinment Requests (10)</a>
                    <a href="" type="button" class="btn btn-block shadow-none">Messages (10)</a>
                    <a href="" type="button" class="btn btn-block shadow-none">Profile</a>
                    <a type="button" class="btn btn-block shadow-none" href="{{ route('auth.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- Main menu -->
            <main class="main">
                @yield('content')
            </main>
        </div>


    </div>
    <script>
        $(document).ready(function() {
            $('#sideMenu').css("left", "-100%")
            $('#closeMenu').css("display", "none")

            $('#openMenu').click(function() {
                $('#sideMenu').css("left", "0")
                $('#openMenu').css("display", "none")
                $('#closeMenu').css("display", "block")
            })

            $('#closeMenu').click(function() {
                $('#sideMenu').css("left", "-100%")
                $('#closeMenu').css("display", "none")
                $('#openMenu').css("display", "block")
            })
        })
    </script>
</body>

</html>
