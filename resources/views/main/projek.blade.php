@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Projek')

@section('body')
    <section class="projeks-section my-5">
        <div class="container">
            <header class="about-header text-center py-5">
                <h1 class="display-4 title">Projek Kami</h1>
                <p class="lead">PKL Kubukami - Projek</p>
            </header>
            <div class="content mt-9">
                <h5 class="text-center">{{ $projek->judul }}</h5>
                <img class="thumbnail" src="{{ asset($projek->thumbnail) }}" alt="{{ $projek->nama_projek }}">
                <p class="text-muted text-center">Tanggal: {{ \Carbon\Carbon::parse($projek->created_at)->format('d M Y') }}</p>
                <p>{!! $projek->konten !!}</p>
                <a href="{{ route('main.projeks') }}" class="btn"><i class="fas fa-arrow-left"> Back to Projeks</i></a>
            </div>
        </div>
    </section>
@endsection