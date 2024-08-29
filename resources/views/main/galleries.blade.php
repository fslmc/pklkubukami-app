{{-- Halaman Utama Blogs --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/galleries-style.css') }}">
@endsection

@section('title', 'Halaman Gallery')

@section('body')
    <h1 class="title">Gallery</h1>
    <div class="gallery">
        @foreach ($galleries as $gallery)
            <div class="gallery-item">
                <img src="{{ asset($gallery->foto) }}" alt="{{ $gallery->judul }}">
                <div class="gallery-info">
                    <h3>{{ $gallery->judul }}</h3>
                </div>
            </div>
        @endforeach
    </div>
@endsection
