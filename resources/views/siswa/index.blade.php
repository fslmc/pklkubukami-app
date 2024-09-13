@extends('layouts.adminDashboard')

@section('body')

    <section class="section dashboard">
        <h1>Data Siswa</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('siswa.create')}}" class="btn btn-info">Tambah Data <i class="fas fa-user-plus"></i></a>

                        <table id="myTable" class="table datatable mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Sekolah</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->jenis_kelamin }}</td>
                                    <td>{{ $d->sekolah->nama_sekolah }}</td>
                                    <td>{{ $d->jurusan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{route('siswa.edit',Crypt::encrypt($d->id))}}"
                                            class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Siswa">
                                            <i class="fas fa-pen"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Hapus Data"
                                            onclick="event.preventDefault();
                                            Swal.fire({
                                                title: 'Apa Anda Yakin?',
                                                text: 'Data yang telah dihapus tidak dapat dikembalikan',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Ya, hapus.',
                                                cancelButtonText: 'Batal',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('delete-form-{{ $d->id }}').submit();
                                                }
                                            });"><i
                                            class="fas fa-trash"></i></a>
                                        <form id="delete-form-{{ $d->id }}"
                                            action="{{ route('siswa.delete', Crypt::encrypt($d->id)) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                $('#myTable').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
