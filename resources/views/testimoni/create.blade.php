@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <h1>Tulis Testimoni</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('testimoni.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3 col-12">
                            <label for="judul" class="form-label">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="content" class="form-label">Testimoni<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="content" name="content" placeholder="Content" rows="5"></textarea>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="image_url" class="form-label">Foto<span class="text-danger">*(optional)</span></label>
                            <input type="file" class="form-control" id="image_url" name="image_url" placeholder="Image">
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