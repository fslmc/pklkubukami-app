<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/dist/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrapCustom.css') }}">
    <link rel="application/json" href="{{ asset('assets/dist/bootstrap.min.css.map') }}">
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
            <div class="nav nav-underline gap-5">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }} nav-link text-decoration-none text-white">home</a>
                <a href="{{ route('main.about') }}" class="{{ $active == 'about' ? 'active' : '' }} nav-link text-decoration-none text-white">about</a>
                <a href="{{ route('main.kontak') }}" class="{{ $active == 'kontak' ? 'active' : '' }} nav-link text-decoration-none text-white">contact</a>
                <div class="nav-item dropdown">
                    <a class="nav-link text-decoration-none text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/pages/nav-hamburg.png') }}" alt="Other" width="20" height="20">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                        <li><a class="dropdown-item" href="{{ route('main.blogs') }}">blog</a></li>
                        <li><a class="dropdown-item" href="{{ route('main.galleries') }}">gallery</a></li>
                        @if(Auth::check())
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">profile</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row px-0">
            <div class="col-12 col-sm-10 col-md-12 col-lg-10 col-xl-10 col-xxl-10 mx-auto px-0">
                @yield('body')
            </div>
        </div>
    </main>

<!-- Footer Section -->
<footer class="footer-section text-center pt-4 border border-black" style="background-color: #111213;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Logo -->
            <div class="col-12 mb-3">
                <img src="{{ asset('assets/pages/kubukami-polos.png') }}" alt="Company Logo" class="img-fluid" style="width: 80px;">
            </div>
            <!-- Social Icons -->
            <div class="col-12 mb-3">
                <a href="#" class="mx-2">
                    <i class="fab fa-instagram fa-2x text-light"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-tiktok fa-2x text-light"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook fa-2x text-light"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-linkedin fa-2x text-light"></i>
                </a>
            </div>
            <!-- Footer Text -->
            <div class="col-12" style="background-color: #212529">
                <p class="text-light py-1 my-2">PT. Kembangin Teknologi Kita &copy; 2024. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/dist/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/bootstrap.min.js.map') }}"></script>

    @stack('scripts')
</body>
</html>
