{{-- Halaman Utama Projek --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs-style.css') }}">
@endsection

@section('title', 'Halaman Projek')

@section('body')
    <section class="projek-section my-5">
        <header class="about-header text-center py-5">
            <h1 class="display-4 title">Projek Kami</h1>
            <p class="lead">PKL Kubukami - List Projek</p>
        </header>
        <div class="container">
            {{-- Formulir Pencarian --}}
            <form action="{{ route('projek.search') }}" method="GET" class="mb-4">
                <div class="input-group input-group-lg">
                    <input type="text" name="query" class="form-control form-control-lg" placeholder="Search projek..." aria-label="Search" value="{{ request()->query('query') }}">
                    <button class="btn btn-primary btn-lg" type="submit">Cari</button>
                </div>
            </form>

            <div class="cards mt-5">
                @foreach ($projeks as $projek)
                    <div class="card">
                        <a href="{{ route('main.projek', ( $projek->slug )) }}">
                            <img src="{{ asset($projek->thumbnail) }}" alt="{{ $projek->nama_projek }}">
                            <div class="card-content">
                                <h2>{{ $projek->judul }}</h2>
                                <p class="text-xs">{!! (Str::limit($projek->konten, 50)) !!}</p>
                                <a href="{{ route('main.projek', ( $projek->slug )) }}" class="btn">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="pagination mt-5">
                {{ $projeks->render('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection