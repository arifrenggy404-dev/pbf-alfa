<?php

namespace App\Http\Controllers;

use App\Models\Pernikahan;
use Illuminate\Http\Request;

class PernikahanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua catatan pernikahan jemaat, diurutkan dari yang terbaru
        $pernikahans = Pernikahan::latest()->get();
        
        return view('pernikahan.index', compact('pernikahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pernikahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form Pernikahan
        $validated = $request->validate([
            'nama_suami'          => 'required|string|max:255',
            'nama_istri'          => 'required|string|max:255',
            'tanggal_pernikahan'  => 'required|date|before_or_equal:today',
            'tempat_pernikahan'   => 'required|string|max:255',
            'keterangan'          => 'nullable|string',
        ], [
            // Pesan error kustom berbahasa Indonesia
            'required'            => 'Kolom :attribute wajib diisi.',
            'date'                => 'Format tanggal pernikahan tidak valid.',
            'before_or_equal'     => 'Tanggal pernikahan tidak boleh melampaui hari ini.',
        ]);

        // 2. Simpan ke database jika lolos validasi
        Pernikahan::create($validated);

        // 3. Kembali ke halaman index dengan notifikasi sukses
        return redirect()->route('pernikahan.index')->with('success', 'Data pernikahan jemaat berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pernikahan = Pernikahan::findOrFail($id);
        
        return view('pernikahan.show', compact('pernikahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pernikahan = Pernikahan::findOrFail($id);
        
        return view('pernikahan.edit', compact('pernikahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pernikahan = Pernikahan::findOrFail($id);

        // 1. Validasi Input Form Edit Pernikahan (Sudah disamakan pesan kustomnya dengan store)
        $validated = $request->validate([
            'nama_suami'          => 'required|string|max:255',
            'nama_istri'          => 'required|string|max:255',
            'tanggal_pernikahan'  => 'required|date|before_or_equal:today',
            'tempat_pernikahan'   => 'required|string|max:255',
            'keterangan'          => 'nullable|string',
        ], [
            'required'            => 'Kolom :attribute wajib diisi.',
            'date'                => 'Format tanggal pernikahan tidak valid.',
            'before_or_equal'     => 'Tanggal pernikahan tidak boleh melampaui hari ini.',
        ]);

        // 2. Update data ke database
        $pernikahan->update($validated);

        return redirect()->route('pernikahan.index')->with('success', 'Data pernikahan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pernikahan = Pernikahan::findOrFail($id);
        $pernikahan->delete();

        return redirect()->route('pernikahan.index')->with('success', 'Data pernikahan berhasil dihapus.');
    }
}