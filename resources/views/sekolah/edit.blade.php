@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('sekolah.update', ['id' => encrypt($sekolah->id)]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-12">
                            <label for="nama_sekolah" class="form-label">Nama Sekolah<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" value="{{ old('nama_sekolah', $sekolah->nama_sekolah) }}">
                            @error('nama_sekolah')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
