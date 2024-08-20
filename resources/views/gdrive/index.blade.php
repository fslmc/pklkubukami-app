@extends('layouts.adminDashboard')

@section('body')
<h1>Your Upload History</h1>

<table>
    <thead>
        <tr>
            <th>File Name</th>
            <th>Google Drive Link</th>
            <th>Uploaded At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($uploadHistories as $history)
            <tr>
                <td>{{ $history->file_name }}</td>
                <td><a href="{{ $history->google_drive_file_link }}" target="_blank">View File</a></td>
                <td>{{ $history->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection