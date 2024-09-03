@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Blogs')

@section('body')
    <section class="blogs-section my-5">
        <div class="container">
            <h1 class="text-center header">Our Blogs</h1>
            <div class="content mt-9">
                <h5 class="text-center">{{ $blog->judul }}</h5>
                <img class="thumbnail" src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->judul }}">
                <p>{!! $blog->konten !!}</p>
                <a href="{{ route('main.blogs') }}" class="btn"><i class="fas fa-arrow-left"> Back to Blogs</i></a>
            </div>
        </div>
    </section>
@endsection
