@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('gallery.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3 col-12">
                            <label for="judul" class="form-label">Judul<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="upload_by" class="form-label">Upload By<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="upload_by" name="upload_by" placeholder="Upload By">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="deskripsi" class="form-label">Deskripsi<span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="foto" class="form-label">Foto<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png" max-size="2048">
                            <p class="small mb-0 text muted">Upload file dengan format JPG, JPEG, atau PNG. Maksimal Ukuran File 2MB.</p>
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
