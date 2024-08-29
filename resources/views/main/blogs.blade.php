{{-- Halaman Utama Blogs --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Blogs')

@section('body')
    <h1 class="title">Blogs</h1>
    <div class="blogs">
        @foreach ($blogs as $blog)

            <div class="card">
                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->judul }}">
                <div class="card-content">
                    <h2>{{ $blog->judul }}</h2>
                    <p>{{ Str::limit($blog->konten, 50) }}</p>
                    <a href="#" class="btn">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        @endforeach
    </div>
@endsection
