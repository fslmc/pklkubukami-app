<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        return view('siswa.index', compact('data'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function post(Request $request)
    {
        $this->validateInput($request);

        try {
            $siswa = $this->createSiswa($request);
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('siswa.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Data Gagal Disimpan!');
            return redirect()->back()->withInput();
        }
    }

    private function validateInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'jenis_kelamin' => 'required|min:3',
            'sekolah' => 'required|min:3',
            'jurusan' => 'required|min:3',
            'tanggal' => 'required|min:3',
        ], [
            'nama.required' => 'Nama harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'sekolah.required' => 'Sekolah harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    private function createSiswa(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nama = $request->input('nama');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->sekolah = $request->input('sekolah');
        $siswa->jurusan = $request->input('jurusan');
        $siswa->tanggal = $request->input('tanggal');
        $siswa->save();

        return $siswa;
    }

    public function edit($id)
    {
        $ids = \Crypt::decrypt($id);
        $siswa = Siswa::find($ids);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
{
    $id = \Crypt::decrypt($id);
    $siswa = Siswa::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'nama' => 'required|min:3|max:255',
        'jenis_kelamin' => 'required|in:L,P',
        'sekolah' => 'required|min:3|max:255',
        'jurusan' => 'required|min:3|max:255',
        'tanggal' => 'required|date',
    ]);

    if ($validator->fails()) {
        return redirect()->route('siswa.edit', $id)
                         ->withErrors($validator)
                         ->withInput();
    }

    try {
        $siswa->update([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'id_sekolah' => $request->input('sekolah'),
            'jurusan' => $request->input('jurusan'),
            'tanggal' => $request->input('tanggal'),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil DiUbah.');
    } catch (QueryException $e) {
        return redirect()->back()->with('error', 'Data Gagal DiUbah! ' . $e->getMessage());
    }
}

public function delete($id)
{
    $ids = \Crypt::decrypt($id);
    $siswa = Siswa::find($ids);

    if ($siswa) {
        $siswa->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    } else {
        return redirect()->back()->with('error', 'Data tidak ditemukan!');
    }
}

}
