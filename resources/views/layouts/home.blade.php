<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    @yield('css')
    <title>@yield('title')</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.5s ease-in-out;
            overflow-x: hidden;
        }

        main {
                flex: 1;
        }

        .nav-underline .nav-link.active {
            position: relative;
        }

        .nav-underline .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #fff;
        }

        .row {
            padding: 0; !important
        }

        .navbar-light {
            background-image: linear-gradient(180deg, #C5C5C554 38%, #FFFFFF00 100%);
        }

        .navbar-dark {
            background-image: linear-gradient(180deg, #3737374f 38%, #ffffff00 100%);
        }

        .navbar {
            transition: background-image 0.5s ease-in-out;
        }
    </style>

</head>
<body>
    <nav class="navbar pb-3 fixed-top navbar-light">
        <div class="container-fluid justify-content-center mt-2">
            <div class="nav nav-underline gap-3">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }} nav-link text-decoration-none text-white">home</a>
                <a href="{{ route('main.about') }}" class="{{ $active == 'about' ? 'active' : '' }} nav-link text-decoration-none text-white">about</a>
                <a href="{{ route('main.blogs') }}" class="{{ $active == 'blogs' ? 'active' : '' }} nav-link text-decoration-none text-white">blog</a>
                <a class="nav-link text-decoration-none text-white">contact</a>
                <a href="{{ route('main.galleries') }}" class="{{ request()->is('galleries') ? 'active' : '' }} nav-link text-decoration-none text-white">gallery</a>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row px-0">
            <div class="col-12 col-sm-10 col-md-12 col-lg-10 mx-auto px-0">
                @yield('body')
            </div>
        </div>
    </main>

    <footer class="bg-light py-3">
        <div class="container">
            <p class="text-center mb-0">Copyright 2023. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
