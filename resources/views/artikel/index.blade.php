@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('artikel.create') }}" class="btn btn-info">Tambah Data <i class="fas fa-plus"></i></a>
                    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                    <script src="https://cdn.datatables.net/2.1.0/js/jquery.dataTables.min.js"></script>
                    <table id="myTable" class="table datatable mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Konten</th>
                                <th scope="col">Thumbnail</th>
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
                                <td>{{ $d->penulis }}</td>
                                <td>{!! ($d->konten) !!}</td>
                                <td>
                                    <img src="{{ asset($d->thumbnail) }}" width="35" alt="{{ $d->judul }}">
                                </td>
                                <td>
                                    <a href="{{route('artikel.edit',Crypt::encrypt($d->id))}}"
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
                                        action="{{ route('artikel.delete', Crypt::encrypt($d->id)) }}"
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
