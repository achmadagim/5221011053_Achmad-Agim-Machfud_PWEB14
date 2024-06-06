<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahBaris = 5;
        if (strlen($katakunci)) {
            $data = mahasiswa::where('NPM', 'like', "%$katakunci%")
                ->orWhere('Nama', 'like', "%$katakunci%")
                ->orWhere('Jurusan', 'like', "%$katakunci%")
                ->paginate($jumlahBaris);
        } else{
            $data = mahasiswa::orderBy('npm', 'desc')->paginate($jumlahBaris);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);

        $request->validate([
            'npm' => 'required|numeric|unique:mahasiswa,NPM',     
            'nama' => 'required',
            'jurusan' => 'required',
        ], [
            'npm.required' => 'NPM wajib diisi',
            'npm.numeric' => 'NPM wajib berupa angka',
            'npm.unique' => 'NPM sudah ada di database',
            'nama.required' => 'Nama wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);
        $data = [
            'NPM' => $request->npm,
            'Nama' => $request->nama,
            'Jurusan' => $request->jurusan,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('NPM', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);
        $data = [
            'Nama' => $request->nama,
            'Jurusan' => $request->jurusan,
        ];
        mahasiswa::where('NPM', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('NPM', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}
