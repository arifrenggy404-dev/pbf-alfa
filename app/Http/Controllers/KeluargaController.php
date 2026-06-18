<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PENGINGKATAN: Menggunakan withCount('jemaats') agar jumlah_anggota dihitung otomatis dari database
        // dan tidak bergantung pada inputan manual yang rawan salah sinkron.
        $keluargas = Keluarga::withCount('jemaats')->latest()->get();
        
        return view('keluarga.index', compact('keluargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form Keluarga
        $validated = $request->validate([
            'no_kk'                 => 'required|numeric|digits:16|unique:keluargas,no_kk',
            'nama_kepala_keluarga'  => 'required|string|max:255',
            'alamat'                => 'required|string',
            'jumlah_anggota'        => 'required|integer|min:0', // Diubah ke min:0 agar lebih aman saat pertama dibuat
        ], [
            // Pesan error kustom
            'required'       => 'Kolom :attribute wajib diisi.',
            'numeric'        => 'Nomor KK harus berupa angka.',
            'digits'         => 'Nomor KK harus tepat berisi 16 digit.',
            'unique'         => 'Nomor KK ini sudah terdaftar di sistem.',
            'integer'        => 'Jumlah anggota harus berupa angka bulat.',
            'min'            => 'Jumlah anggota tidak boleh bernilai minus.',
        ]);

        // 2. Simpan ke database jika lolos validasi
        Keluarga::create($validated);

        // 3. Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // PENGINGKATAN: Menampilkan detail keluarga beserta daftar jemaat yang ada di dalamnya
        $keluarga = Keluarga::with('jemaats')->withCount('jemaats')->findOrFail($id);
        
        return view('keluarga.show', compact('keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keluarga = Keluarga::findOrFail($id);
        
        return view('keluarga.edit', compact('keluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $keluarga = Keluarga::findOrFail($id);

        // 1. Validasi Input Form Edit Keluarga
        $validated = $request->validate([
            'no_kk'                 => 'required|numeric|digits:16|unique:keluargas,no_kk,' . $id,
            'nama_kepala_keluarga'  => 'required|string|max:255',
            'alamat'                => 'required|string',
            'jumlah_anggota'        => 'required|integer|min:0',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'digits'   => 'Nomor KK harus tepat berisi 16 digit.',
            'unique'   => 'Nomor KK ini sudah digunakan oleh keluarga lain.',
            'min'      => 'Jumlah anggota tidak boleh bernilai minus.',
        ]);

        // 2. Update data ke database
        $keluarga->update($validated);

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keluarga = Keluarga::findOrFail($id);
        
        // PENGINGKATAN: Sebelum menghapus KK, lepaskan dulu ikatan keluarga_id pada data jemaat 
        // supaya tidak terjadi error Relational Integrity di database kamu.
        $keluarga->jemaats()->update(['keluarga_id' => null]);
        
        $keluarga->delete();

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil dihapus.');
    }
}