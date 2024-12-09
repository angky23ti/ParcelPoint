<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = \App\Models\Siswa::with('kelas')->latest()->paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = \App\Models\Kelas::all();  // Ambil semua data kelas
        return view('siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
{
    // Validasi input, termasuk kelas_id
    $requestData = $request->validate([
        'nisn' => 'nullable|unique:siswas,nisn',
        'nama' => 'nullable',
        'kelas_id' => 'nullable|exists:kelas,id',  // Pastikan kelas_id ada di tabel kelas
        'username' => 'nullable|unique:siswas,username',
        'password' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
    ]);

    $siswa = new Siswa();
    $siswa->fill($requestData); // Isi data siswa

    if ($request->hasFile('foto')) {
        $siswa->foto = $request->file('foto')->store('siswa_foto', 'public');
    }

    $siswa->save();

    return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
}
    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //Untuk Menampilkan Detail
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['siswa'] = \App\Models\Siswa::findOrFail($id);
        return view('siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, string $id)
    {
        $requestData = $request->validate([
            'nisn' => 'nullable|unique:siswas,nisn,' . $id,
            'nama' => 'nullable',
            'kelas_id' => 'nullable|exists:kelas,id',  // Pastikan kelas_id ada di tabel kelas
            'username' => 'nullable|unique:siswas,username,' . $id,
            'password' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->fill($requestData);

        if ($request->filled('password')) {
            $siswa->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $siswa->foto = $request->file('foto')->store('siswa_foto', 'public');
        }

        $siswa->save();

        return redirect('/siswa')->with('success', 'Data siswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = \App\Models\Siswa::findOrFail($id);

        // Hapus foto lama jika ada
        if ($siswa->foto != null && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }

        // Hapus data siswa
        $siswa->delete();

        // Redirect ke halaman daftar siswa
        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}
