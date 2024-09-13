<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Projek;
use Illuminate\Database\QueryException;
use RealReshid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Facades\Log;
use App\Providers\HtmlPurifierServiceProvider;

class ProjekController extends Controller
{
    public function index()
    {
        $data = Projek::all();
        return view('projek.index', compact('data'));
    }

    public function create()
    {
        return view('projek.create');
    }

    public function post(Request $request, HTMLPurifier $purifier)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'konten' => 'required|min:3',
            'thumbnail' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'konten.required' => 'Konten harus diisi',
            'thumbnail.image' => 'Harus berupa gambar',
            'thumbnail.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('projek.index')->with('error', 'Data gagal disimpan harap isi dengan lengkap.');
        }
    
        try {
            $filePath = '/assets/default/blog.png'; // Default path
    
            // Cek jika ada file yang diupload
            if ($request->hasFile('thumbnail')) {
                $fileName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path('assets/projek-thumbnail'), $fileName);
                $filePath = '/assets/projek-thumbnail/' . $fileName;
            }
    
            // Buat slug dari judul
            $slug = Str::slug($request->judul, '-');
    
            // Bersihkan konten HTML menggunakan 
            $konten = $purifier->purify($request->input('konten'));
    
            // Simpan projek
            $projek = new Projek();
            $projek->judul = $request->input('judul');
            $projek->konten = $konten;
            $projek->thumbnail = $filePath;
            $projek->slug = $slug;
            $projek->created_at = Carbon::now('Asia/Jakarta'); // Use Jakarta time
            $projek->save();
    
            return redirect()->route('projek.index')->with('success', 'Data Berhasil Disimpan.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->route('projek.index')->with('error', 'Data gagal disimpan.');
        }
    }
    

    public function edit($id)
    {
        $ids = \Crypt::decrypt($id);
        $projek = Projek::find($ids);
        return view('projek.edit', compact('projek'));
    }

    public function update(Request $request, $id, HTMLPurifier $purifier)
    {
        $id = \Crypt::decrypt($id);
        $projek = Projek::findOrFail($id);
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'konten' => 'required|min:3',
            'thumbnail' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'konten.required' => 'Konten harus diisi',
            'thumbnail.image' => 'Harus berupa gambar',
            'thumbnail.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('projek.index')->with('error', 'Data gagal disimpan.');
        }
    
        try {
            $filePath = $projek->thumbnail; // Default path
    
            // Cek jika ada file yang diupload
            if ($request->hasFile('thumbnail')) {
                $fileName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path('assets/projek-thumbnail'), $fileName);
                $filePath = '/assets/projek-thumbnail/' . $fileName;
    
                // Hapus foto lama jika ada
                if ($projek->thumbnail != '/assets/default/blog.png') {
                    unlink(public_path($projek->thumbnail));
                }
            } elseif ($request->input('unset_thumbnail') == 'on') {
                // Hapus foto jika checkbox unset_thumbnail dicentang
                $filePath = '/assets/img/card.jpg';
                if ($projek->thumbnail != '/assets/img/card.jpg') {
                    unlink(public_path($projek->thumbnail));
                }
            }
    
            // Buat slug dari judul
            $slug = Str::slug($request->judul, '-');

            // Create a NEW purifier instance with the new configuration
            $konten = $purifier->purify($request->input('konten'));
    
            // Update projek
            $projek->update([
                'judul' => $request->input('judul'),
                'konten' => $konten,
                'thumbnail' => $filePath,
                'slug' => $slug,
            ]);
    
            return redirect()->route('projek.index')->with('success', 'Data Berhasil DiUbah.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->route('projek.index')->with('error', 'Data gagal disimpan.');
        }
    }

    public function delete($id)
    {
        $ids = \Crypt::decrypt($id);
        $projek = Projek::find($ids);

        if ($projek) {
            // Hapus foto jika ada
            if ($projek->thumbnail != '/assets/default/blog.png') {
                unlink(public_path($projek->thumbnail));
            }

            $projek->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
    }
}