@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('testimoni.update', ['id' => encrypt($testimoni->id)]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-12">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $testimoni->judul) }}" placeholder="judul">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="content" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ old('content', $testimoni->content) }}" placeholder="content">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="image_url" class="form-label">Image</label><br>
                            @if ( $testimoni->image_url )
                                <img src="{{ asset($testimoni->image_url) }}" alt="{{ $testimoni->judul }}" class="img-fluid w-25">
                            @else
                                <p class="my-3 fw-bold">Belum Ada Foto</p>
                            @endif
                        </div>
                        <div class="mb-3 col-12">
                            <input type="file" class="form-control" id="image_url" name="image_url" accept=".jpg, .jpeg, .png">
                            <p class="small mb-0 text-muted">Upload file dengan format JPG, JPEG, atau PNG. Maksimal Ukuran File 2MB.</p>
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('testimoni.index') }}" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
