<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kelas = \App\Models\Kelas::latest()->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        // Validasi data dari request
    $requestData = $request->validate([
        'nama' => 'nullable',
        'lantai' => 'nullable',
        'wali_kelas' => 'nullable', 
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000', 
    ]);

    $kelas = new \App\Models\Kelas();
    $kelas->fill($requestData); 

    // Cek apakah ada file foto yang diunggah
    if ($request->hasFile('foto')) {
        $kelas->foto = $request->file('foto')->store('kelas_foto', 'public');
    }

    $kelas->save();

    return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //Untuk Menampilkan Detail
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kelas'] = \App\Models\Kelas::findOrFail($id);
        return view('kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, string $id)
    {
        // Validasi data input
        $requestData = $request->validate([
            'nama' => 'nullable',
            'lantai' => 'nullable',
            'wali_kelas' => 'nullable', 
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000', 
        ]);

        $kelas = \App\Models\Kelas::findOrFail($id);

        $kelas->fill($requestData);

        // Jika ada password baru, hash dan update password
        if ($request->filled('password')) {
            $kelas->password = bcrypt($request->password);
        }

        // Jika ada foto yang diupload, hapus foto lama dan simpan foto baru
        if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
            if ($kelas->foto && Storage::disk('public')->exists($kelas->foto)) {
                Storage::disk('public')->delete($kelas->foto);
            }
        // Simpan foto baru
        $kelas->foto = $request->file('foto')->store('kelas_foto', 'public');
        }

        // Simpan perubahan ke database
        $kelas->save();

        return redirect('/kelas')->with('success', 'Data kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = \App\Models\Kelas::findOrFail($id);

        // Hapus foto lama jika ada
        if ($kelas->foto != null && Storage::disk('public')->exists($kelas->foto)) {
            Storage::disk('public')->delete($kelas->foto);
        }

        $kelas->delete();

        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus.');
    }
}
