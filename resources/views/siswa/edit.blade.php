@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row-g-3" action="{{ route('siswa.update',['id' => encrypt($siswa->id)]) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-12">
                            <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ old('nama', $siswa->nama) }}">
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <label for="jenis kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>L</option>
                                <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>P</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="sekolah" class="form-label">Sekolah<span class="text-danger">*</span></label>
                            <select class="form-control" name="sekolah_id" id="sekolah_id" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($sekolahs as $sekolah)
                                    <option value="{{ $sekolah->id }}" @if ($siswa->sekolah_id == $sekolah->id) selected @endif>{{ $sekolah->nama_sekolah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="jurusan" class="form-label">Jurusan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan', $siswa->jurusan) }}">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="tanggal" class="form-label">Tanggal<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $siswa->tanggal) }}">
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
