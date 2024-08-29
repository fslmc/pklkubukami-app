{{-- Halaman Utama Blogs --}}
@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/about-style.css') }}">
@endsection

@section('title', 'Halaman About')

@section('body')
<body>
    <header class="about-header">
        <h1>About Us</h1>
        <p>KUBUKAMI</p>
    </header>

    <div class="konten">
        <div class="image-container">
            <img src="{{ asset('assets/pages/kubukami-polos.png') }}" alt="Training Image">
        </div>
        <div class="content-container">
            <p>What is Lorem Ipsum?
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</body>
@endsection
