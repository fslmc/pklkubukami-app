{{-- Halaman Utama Blogs --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Blogs')

@section('body')
    <section class="blogs-section my-5">
        <div class="container">
            <h1 class="text-center">Our Blogs</h1>
            <div class="cards mt-5">
                @foreach ($blogs as $blog)
                    <div class="card">
                        <a href="{{ route('main.blog', ( $blog->slug )) }}">
                            <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->judul }}">
                            <div class="card-content">
                                <h2>{{ $blog->judul }}</h2>
                                <p class="text-xs">{!! (Str::limit($blog->konten, 50)) !!}</p>
                                <a href="{{ route('main.blog', ( $blog->slug )) }}" class="btn">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
