<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\gallery;
use Illuminate\Database\QueryException;
use HTMLPurifier;
use RealReshid\SweetAlert\Facades\Alert;


class GalleryController extends Controller
{
    protected $purifier;

    public function __construct(HTMLPurifier $purifier)
    {
        $this->purifier = $purifier;
    }

    public function index()
    {
        $data = Gallery::all();
        return view('gallery.index', compact('data'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function post(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'upload_by' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'foto' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'upload_by.required' => 'upload_by harus diisi',
            'deskripsi.required' => 'deskripsi harus diisi',
            'foto.image' => 'Harus berupa gambar',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $filePath = '/assets/img/card.jpg'; // Default path

            // Cek jika ada file yang diupload
            if ($request->hasFile('foto')) {
                $fileName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('assets/gallery-foto'), $fileName);
                $filePath = '/assets/gallery-foto/' . $fileName;
            }

            // Buat slug dari judul
            $slug = Str::slug($request->judul, '-');

            // Bersihkan konten HTML
            $deskripsi = $this->purifier->purify($request->input('deskripsi'));

            // Simpan artikel
            $gallery = new Gallery();
            $gallery->judul = $request->input('judul');
            $gallery->upload_by = $request->input('upload_by');
            $gallery->deskripsi = $deskripsi;
            $gallery->foto = $filePath;
            $gallery->slug = $slug;
            $gallery->save();

            return redirect()->route('gallery.index')->with('success', 'Data Berhasil Disimpan.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->back()->with('error', 'Data Gagal Disimpan! ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $ids = \Crypt::decrypt($id);
        $gallery = Gallery::find($ids);
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $id = \Crypt::decrypt($id);
        $gallery = Gallery::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'upload_by' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'foto' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'upload_by.required' => 'upload_by harus diisi',
            'deskripsi.required' => 'deskripsi harus diisi',
            'foto.image' => 'Harus berupa gambar',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'Data Gagal DiUbah!');
        }

        try {
            $filePath = $gallery->foto; // Default path

            // Cek jika ada file yang diupload
            if ($request->hasFile('foto')) {
                $fileName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('assets/gallery-foto'), $fileName);
                $filePath = '/assets/gallery-foto/' . $fileName;

                // Hapus foto lama jika ada
                if ($gallery->foto != '/assets/img/card.jpg') {
                    unlink(public_path($gallery->foto));
                }
            }

            // Buat slug dari judul
            $slug = Str::slug($request->judul, '-');

            // Bersihkan konten HTML
            $deskripsi = $this->purifier->purify($request->input('deskripsi'));

            // Update artikel
            $gallery->update([
                'judul' => $request->input('judul'),
                'upload_by' => $request->input('upload_by'),
                'deskripsi' => $deskripsi,
                'foto' => $filePath,
                'slug' => $slug,
            ]);

            return redirect()->route('gallery.index')->with('success', 'Data Berhasil DiUbah.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->back()->with('error', 'Data Gagal DiUbah! ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $ids = \Crypt::decrypt($id);
        $gallery = Gallery::find($ids);

        if ($gallery) {
            // Hapus foto jika ada
            if ($gallery->foto != '/assets/img/card.jpg') {
                unlink(public_path($gallery->foto));
            }

            $gallery->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
    }
}
