<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Http\Requests\StoreGuruRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateGuruRequest;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10); // Ambil data guru terbaru
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $kelas = Kelas::all();  // Ambil semua data kelas
        return view('guru.create', compact('kelas'));  // Mengirim data kelas ke view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreGuruRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGuruRequest $request)
    {
        // Validasi dan ambil data dari request
        $requestData = $request->validated();

        // Membuat objek guru baru
        $guru = new Guru();
        $guru->fill($requestData); // Isi data guru dengan request data

        // Jika ada foto yang di-upload, simpan di folder 'guru_foto'
        if ($request->hasFile('foto')) {
            $guru->foto = $request->file('foto')->store('guru_foto', 'public');
        }

        $guru->save(); // Simpan data guru ke database

        // Redirect ke halaman guru dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);  // Cari data guru berdasarkan ID
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGuruRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGuruRequest $request, string $id)
    {
        // Validasi dan ambil data dari request
        $requestData = $request->validated();

        // Cari guru berdasarkan ID
        $guru = Guru::findOrFail($id);
        $guru->fill($requestData); // Isi data guru dengan request data

        // Jika password diubah, enkripsi password
        if (!empty($requestData['password'])) {
            $guru->password = bcrypt($requestData['password']);
        }

        // Jika ada foto baru, hapus foto lama dan simpan foto baru
        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto); // Hapus foto lama
            }
            $guru->foto = $request->file('foto')->store('guru_foto', 'public'); // Simpan foto baru
        }

        $guru->save(); // Simpan data guru ke database

        // Redirect ke halaman guru dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Cari guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Hapus foto jika ada
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete(); // Hapus data guru dari database

        // Redirect ke halaman guru dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
