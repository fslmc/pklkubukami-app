<!-- homepage.blade.php -->

@extends('layouts.homepage')

@section('title', 'Welcome to Our Website')

@section('body')
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Welcome to Our Website</h1>
                    <p>This is a sample homepage.</p>
                </div>
            </div>
        </div>
        {{-- <canvas id="hero-3d-model" style="width: 100%; height: 500px;"></canvas> --}}
    </div>

    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h2>Get Started Today!</h2>
        <p>This is a sample jumbotron.</p>
        <button class="btn btn-primary">Learn More</button>
    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Feature 1</h5>
                    <p class="card-text">This is a sample feature.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Feature 2</h5>
                    <p class="card-text">This is another sample feature.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Feature 3</h5>
                    <p class="card-text">This is yet another sample feature.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>

    </script>
@endpush