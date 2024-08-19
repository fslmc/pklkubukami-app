@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('artikel.update', ['id' => encrypt($artikel->id)]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-12">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" placeholder="judul">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $artikel->penulis) }}" placeholder="penulis">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea type="text" class="form-control" id="konten" name="konten" placeholder="konten">{{ old('konten', $artikel->konten) }}</textarea>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="thumbnail" class="form-label">Thumbnail</label><br>
                            @if ( $artikel->thumbnail )
                                <img src="{{ asset($artikel->thumbnail) }}" alt="{{ $artikel->judul }}" class="img-fluid w-25">
                            @else
                                <p class="my-3 fw-bold">Belum Ada Foto</p>
                            @endif
                        </div>
                        <div class="mb-3 col-12">
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept=".jpg, .jpeg, .png">
                            <p class="small mb-0 text-muted">Upload file dengan format JPG, JPEG, atau PNG. Maksimal Ukuran File 2MB.</p>
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('artikel.index') }}" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@include('sweetalert::alert')
@if (session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@endsection
