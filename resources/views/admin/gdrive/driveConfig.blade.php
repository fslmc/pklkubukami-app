@extends('layouts.adminDashboard')

@section('body')
<section class="section dashboard">
  <h1>Ubah Link Google Drive</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#helpModal">Help/Guide</button>
                    <form class="row-g-3" action="{{ route('admin.gdriveConfig.update', ['id' => encrypt($setting->id)]) }}" enctype="multipart/form-data" method="POST" id="update-form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-12">
                            <label for="folderId" class="form-label">Folder ID</label>
                            <input type="text" class="form-control" id="folderId" name="folderId" value="{{ old('folderId', $setting->value) }}">
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan<i class="bi bi-check"></i></button>
                            <a href="{{ route('admin.gdriveConfig') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
      $('#helpModal').modal('hide');
      
      $('#update-form').submit(function(e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: 'Pastikan ID Folder Google Drive benar, karena ID sebelumnya tidak akan tersimpan. ',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, update!',
          cancelButtonText: 'No, cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $(this).unbind('submit').submit();
          }
        });
      });
    });
</script>
@endsection

<!-- Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="helpModalLabel">Panduan Mengubah ID dan Memberikan Akses ke Akun Servis</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h6 class="h6">Langkah 1: Mendapatkan ID</h6>
            <ul>
              <li>
                <p class="text-lg">Buka browser Anda dan buka Google Drive.</p>
                <ul>
                  <li><p class="text-lg">Masuk ke folder google drive yang ingin digunakan</p></li>
                  <li><p class="text-lg">Pada URL, ambil ID folder anda.</p></li>
                  <li><p class="text-lg">Salin ID tersebut.</p></li>
                </ul>
                <li><p class="text-lg">Contoh : pada link "https://drive.google.com/drive/u/4/folders/ <span class="font-weight-bold">1CInaLV73Ye-QFmKvL_02iaLwq1s6FG1t</span>" <br> Maka ID nya adalah "1CInaLV73Ye-QFmKvL_02iaLwq1s6FG1t"</p></li>
              </li>
            </ul>
            <br>
            <h6 class="h6">Langkah 2: Mengubah ID</h6>
            <ul>
              <li><p class="text-lg">Ganti ID lama dengan ID baru yang Anda dapatkan dari Langkah 1, pada kolom di halaman ini.</p></li>
              <li><p class="text-lg">Simpan perubahan Anda dan refresh halaman.</p></li>
            </ul>
            <br>
            <h6 class="h6">Langkah 3: Memberikan Akses ke Service Account</h6>
            <ul>
              <li><p class="text-lg">Buka folder google drive yang akan dipakai dan klik pada "Pengaturan" atau "Settings".</p></li>
              <li><p class="text-lg">Cari bagian "People" atau "Share".</p></li>
              <li><p class="text-lg">Berikan akses untuk mengedit kepada akun <span class="font-weight-bold">pkl-kubukami-dev@projek-pkl-kubukami.iam.gserviceaccount.com</span></p></li>
            </ul>
            <br>
            <p class="font-weight-bold">Tips:</p>
            <ul>
              <li><p class="text-lg">Jika Anda mengalami kesulitan dalam mengubah ID atau memberikan akses ke service account, hubungi tim dukungan teknis untuk bantuan lebih lanjut.</p></li>
            </ul>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>