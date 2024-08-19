@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('gallery.create') }}" class="btn btn-info">Tambah Data <i class="fas fa-image"></i></a>
                    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                    <script src="https://cdn.datatables.net/2.1.0/js/jquery.dataTables.min.js"></script>
                    <table id="myTable" class="table datatable mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Upload By</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Foto</th>
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
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->upload_by }}</td>
                                <td>{!! ($d->deskripsi) !!}</td>
                                <td>
                                    <img src="{{ asset($d->foto) }}" width="35" alt="{{ $d->judul }}">
                                </td>
                                <td>
                                    <a href="{{route('gallery.edit',Crypt::encrypt($d->id))}}"
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
                                        action="{{ route('gallery.delete', Crypt::encrypt($d->id)) }}"
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
                    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
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
