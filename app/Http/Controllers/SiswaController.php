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
         // dd() -> function untuk melihat isi variabel $siswa
        $siswa = \App\Models\Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $requestData = $request->validate([
            'nisn' => 'required|unique:siswas,nisn', // Validasi unique untuk nisn
            'nama' => 'required',
            'kelas' => 'required',
            'username' => 'required|unique:siswas,username', // Validasi unique untuk username
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2000', // Validasi foto
        ]);

        $siswa = new \App\Models\Siswa(); // Membuat objek siswa baru
        $siswa->fill($requestData); // Mengisi data siswa dengan data yang sudah divalidasi

        // Menyimpan foto ke folder 'siswa_foto' di disk 'public'
        $siswa->foto = $request->file('foto')->store('siswa_foto', 'public');

        $siswa->save(); // Menyimpan data siswa ke database

        // Redirect ke halaman siswa dengan pesan sukses
        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
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
        // Validasi data input
        $requestData = $request->validate([
            'nisn' => 'required|unique:siswas,nisn,' . $id, // Unik kecuali untuk ID saat ini
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'username' => 'required|unique:siswas,username,' . $id, // Unik kecuali untuk ID saat ini
            'password' => 'nullable|string|min:6', // Password opsional
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000', // Foto opsional
        ]);

        // Ambil data siswa berdasarkan ID
        $siswa = \App\Models\Siswa::findOrFail($id);

        // Update data siswa
        $siswa->fill($requestData);

        // Hash password jika diisi
        if (!empty($requestData['password'])) {
            $siswa->password = bcrypt($requestData['password']);
        }

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }
            // Simpan foto baru dan update path-nya
            $siswa->foto = $request->file('foto')->store('siswa_foto', 'public'); // Disimpan di folder 'siswa_foto'
        }

        // Simpan perubahan ke database
        $siswa->save();

        // Redirect ke halaman daftar siswa dengan pesan sukses
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
