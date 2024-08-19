<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function index()
    {
        $data = Sekolah::all();
        return view('sekolah.index', compact('data'));
    }

    public function create()
    {
        return view('sekolah.create');
    }

    public function post(Request $request)
    {
        $this->validateInput($request);

        try {
            $sekolah = $this->createSekolah($request);
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('sekolah.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Data Gagal Disimpan!');
            return redirect()->back()->withInput();
        }
    }

    private function validateInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sekolah' => 'required|min:3|max:255',
        ], [
            'nama_sekolah.required' => 'Nama Sekolah harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    private function createSekolah(Request $request)
    {
        $sekolah = new Sekolah();
        $sekolah->nama_sekolah = $request->input('nama_sekolah');
        $sekolah->save();

        return $sekolah;
    }

    public function edit($id)
    {
        $id = \Crypt::decrypt($id);
        $sekolah = Sekolah::find($id);
        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, $id)
    {
        $id = \Crypt::decrypt($id);
        $sekolah = Sekolah::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_sekolah' => 'required|min:3|max:255',
        ], [
            'nama_sekolah.required' => 'Nama Sekolah harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('sekolah.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $sekolah->update([
                'nama_sekolah' => $request->input('nama_sekolah'),
            ]);

            return redirect()->route('sekolah.index')->with('success', 'Data Berhasil DiUbah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal DiUbah! ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $id = \Crypt::decrypt($id);
        $sekolah = Sekolah::find($id);

        if ($sekolah) {
            $sekolah->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
    }
}
