{{-- Hero Section Edit --}}

@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <h1>Ubah Image untuk Hero Section</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('hero.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-12">
                            <label for="background_image" class="form-label">Background Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="background_image" name="background_image" accept=".jpg, .jpeg, .png" max-size="2048">
                            <p class="small mb-0 text muted">Upload file dengan format JPG, JPEG, atau PNG. Maksimal Ukuran File 2MB.</p>
                            @if($heroSetting->background_image)
                                <p>Background Image Saat Ini</p>
                                <img src="{{ asset($heroSetting->background_image) }}" alt="Current Background Image" width="100" height="100">
                            @endif
                        </div>
                        <div class="mb-3 col-12">
                            <label for="logo" class="form-label">Logo<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="logo" name="logo" accept=".jpg, .jpeg, .png" max-size="2048">
                            <p class="small mb-0 text muted">Upload file dengan format JPG, JPEG, atau PNG. Maksimal Ukuran File 2MB.</p>
                            @if($heroSetting->logo)
                                <p>Logo Saat Ini</p>
                                <img src="{{ asset($heroSetting->logo) }}" alt="Current Logo" width="100" height="100">
                            @endif
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection