<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data kelahiran jemaat berdasarkan yang terbaru
        $kelahirans = Kelahiran::latest()->get();
        
        return view('kelahiran.index', compact('kelahirans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelahiran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form Kelahiran
        $validated = $request->validate([
            'nama_anak'      => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date|before_or_equal:today',
            'jenis_kelamin'  => 'required|in:L,P',
            'keterangan'     => 'nullable|string',
        ], [
            // Pesan error kustom
            'required'         => 'Kolom :attribute wajib diisi.',
            'date'             => 'Format tanggal tidak valid.',
            'before_or_equal'  => 'Tanggal lahir tidak boleh melebihi hari ini.',
            'in'               => 'Pilihan jenis kelamin harus Laki-laki (L) atau Perempuan (P).',
        ]);

        // 2. Simpan ke database jika lolos validasi
        Kelahiran::create($validated);

        // 3. Kembali ke index dengan notifikasi sukses
        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran anak berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelahiran = Kelahiran::findOrFail($id);
        
        return view('kelahiran.show', compact('kelahiran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelahiran = Kelahiran::findOrFail($id);
        
        return view('kelahiran.edit', compact('kelahiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelahiran = Kelahiran::findOrFail($id);

        // 1. Validasi Input Form Edit Kelahiran (Disamakan pesan kustomnya dengan store)
        $validated = $request->validate([
            'nama_anak'      => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date|before_or_equal:today',
            'jenis_kelamin'  => 'required|in:L,P',
            'keterangan'     => 'nullable|string',
        ], [
            'required'         => 'Kolom :attribute wajib diisi.',
            'date'             => 'Format tanggal tidak valid.',
            'before_or_equal'  => 'Tanggal lahir tidak boleh melebihi hari ini.',
            'in'               => 'Pilihan jenis kelamin harus Laki-laki (L) atau Perempuan (P).',
        ]);

        // 2. Update data ke database
        $kelahiran->update($validated);

        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelahiran = Kelahiran::findOrFail($id);
        $kelahiran->delete();

        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil dihapus.');
    }
}