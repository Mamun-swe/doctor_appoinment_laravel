<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>iDoctor</title>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/website/notifIt.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/notifIt.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
    <div id="app">

        <!-- Navbar -->
        <div class="custom-nav p-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex">
                            <div>
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('website/images/static/Logo.png') }}" class="img-fluid">
                                </a>
                            </div>

                            <div class="ml-auto">
                                <div class="nav-items" id="sideMenu">
                                    <ul>
                                        <li><a href="{{ url('/') }}">home</a></li>
                                        <li><a href="{{ url('/about-us') }}">about us</a></li>
                                        <li><a href="{{ url('/contact-us') }}">contact</a></li>

                                        @if (Auth::User() && Auth::User()->user_type == 'patient')
                                            <li><a href="{{ route('user.profile') }}">profile</a></li>
                                        @elseif(Auth::User() && Auth::User()->user_type == 'doctor')
                                            <li><a href="{{ route('doctor.dashboard') }}">profile</a></li>
                                        @elseif(Auth::User() && Auth::User()->user_type == 'admin')
                                            <li><a href="{{ route('admin.dashboard') }}">dashboard</a></li>
                                        @else
                                            <li><a href="{{ url('/login') }}">login</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- Toggle Button -->
                                <button type="button" class="btn btn-light rounded-circle shadow-none d-lg-none"
                                    id="openMenu">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <button type="button" class="btn btn-light rounded-circle shadow-none d-lg-none"
                                    id="closeMenu">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="main" style="margin-top: 73px;">
            @yield('content')
        </main>

        <!-- Footer -->
        <div class="footer py-4 py-lg-5">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-lg-4 text-center text-lg-left pr-lg-5 mb-4 mb-lg-0">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('website/images/static/Logo.png') }}" class="img-fluid">
                        </a>
                        <p class="mb-0 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam quia sint
                            autem a earum placeat. Ipsum id necessitatibus numquam natus?</p>
                    </div>

                    <div class="col-12 col-lg-3 text-center text-lg-left pr-lg-5 mb-4 mb-lg-0">
                        <h5><b>Links</b></h5>
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/about-us') }}">About Us</a>
                        <a href="{{ url('/contact-us') }}">Contact</a>
                        @if (Auth::User() && Auth::User()->user_type == 'patient')
                            <a href="{{ route('user.profile') }}">My Account</a>
                        @elseif(Auth::User() && Auth::User()->user_type == 'doctor')
                            <a href="{{ route('doctor.dashboard') }}">Profile</a>
                        @elseif(Auth::User() && Auth::User()->user_type == 'admin')
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ url('/login') }}">Login Account</a>
                        @endif
                    </div>

                    <div class="col-12 col-lg-5 text-center text-lg-left pr-lg-5 mb-4 mb-lg-0">
                        <h5><b>Find Us</b></h5>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14594.204403701864!2d90.31175934999999!3d23.870069049999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c224dd9d88f5%3A0x9a9e728879b7600d!2sAshulia%20Model%20Town%20Park!5e0!3m2!1sen!2sbd!4v1601070183695!5m2!1sen!2sbd"
                            width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>

                </div>
            </div>
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
