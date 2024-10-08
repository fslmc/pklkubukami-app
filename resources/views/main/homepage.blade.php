<!-- homepage.blade.php -->

@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owlCarousel.css') }}">
@endsection

@section('title', 'PKL Kubukami')

@section('body')
    <!-- Hero Section -->
    <section class="hero-section" id="hero" data-scroll="hero" style="--hero-background-image: url('{{ asset($heroSetting->background_image) }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset($heroSetting->logo) }}" alt="Company Logo" class="img-fluid">
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
    <section class="about-section  light-bg" id="about" data-scroll="about">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center light-section">
                    <h2><span class="section-heading">TENTANG</span> <br><span class="section-highlight">KAMI.</span></h2>
                </div>
            </div>
            <div class="row align-items-start justify-content-center">
                <!-- Text Column -->
                <div class="col-lg-5 col-md-8 col-sm-7 col-8">
                    <div class="bg-secondary rounded p-4">
                        <p class="about-text">
                            PKL Kubukami adalah platform digital yang dirancang khusus untuk siswa-siswi Sekolah Menengah Kejuruan (SMK) yang sedang menjalani program Praktik Kerja Lapangan (PKL). Platform ini dikelola oleh PT. Kembangin Teknologi Kita dan PT. Mitra Travelindo Kuantum, yang berkomitmen untuk memberikan pengalaman magang yang terstruktur, efektif, dan terorganisir dengan baik.
                        </p>
                        <a href="{{ route('main.about') }}" class="{{ request()->is('about') ? 'active' : '' }}"><button class="btn btn-outline-primary mt-3">Baca Selengkapnya</button></a>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="col-lg-6 col-md-5 col-sm-5 col-4 img-column">
                    <div class="row align-middle justify-content-center">
                        <div class="col-12 mb-3">
                            <div class="image-wrapper1 text-center">
                                <img src="{{ asset('assets/pages/kubukami-polos.png') }}" alt="About Image" class="img-fluid about-img1">
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="image-wrapper2 text-center">
                                <img src="{{ asset('assets/pages/man-fist.png') }}" alt="About Image" class="img-fluid about-img2">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Program Kami Section -->
