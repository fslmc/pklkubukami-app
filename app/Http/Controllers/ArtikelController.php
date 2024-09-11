<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Artikel;
use Illuminate\Database\QueryException;
use Mews\Purifier\Facades\Purifier;
use RealReshid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::all();
        return view('artikel.index', compact('data'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function post(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'penulis' => 'required|min:3',
            'konten' => 'required|min:3',
            'thumbnail' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'konten.required' => 'Konten harus diisi',
            'thumbnail.image' => 'Harus berupa gambar',
            'thumbnail.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->route('artikel.index')->with('error', 'Data gagal disimpan harap isi dengan lengkap.');
        }

        try {
            $filePath = '/assets/default/blog.png'; // Default path
    
            // Cek jika ada file yang diupload
            if ($request->hasFile('thumbnail')) {
                $fileName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path('assets/artikel-thumbnail'), $fileName);
                $filePath = '/assets/artikel-thumbnail/' . $fileName;
            }

            // Buat slug dari judul
            $slug = Str::slug($request->judul, '-');

            // Bersihkan konten HTML menggunakan mews/purifier
            $konten = Purifier::clean($request->input('konten'));

            // Simpan artikel
            $artikel = new Artikel();
            $artikel->judul = $request->input('judul');
            $artikel->penulis = $request->input('penulis');
            $artikel->konten = $konten;
            $artikel->thumbnail = $filePath;
            $artikel->slug = $slug;
            $artikel->save();

            return redirect()->route('artikel.index')->with('success', 'Data Berhasil Disimpan.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->route('artikel.index')->with('error', 'Data gagal disimpan.');
        }
    }

    public function edit($id)
    {
        $ids = \Crypt::decrypt($id);
        $artikel = Artikel::find($ids);
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $id = \Crypt::decrypt($id);
        $artikel = Artikel::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'penulis' => 'required|min:3',
            'konten' => 'required|min:3',
            'thumbnail' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'konten.required' => 'Konten harus diisi',
            'thumbnail.image' => 'Harus berupa gambar',
            'thumbnail.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->route('artikel.index')->with('error', 'Data gagal disimpan.');
        }

        try {
            $filePath = $artikel->thumbnail; // Default path

            // Cek jika ada file yang diupload
            if ($request->hasFile('thumbnail')) {
                $fileName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path('assets/artikel-thumbnail'), $fileName);
                $filePath = '/assets/artikel-thumbnail/' . $fileName;

                // Hapus foto lama jika ada
                if ($artikel->thumbnail != '/assets/default/blog.png') {
                    unlink(public_path($artikel->thumbnail));
                }
            } elseif ($request->input('unset_thumbnail') == 'on') {
                // Hapus foto jika checkbox unset_thumbnail dicentang
                $filePath = '/assets/img/card.jpg';
                if ($artikel->thumbnail != '/assets/img/card.jpg') {
                    unlink(public_path($artikel->thumbnail));
                }
            }

            // Buat slug dari judul
            $slug = Str::slug($request->judul, '-');

            // Bersihkan konten HTML menggunakan mews/purifier
            $konten = Purifier::clean($request->input('konten'));

            // Update artikel
            $artikel->update([
                'judul' => $request->input('judul'),
                'penulis' => $request->input('penulis'),
                'konten' => $konten,
                'thumbnail' => $filePath,
                'slug' => $slug,
            ]);

            return redirect()->route('artikel.index')->with('success', 'Data Berhasil DiUbah.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->route('artikel.index')->with('error', 'Data gagal disimpan.');
        }
    }

    public function delete($id)
    {
        $ids = \Crypt::decrypt($id);
        $artikel = Artikel::find($ids);

        if ($artikel) {
            // Hapus foto jika ada
            if ($artikel->thumbnail != '/assets/default/blog.png') {
                unlink(public_path($artikel->thumbnail));
            }

            $artikel->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
    }
}
