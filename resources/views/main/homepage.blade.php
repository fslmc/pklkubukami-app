<!-- homepage.blade.php -->

@extends('layouts.homepage')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}">
@endsection

@section('title', 'Welcome to Our Website')

@section('body')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('assets/pages/kubukami-logo.png') }}" alt="Company Logo" class="img-fluid">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <button class="btn btn-scroll-down">
                        <i class="fas fa-arrow-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-section my-5">
        <div class="container">
            <div class="row">
                <!-- Text Column -->
                <div class="col-lg-7 col-md-7 col-8 text-center text-md-start">
                    <h2 class="about-heading">TENTANG <br><span class="highlight">KAMI.</span></h2>
                    <p class="about-text">
                        What is Lorem Ipsum?
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                    <button class="btn btn-outline-primary mt-3">Baca Selengkapnya</button>
                </div>
                <!-- Image Column -->
                <div class="col-lg-5 col-md-5 col-4 text-center">
                    <img src="{{ asset('assets/pages/kubukami-logo.png') }}" alt="About Image" class="img-fluid about-img">
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const heroSection = document.querySelector('.hero-section');
        const heroSectionHeight = heroSection.offsetHeight;
        let isAnimating = false;
        let previousScrollTop = 0;

        window.addEventListener('scroll', () => {
            const currentScrollTop = document.body.getBoundingClientRect().top;
            const scrollDirection = currentScrollTop < previousScrollTop ? 'down' : 'up'

            if (scrollDirection === 'down' && window.scrollY < heroSectionHeight) {
                if (!isAnimating) {
                    isAnimating = true;
                    window.scrollTo({
                        top: heroSectionHeight,
                        behavior: 'smooth'
                    });
                    setTimeout(() => {
                        isAnimating = false;
                    }, 500); // adjust the timeout value to match the animation duration
                }
            } else if (scrollDirection === 'up' && window.scrollY > 0) {
                if (!isAnimating) {
                    isAnimating = true;
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    setTimeout(() => {
                        isAnimating = false;
                    }, 500); // adjust the timeout value to match the animation duration
                }
            }

            previousScrollTop = currentScrollTop;
        });

        const scrollDownButton = document.querySelector('.btn-scroll-down');
        scrollDownButton.addEventListener('click', () => {
            const jumbotronSection = document.querySelector('.about-section');
            jumbotronSection.scrollIntoView({ behavior: 'smooth' });
        });

        // Get the about section and body elements
        const aboutSection = document.querySelector('.about-section');
        const body = document.body;
        const navbar = document.querySelector('.navbar');

        // Add an event listener to the scroll event
        window.addEventListener('scroll', () => {
        // Check if the user has scrolled to the about section
        if (window.scrollY >= aboutSection.offsetTop - window.innerHeight / 2) {
            // Add the bg-white class to the body
            body.classList.add('bg-white');
            // Add the navbar-dark class to the navbar
            navbar.classList.add('navbar-dark');
        } else {
            // Remove the bg-white class from the body
            body.classList.remove('bg-white');
            // Remove the navbar-dark class from the navbar
            navbar.classList.remove('navbar-dark');
        }
        });
    </script>
@endpush

