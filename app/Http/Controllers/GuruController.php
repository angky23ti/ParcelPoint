<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateGuruRequest;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
         // dd() -> function untuk melihat isi variabel $guru
        $guru = \App\Models\Guru::latest()->paginate(10);
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreguruRequest $request)
    {
        $requestData = $request->validate([
            'nip' => 'required|unique:gurus,nip', // Validasi unique untuk nisn
            'nama' => 'required',
            'kelas' => 'required',
            'username' => 'required|unique:gurus,username', // Validasi unique untuk username
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2000', // Validasi foto
        ]);

        $guru = new \App\Models\guru(); // Membuat objek guru baru
        $guru->fill($requestData); // Mengisi data guru dengan data yang sudah divalidasi

        // Menyimpan foto ke folder 'guru_foto' di disk 'public'
        $guru->foto = $request->file('foto')->store('guru_foto', 'public');

        $guru->save(); // Menyimpan data guru ke database

        // Redirect ke halaman guru dengan pesan sukses
        return redirect('/guru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['guru'] = \App\Models\guru::findOrFail($id);
        return view('guru.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateguruRequest $request, string $id)
    {
        // Validasi data input
        $requestData = $request->validate([
            'nisn' => 'required|unique:gurus,nisn,' . $id, // Unik kecuali untuk ID saat ini
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'username' => 'required|unique:gurus,username,' . $id, // Unik kecuali untuk ID saat ini
            'password' => 'nullable|string|min:6', // Password opsional
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000', // Foto opsional
        ]);

        // Ambil data guru berdasarkan ID
        $guru = \App\Models\guru::findOrFail($id);

        // Update data guru
        $guru->fill($requestData);

        // Hash password jika diisi
        if (!empty($requestData['password'])) {
            $guru->password = bcrypt($requestData['password']);
        }

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            // Simpan foto baru dan update path-nya
            $guru->foto = $request->file('foto')->store('guru_foto', 'public'); // Disimpan di folder 'guru_foto'
        }

        // Simpan perubahan ke database
        $guru->save();

        // Redirect ke halaman daftar guru dengan pesan sukses
        return redirect('/guru')->with('success', 'Data guru berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = \App\Models\guru::findOrFail($id);

        // Hapus foto lama jika ada
        if ($guru->foto != null && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        // Hapus data guru
        $guru->delete();

        // Redirect ke halaman daftar guru
        return redirect('/guru')->with('success', 'Data guru berhasil dihapus.');
    }
}
