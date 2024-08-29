<!-- homepage.blade.php -->

@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}">
@endsection

@section('title', 'Welcome to Our Website')

@section('body')
    <!-- Hero Section -->
    <section class="hero-section" id="hero" data-scroll="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('assets/pages/kubukami-logo.png') }}" alt="Company Logo" class="img-fluid">
                </div>
            </div>
            <!-- Particle Container -->
            <div id="particles-js" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;"></div>
            <!-- Add this div to wrap the button -->
            <div class="hero-button-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-10 text-center">
                        <button class="btn btn-scroll-down" onclick="document.getElementById('about').scrollIntoView({ behavior: 'smooth' });">
                            <i class="fas fa-arrow-down"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section class="about-section my-5" id="about" data-scroll="about">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="about-heading">TENTANG <br><span class="highlight">KAMI.</span></h2>
                </div>
            </div>
            <div class="row align-items-center">
                <!-- Text Column -->
                <div class="col-lg-6 col-md-8 col-sm-8 col-8">
                    <div class="bg-secondary rounded p-4">
                        <p class="about-text">
                            What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <button class="btn btn-outline-primary mt-3">Baca Selengkapnya</button>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="col-lg-5 col-md-5 col-4 img-column">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="image-wrapper1">
                                <img src="{{ asset('assets/pages/kubukami-polos.png') }}" alt="About Image" class="img-fluid about-img1 h-100">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="image-wrapper2">
                                <img src="{{ asset('assets/pages/man-fist.png') }}" alt="About Image" class="img-fluid about-img2 h-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Kami Section -->
    <section class="produk-kami-section my-5" id="product" data-scroll="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="produk-kami-heading">PRODUK <br><span class="highlight">KAMI.</span></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Product Item 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="produk-kami-item card text-center p-4 shadow">
                        <img src="{{ asset('assets/pages/product-1.png') }}" alt="Product 1" class="img-fluid mb-3">
                        <h3 class="produk-kami-item-title">Personal Training</h3>
                        <p class="produk-kami-item-text">Our greatest weakness lies in giving up. The most certain way to succeed is to try just one more time.</p>
                    </div>
                </div>
                <!-- Product Item 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="produk-kami-item card text-center p-4 shadow">
                        <img src="{{ asset('assets/pages/product-2.png') }}" alt="Product 2" class="img-fluid mb-3">
                        <h3 class="produk-kami-item-title">Workshop</h3>
                        <p class="produk-kami-item-text">Our greatest weakness lies in giving up. The most certain way to succeed is to try just one more time.</p>
                    </div>
                </div>
                <!-- Product Item 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="produk-kami-item card text-center p-4 shadow">
                        <img src="{{ asset('assets/pages/product-3.png') }}" alt="Product 3" class="img-fluid mb-3">
                        <h3 class="produk-kami-item-title">Group Discussion</h3>
                        <p class="produk-kami-item-text">Our greatest weakness lies in giving up. The most certain way to succeed is to try just one more time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script src=" https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js "></script>
<script src="{{ asset('assets/js/particle.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sections = document.querySelectorAll('section[data-scroll]');
        const body = document.body;
        const nav = document.querySelector('.navbar');

        const observerCallback = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const sectionId = entry.target.id;

                    if (sectionId === 'hero') {
                        body.className = 'bg-black';
                        nav.classList.add('navbar-light');
                        nav.classList.remove('navbar-dark');
                    } else if (sectionId === 'about') {
                        body.className = 'bg-white';
                        nav.classList.add('navbar-dark');
                    nav.classList.remove('navbar-light');
                    } else if (sectionId === 'product') {
                        body.className = 'bg-black';
                        nav.classList.add('navbar-light');
                        nav.classList.remove('navbar-dark');
                    }
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, {
            threshold: 0.5
        });

        sections.forEach(section => observer.observe(section));
    });
</script>
@endpush


