@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('testimoni.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3 col-12">
                            <label for="judul" class="form-label">Judul<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="content" class="form-label">Content<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="content" name="content" placeholder="Content">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="image_url" class="form-label">Image<span class="text-danger">*</span></label>
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
