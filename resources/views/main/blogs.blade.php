{{-- Halaman Utama Blogs --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Blogs')

@section('body')
    <section class="blogs-section my-5">
        <header class="about-header text-center py-5">
            <h1 class="display-4 title">Tentang Kami</h1>
            <p class="lead">PKL Kubukami - List Blog</p>
        </header>
        <div class="container">
                    {{-- Formulir Pencarian --}}
        <form action="{{ route('blog.search') }}" method="GET" class="mb-4">
            <div class="input-group input-group-lg">
                <input type="text" name="query" class="form-control form-control-lg" placeholder="Search blogs..." aria-label="Search" value="{{ request()->query('query') }}">
                <button class="btn btn-primary btn-lg" type="submit">Cari</button>
            </div>
        </form>

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
            <div class="pagination mt-5">
                {{ $blogs->render('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