<section class="produk-kami-section py-5 dark-bg" id="program" data-scroll="program">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center dark-section">
                <h2><span class="section-heading">PROGRAM</span> <br><span class="section-highlight">KAMI.</span></h2>
            </div>
        </div>
        <div class="row justify-content-center grid gap-3">
            <!-- Program Item 1 -->
            <div class="col-lg-8 col-md-12 col-sm-12 d-flex align-items-stretch">
                <div class="produk-kami-item card border border-white text-center p-4 shadow bg-transparent">
                    <img src="{{ asset('assets/pages/project-management.png') }}" alt="Manajemen Proyek" class="img-fluid mb-3">
                    <h3 class="produk-kami-item-title">Manajemen Tugas dan Laporan</h3>
                    <p class="produk-kami-item-text">
                        Program ini mencakup pelatihan manajemen tugas dan laporan harian, mingguan, serta bulanan. Siswa belajar cara mengelola waktu dan menyusun laporan kegiatan yang akan dievaluasi oleh mentor dari perusahaan.
                    </p>
                </div>
            </div>
            <!-- Program Item 2 -->
            <div class="col-lg-8 col-md-12 col-sm-12 d-flex align-items-stretch">
                <div class="produk-kami-item card border border-white text-center p-4 shadow bg-transparent">
                    <img src="{{ asset('assets/pages/data-management.png') }}" alt="Manajemen Data" class="img-fluid mb-3">
                    <h3 class="produk-kami-item-title">Kerja Tim dan Diskusi Kelompok</h3>
                    <p class="produk-kami-item-text">
                        Siswa akan mengikuti diskusi kelompok dan kolaborasi proyek yang bertujuan untuk mengembangkan kemampuan bekerja dalam tim, serta mengasah keterampilan interpersonal dalam lingkungan kerja profesional.
                    </p>
                </div>
            </div>
            <!-- Program Item 3 -->
            <div class="col-lg-8 col-md-12 col-sm-12 d-flex align-items-stretch">
                <div class="produk-kami-item card border border-white text-center p-4 shadow bg-transparent">
                    <img src="{{ asset('assets/pages/software-development.png') }}" alt="Pengembangan Perangkat Lunak" class="img-fluid mb-3">
                    <h3 class="produk-kami-item-title">Evaluasi dan Feedback Berkala</h3>
                    <p class="produk-kami-item-text">
                        Setiap siswa akan mendapat evaluasi berkala dari mentor mereka. Program ini mencakup feedback yang terstruktur untuk membantu siswa memperbaiki kemampuan dan kinerja selama program magang berlangsung.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Testimoni Kami Section -->
    <section class="testimoni-kami-section  py-5 light-bg" id="testimoni" data-scroll="testimoni">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center light-section">
                    <h2><span class="section-heading">TESTIMONI</span> <br><span class="section-highlight">KAMI.</span></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 w-100 w-lg-auto">
                    <!-- Owl Carousel -->
                    <div class="owl-carousel owl-theme">
                        @foreach($testimonies as $testimony)
                        <!-- Slide {{ $loop->iteration }} -->
                        <div class="item" style="">
                            <div class="testimoni-card card d-flex align-items-center justify-content-center text-center p-4 col-md-12 col-sm-12 col-12" style="min-height: 400px;  background-size: cover; background-position: center;">
                                <h5 class="testimoni-user-name position-absolute top-0 start-0 p-2">{{ $testimony->judul }}</h5>
                                <img src="{{ asset('assets/pages/kubukami-polos.png') }}" alt="Web Logo" class="img-fluid position-absolute top-0 end-0 p-2" style="width: 50px; height: 50px;">
                                <p class="testimoni-text">
                                    {{ Str::limit($testimony->content, 200) }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Artikel Kami Section -->
    <section class="artikel-kami-section py-5 dark-bg" id="artikel" data-scroll="artikel">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center dark-section">
                    <h2><span class="section-heading">ARTIKEL</span> <br><span class="section-highlight">KAMI.</span></h2>
                </div>
            </div>
            <div class="row gy-2 justify-content-center">
                <!-- Blog Post 1 -->
                @foreach ($randBlogs as $b)
                <div class="col-lg-4 col-md-7 blog-card rounded-none" style="min-height: 200px">
                    <div class="card shadow-sm h-100 rounded-0" style="background-image: url('{{ asset($b->thumbnail) }}'); background-size: cover; background-position: center; width: 250px; height: 200px;">
                        <div class="card-body h-100 p-0 align-items-end" style="position: absolute; bottom: 0; left: 0; width: 100%; background-color: rgba(255, 255, 255, 0.8);">
                            <h5 class="card-title ">{{ Str::limit($b->judul, 30) }}</h5>
                            <div class="row align-items-end">
                                <div class="col-7">
                                    <p class="card-text" style="font-size: 13px;">{{ strip_tags(Str::limit($b->konten, 80)) }}</p>
                                </div>
                                <div class="col-5 text-end">
                                    <a href="{{ route('main.blog', ( $b->slug )) }}" class="btn btn-sm btn-outline-dark">Baca &gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    
@endsection

@push('scripts')
<script src="{{ asset('assets/js/particles.min.js') }}"></script>
<script src="{{ asset('assets/js/particle.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sections = document.querySelectorAll('section[data-scroll]');
        const body = document.body;
        const nav = document.querySelector('.navbar');

        function darkSection(){
            body.className = 'bg-black';
            nav.classList.add('navbar-light');
            nav.classList.remove('navbar-dark');
        };

        function lightSection(){
            body.className = 'bg-white';
            nav.classList.add('navbar-dark');
            nav.classList.remove('navbar-light');
        };

        const observerCallback = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const sectionId = entry.target.id;

                    if (sectionId === 'hero') {
                        darkSection();
                    } else if (sectionId === 'about') {
                        lightSection();
                    } else if (sectionId === 'program') {
                        darkSection();
                    } else if (sectionId === 'testimoni'){
                        lightSection();
                    } else if (sectionId === 'artikel'){
                        darkSection();
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
<script>
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true, 
        margin: -150, 
        nav: true,
        autoplay: true,  
        autoplayTimeout: 5000,      
        smartSpeed: 1000,     
        animateOut: 'fadeOut',   
        animateIn: 'fadeIn', 
        autoHeight: false,
        center: true,
        dots: false,
        navText: [
            '<i class="fas fa-arrow-left"></i>', 
            '<i class="fas fa-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 3  
            },
            600: {
                items: 3 
            },
            1000: {
                items: 3 
            }
        }
    });
});

</script>
@endpush


