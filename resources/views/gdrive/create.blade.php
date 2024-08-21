@extends('layouts.adminDashboard')

@section('body')
<form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Choose a file:</label>
    <input type="file" id="file" name="file">
    <button type="submit">Upload</button>
</form>

@endsection