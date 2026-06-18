<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index()
    {
        $kematians = Kematian::latest()->get();
        return view('kematian.index', compact('kematians'));
    }

    public function create()
    {
        return view('kematian.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jemaat'        => 'required|string|max:255',
            'tanggal_lahir'      => 'nullable|date|before_or_equal:today', // Validasi baru
            'tanggal_meninggal'  => 'required|date|before_or_equal:today',
            'penyebab_meninggal' => 'nullable|string|max:255',
            'tempat_pemakaman'   => 'required|string|max:255',
        ], [
            'required'         => 'Kolom :attribute wajib diisi.',
            'date'             => 'Format tanggal tidak valid.',
            'before_or_equal'  => 'Tanggal tidak boleh melampaui hari ini.',
        ]);

        Kematian::create($validated);

        return redirect()->route('kematian.index')->with('success', 'Data kematian jemaat berhasil dicatat.');
    }

    public function show(string $id)
    {
        $kematian = Kematian::findOrFail($id);
        return view('kematian.show', compact('kematian'));
    }

    public function edit(string $id)
    {
        $kematian = Kematian::findOrFail($id);
        return view('kematian.edit', compact('kematian'));
    }

    public function update(Request $request, string $id)
    {
        $kematian = Kematian::findOrFail($id);

        $validated = $request->validate([
            'nama_jemaat'        => 'required|string|max:255',
            'tanggal_lahir'      => 'nullable|date|before_or_equal:today', // Validasi baru
            'tanggal_meninggal'  => 'required|date|before_or_equal:today',
            'tempat_pemakaman'   => 'required|string|max:255',
        ], [
            'required'         => 'Kolom :attribute wajib diisi.',
            'date'             => 'Format tanggal tidak valid.',
            'before_or_equal'  => 'Tanggal tidak boleh melampaui hari ini.',
        ]);

        $kematian->update($validated);

        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kematian = Kematian::findOrFail($id);
        $kematian->delete();

        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil dihapus.');
    }
}