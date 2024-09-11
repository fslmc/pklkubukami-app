<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Testimoni;
use Illuminate\Database\QueryException;
use HTMLPurifier;
use RealReshid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TestimoniController extends Controller
{
    protected $purifier;

    public function __construct(HTMLPurifier $purifier)
    {
        $this->purifier = $purifier;
    }

    public function index()
    {
        $testimoni = Testimoni::all();
        return view('testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('testimoni.create');
    }

    public function post(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'content' => 'required|min:3',
            'image_url' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'content.required' => 'Penulis harus diisi',
            'image_url.image' => 'Harus berupa gambar',
            'image_url.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $filePath = '/assets/img/card.jpg'; // Default path

            // Cek jika ada file yang diupload
            if ($request->hasFile('image_url')) {
                $fileName = time() . '.' . $request->image_url->extension();
                $request->image_url->move(public_path('assets/image_url'), $fileName);
                $filePath = '/assets/image_url/' . $fileName;
            }

            // Buat slug dari judul
            // $slug = Str::slug($request->judul, '-');

            // Bersihkan konten HTML
            $content = $this->purifier->purify($request->input('content'));

            // Simpan testimoni
            $testimoni = new Testimoni();
            $testimoni->user_id = Auth::id();
            $testimoni->judul = $request->input('judul');
            $testimoni->content = $content;
            $testimoni->image_url = $filePath;
            $testimoni->save();

            return redirect()->route('testimoni.index')->with('success', 'Data Berhasil Disimpan.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->back()->with('error', 'Data Gagal Disimpan! ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $ids = \Crypt::decrypt($id);
        $testimoni = Testimoni::find($ids);
        return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $id = \Crypt::decrypt($id);
        $testimoni = Testimoni::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'content' => 'required|min:3',
            'image_url' => 'nullable|image|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'content.required' => 'Content harus diisi',
            'image_url.image' => 'Harus berupa gambar',
            'image_url.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'Data Gagal DiUbah!');
        }

        try {
            $filePath = $testimoni->image_url; // Default path

            // Cek jika ada file yang diupload
            if ($request->hasFile('image_url')) {
                $fileName = time() . '.' . $request->image_url->extension();
                $request->image_url->move(public_path('assets/image_url'), $fileName);
                $filePath = '/assets/image_url/' . $fileName;

                // Hapus foto lama jika ada
                if ($testimoni->image_url != '/assets/img/card.jpg') {
                    unlink(public_path($testimoni->image_url));
                }
            }

            // Buat slug dari judul
            // $slug = Str::slug($request->judul, '-');

            // Bersihkan content HTML
            $content = $this->purifier->purify($request->input('content'));

            // Update testimoni
            $testimoni->update([
                'judul' => $request->input('judul'),
                'content' => $content,
                'image_url' => $filePath,
            ]);

            return redirect()->route('testimoni.index')->with('success', 'Data Berhasil DiUbah.');
        } catch (QueryException $e) {
            // Tangani pengecualian jika terjadi kesalahan query
            return redirect()->back()->with('error', 'Data Gagal DiUbah! ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $ids = \Crypt::decrypt($id);
        $testimoni = Testimoni::find($ids);

        if ($testimoni) {
            // Hapus foto jika ada
            if ($testimoni->image_url != '/assets/img/card.jpg') {
                unlink(public_path($testimoni->image_url));
            }

            $testimoni->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
    }
}
