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
            'nip' => 'nullable|unique:gurus,nip', // Validasi unique untuk nisn
            'nama' => 'nullable',
            'kelas' => 'nullable',
            'username' => 'nullable|unique:gurus,username', // Validasi unique untuk username
            'password' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2000', // Validasi foto
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

        $requestData = $request->validate([
            'nisn' => 'nullable|unique:gurus,nip,' . $id, 
            'nama' => 'nullable',
            'kelas' => 'nullable',
            'username' => 'nullable|unique:gurus,username,' . $id,
            'password' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2000',
        ]);

        $guru = \App\Models\guru::findOrFail($id);

        $guru->fill($requestData);

        if (!empty($requestData['password'])) {
            $guru->password = bcrypt($requestData['password']);
        }


        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $guru->foto = $request->file('foto')->store('guru_foto', 'public'); // Disimpan di folder 'guru_foto'
        }

        $guru->save();

        return redirect('/guru')->with('success', 'Data guru berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = \App\Models\guru::findOrFail($id);

        if ($guru->foto != null && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect('/guru')->with('success', 'Data guru berhasil dihapus.');
    }
}
