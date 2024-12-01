<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{

    /**
     * Display the user's profile form.
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
    public function store(StorekelasRequest $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'lantai' => 'required',
            'wali_kelas' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000', // Validasi foto
        ]);

        $kelas = new \App\Models\kelas();
        $kelas->fill($requestData);

        $kelas->foto = $request->file('foto')->store('kelas_foto', 'public');

        $kelas->save();

        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kelas $kelas)
    {
        //
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
    public function update(UpdatekelasRequest $request, string $id)
    {
        // Validasi data input
        $requestData = $request->validate([
            'nama' => 'required',
            'lantai' => 'required',
            'wali_kelas' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2000', // Validasi foto
        ]);

        $kelas = \App\Models\kelas::findOrFail($id);

        $kelas->fill($requestData);

        // Hash password jika diisi
        if (!empty($requestData['password'])) {
            $kelas->password = bcrypt($requestData['password']);
        }

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kelas->foto && Storage::disk('public')->exists($kelas->foto)) {
                Storage::disk('public')->delete($kelas->foto);
            }
            // Simpan foto baru dan update path-nya
            $kelas->foto = $request->file('foto')->store('kelas_foto', 'public');
        }

        $kelas->save();

        return redirect('/kelas')->with('success', 'Data kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = \App\Models\kelas::findOrFail($id);

        // Hapus foto lama jika ada
        if ($kelas->foto != null && Storage::disk('public')->exists($kelas->foto)) {
            Storage::disk('public')->delete($kelas->foto);
        }

        $kelas->delete();

        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus.');
    }
}
