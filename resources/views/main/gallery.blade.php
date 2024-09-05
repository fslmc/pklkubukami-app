@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/galleries-style.css') }}">
@endsection

@section('title', 'Halaman Gallery')

@section('body')
    <section class="gallery-section my-5">
        <div class="container">
            <h1 class="text-center header title">Galeri Kami</h1>
            <div class="row mt-4">
                <!-- Kolom untuk gambar -->
                <div class="col-md-6 d-flex align-items-center">
                    <img class="gallery-thumbnail img-fluid rounded" src="{{ asset($gallery->foto) }}" alt="{{ $gallery->judul }}">
                </div>
                <!-- Kolom untuk teks -->
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="content">
                        <h5 class="text-center">{{ $gallery->judul }}</h5>
                        <p class="text-muted text-center">Diunggah oleh: {{ $gallery->upload_by }}</p>
                        <p class="text-muted text-center">Tanggal: {{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</p>
                        <p class="text-center">{{ $gallery->deskripsi }}</p>
                        <a href="{{ route('main.galleries') }}" class="btn btn-primary mt-4 d-block mx-auto"><i class="fas fa-arrow-left"></i> Back to Galleries</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
