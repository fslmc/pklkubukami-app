{{-- Search Results --}}
@extends('layouts.home')

@section('title', 'Search Results')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('body')
    <section class="search-results my-5">
        <header class="about-header text-center py-5">
            <h1 class="display-4 title">Search Results</h1>
            <p class="lead">You searched for "{{ $query }}"</p>
        </header>
        <div class="container">
            @if($blogs->count() > 0)
                <div class="cards mt-5">
                    @foreach ($blogs as $blog)
                        <div class="card">
                            <a href="{{ route('main.blog', $blog->slug) }}">
                                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->judul }}">
                                <div class="card-content">
                                    <h2>{{ $blog->judul }}</h2>
                                    <p class="text-xs">{!! (Str::limit($blog->konten, 50)) !!}</p>
                                    <a href="{{ route('main.blog', $blog->slug) }}" class="btn">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No results found for "{{ $query }}".</p>
            @endif
        </div>
    </section>
@endsection