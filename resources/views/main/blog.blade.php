@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Blogs')

@section('body')
    <section class="blogs-section my-5">
        <div class="container">
            <header class="about-header text-center py-5">
                <h1 class="display-4 title">Blog Kami</h1>
                <p class="lead">PKL Kubukami - Blog</p>
            </header>
            <div class="content mt-9">
                <h5 class="text-center">{{ $blog->judul }}</h5>
                <img class="thumbnail" src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->judul }}">
                <p class="text-muted text-center">Tanggal: {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</p>
                <p>{!! $blog->konten !!}</p>
                <a href="{{ route('main.blogs') }}" class="btn"><i class="fas fa-arrow-left"> Back to Blogs</i></a>
            </div>
        </div>
    </section>
@endsection
