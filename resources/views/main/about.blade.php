{{-- Halaman Utama Blogs --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/about-style.css') }}">
    <style>
        @media (max-width: 576px) {
    .row {
        flex-direction: column;
    }
}
    </style>
@endsection

@section('title', 'Tentang Kami')

@section('body')
<body>
    <div class="container py-5">
        <header class="about-header text-center py-5 bg-light">
            <h1 class="display-4">Tentang Kami</h1>
            <p class="lead">Platform PKL Kubukami</p>
        </header>
        <div class="row align-items-center">
            <!-- Bagian Gambar -->
            <div class="col-md-6 col-sm-12 image-container order-lg-1 order-md-2 order-sm-1 mb-4 mb-md-0">
                <img src="{{ asset('assets/pages/kubukami-polos.png') }}" alt="Company Logo" class="img-fluid rounded">
            </div>
            <!-- Bagian Konten -->
            <div class="col-md-6 col-sm-12 content-container order-lg-2 order-md-1 order-sm-2">
                <h2 class="mb-4">Tentang PKL Kubukami</h2>
                <p>PKL Kubukami adalah platform digital yang dirancang khusus untuk siswa-siswi Sekolah Menengah Kejuruan (SMK) yang sedang menjalani program Praktik Kerja Lapangan (PKL). Platform ini dikelola oleh <strong>PT. Kembangin Teknologi Kita</strong> dan <strong>PT. Mitra Travelindo Kuantum</strong>, yang berkomitmen untuk memberikan pengalaman magang yang terstruktur, efektif, dan terorganisir dengan baik.</p>
                <h3 class="mt-4">Layanan Utama</h3>
                <ul class="list-unstyled">
                    <li>✔️ Manajemen tugas bagi siswa PKL.</li>
                    <li>✔️ Basis data informasi program PKL yang terorganisir.</li>
                    <li>✔️ Evaluasi dan pelaporan kinerja siswa.</li>
                </ul>
                <h3 class="mt-4">Visi & Misi</h3>
                <p><strong>Visi:</strong> Menjadi platform unggulan yang mendukung program magang siswa SMK dengan pendekatan digital yang inovatif dan terintegrasi.</p>
                <p><strong>Misi:</strong></p>
                <ul>
                    <li>Membantu siswa mendapatkan pengalaman magang yang terorganisir dan bermakna.</li>
                    <li>Menyediakan solusi manajemen tugas dan evaluasi yang efektif bagi perusahaan dan sekolah.</li>
                    <li>Mendorong keterlibatan siswa secara proaktif melalui sistem yang transparan dan mudah digunakan.</li>
                </ul>
            </div>
        </div>
    </div>
</body>
@endsection
