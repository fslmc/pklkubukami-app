<?php

namespace App\Http\Controllers;

use App\Models\UploadHistory;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{

    public function index()
    {
        $uploadHistories = UploadHistory::where('user_id', Auth::id())->get();

        // return view('gdrive.index', compact('uploadHistories'));
        return view('gdrive.index', compact('uploadHistories'));
    }

    public function adminIndex()
    {
        $uploadHistories = UploadHistory::all();

        // return view('gdrive.index', compact('uploadHistories'));
        return view('admin.gdrive.index', compact('uploadHistories'));
    }

    public function create(){
        return view('gdrive.create');
    }

    public function store(Request $request, GoogleDriveService $driveService)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $file = $request->file('file');
        $folderId = '11SOSg-DQiVnduHZE5c7xnOSSyb2I7IXk';

        $uploadedFile = $driveService->uploadFile($file, $folderId);

        // Save the upload history
        $uploadHistory = new UploadHistory();
        $uploadHistory->user_id = Auth::id(); // Get the authenticated user's ID
        $uploadHistory->file_name = $file->getClientOriginalName();
        $uploadHistory->google_drive_file_id = $uploadedFile->id;
        $uploadHistory->google_drive_file_link = "https://drive.google.com/file/d/{$uploadedFile->id}/view";
        $uploadHistory->save();

        return response()->json([
            'success' => true,
            'file_id' => $uploadedFile->id,
        ]);
    }
}
