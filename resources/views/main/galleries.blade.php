{{-- Halaman Utama Gallery --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/galleries-style.css') }}">
@endsection

@section('title', 'Halaman Gallery')

@section('body')
    <header class="text-center mb-5">
        <h1 class="display-4 title">Gallery</h1>
        <p class="lead text-muted">Gunakan formulir pencarian di bawah untuk menemukan galeri tertentu.</p>
    </header>

    <div class="container">
        {{-- Formulir Pencarian --}}
        <form action="{{ route('gallery.search') }}" method="GET" class="mb-4">
            <div class="input-group input-group-lg">
                <input type="text" name="query" class="form-control form-control-lg" placeholder="Search galleries..." aria-label="Search" value="{{ request()->query('query') }}">
                <button class="btn btn-primary btn-lg" type="submit">Cari</button>
            </div>
        </form>

        <div class="row">
            @forelse ($galleries as $gallery)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('main.gallery', ( $gallery->slug )) }}">
                        <div class="card border-0 shadow-sm rounded">
                            <img src="{{ asset($gallery->foto) }}" class="card-img-top rounded-top" alt="{{ $gallery->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->judul }}</h5>
                                <p class="card-text text-muted">Diunggah oleh: {{ $gallery->upload_by }}</p>
                                <p class="card-text text-muted">Tanggal: {{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</p>
                            </div>
                            <a href="{{ route('main.gallery', ( $gallery->slug )) }}" class="btn btn-primary">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center text-muted">Tidak ada galeri ditemukan.</p>
            @endforelse
        </div>
    </div>
@endsection
