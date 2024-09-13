@extends('layouts.adminDashboard')

@section('body')

    <section class="section dashboard">
        <h1>Data Tugas</h1>
        <h5>Hanya Menampilkan Tugas Yang Dikumpulkan di Akun Saat Ini</h5>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('file.create')}}" class="btn btn-info">Upload File<i class="fas fa-file"></i></a>

                        <table id="myTable" class="table datatable mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Timestamp</th>
                                    <th scope="col">Link Google Drive</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($uploadHistories as $history)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $history->file_name }}</td>
                                    <td>{{ $history->created_at }}</td>
                                    <td><a href="{{ $history->google_drive_file_link }}" target="_blank">View File</a></td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Siswa">
                                            <i class="fas fa-pen"></i></a>
                                        {{-- <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
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
                                            class="fas fa-trash"></i></a> --}}
                                        {{-- <form id="delete-form-{{ $d->id }}"
                                            action="{{ route('sekolah.delete', Crypt::encrypt($d->id)) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
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
