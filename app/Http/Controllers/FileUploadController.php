<?php

namespace App\Http\Controllers;

use App\Models\UploadHistory;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

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

    public function editFolderId(Request $request)
    {
        $setting = Setting::where('key', 'gdrive_folder_id')->first();

        if (!$setting) {
        return response()->json([
            'success' => false,
            'error' => 'Setting not found',
        ], 404); // 404 Not Found
        }

        return view('admin.gdrive.driveConfig', compact('setting'));
    }

    public function store(Request $request, GoogleDriveService $driveService)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
            'judul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $folderId = Setting::where('key', 'gdrive_folder_id')->first()->value;

        try {
            $uploadedFile = $driveService->uploadFile($file, $folderId);
        } catch (\Google_Service_Exception $e) {
            // Catch Google Service exceptions, e.g., folder not found or permission denied
            return response()->json([
                'success' => false,
                'error' => 'Coba Hubungi Admin ' . 'Failed to upload file: ' . $e->getMessage(),
            ], 422); // 422 Unprocessable Entity
        }

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

    public function updateFolderId(Request $request)
{
    $request->validate([
        'folderId' => 'required|string',
    ]);

    $setting = Setting::where('key', 'gdrive_folder_id')->first();

    if (!$setting) {
        return response()->json([
            'success' => false,
            'error' => 'Setting not found',
        ], 404); // 404 Not Found
    }

    $setting->value = $request->input('folderId');
    $setting->save();

    return response()->json([
        'success' => true,
        'message' => 'Folder ID updated successfully',
    ]);
}
}
