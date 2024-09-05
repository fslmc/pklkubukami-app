@extends('layouts.adminDashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload File</div>
                <div class="card-body">
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Choose a file:</label>
                            <input type="file" id="file" name="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul: <span style="color: grey;">Optional</span></label>
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi: <span style="color: grey;">Optional</span></label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection