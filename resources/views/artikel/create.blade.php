@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('artikel.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3 col-12">
                            <label for="judul" class="form-label">Judul<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="penulis" class="form-label">Penulis<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="penulis">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="konten" class="form-label">Konten<span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="konten" name="konten" placeholder="konten"></textarea>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="thumbnail" class="form-label">Thumbnail<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept=".jpg, .jpeg, .png" max-size="2048">
                            <p class="small mb-0 text muted">Upload file dengan format JPG, JPEG, atau PNG. Maksimal Ukuran File 2MB.</p>
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
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
