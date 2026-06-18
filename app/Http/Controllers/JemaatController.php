<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Keluarga; // Pastikan model Keluarga di-import jika dipakai
use Illuminate\Http\Request;

class JemaatController extends Controller
{
    // 1. Menampilkan Semua Data Jemaat di halaman Index
    public function index()
    {
        // Mengambil semua data jemaat beserta relasi keluarganya
        $jemaats = Jemaat::with('keluarga')->get();
        
        return view('jemaat.index', compact('jemaats'));
    }

    // 2. Menampilkan Form Edit Jemaat
    public function edit($id)
    {
        // Cari data jemaat berdasarkan ID, jika tidak ada langsung muncul error 404
        $jemaat = Jemaat::findOrFail($id);
        
        // Ambil data keluarga untuk pilihan select option di form edit
        $keluargas = Keluarga::all();

        return view('jemaat.edit', compact('jemaat', 'keluargas'));
    }

    // =========================================================================
    // BARU: Fungsi untuk memproses data edit dan menyimpannya sebagai data baru
    // =========================================================================
    public function update(Request $request, $id)
    {
        // Cari data jemaat yang sedang di-edit berdasarkan ID
        $jemaat = Jemaat::findOrFail($id);

        // Validasi data inputan sesuai form edit kamu
        $validatedData = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'keluarga_id'    => 'nullable|exists:keluargas,id',
            'jenis_kelamin'  => 'required|in:L,P',
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'status_baptis'  => 'required|in:Belum,Sudah',
            'status_sidi'    => 'required|in:Belum,Sudah',
        ]);

        // Siasati kolom alamat & no_hp jika di struktur database bersifat NOT NULL (Wajib diisi)
        $validatedData['alamat'] = $jemaat->alamat ?? '-';
        $validatedData['no_hp']  = $jemaat->no_hp ?? '-';

        // Update data jemaat di database dengan data yang baru di-input
        $jemaat->update($validatedData);

        // Kembalikan ke halaman daftar jemaat dengan pesan sukses
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil diperbarui dengan data terbaru!');
    }

    // 3. Menampilkan Form Tambah Jemaat
    public function create()
    {
        $keluargas = Keluarga::all(); // Mengambil data KK untuk pilihan di select option
        return view('jemaat.create', compact('keluargas'));
    }

    // 4. Menghapus Data Jemaat
    public function destroy($id)
    {
        $jemaat = Jemaat::findOrFail($id);
        
        // Hapus data jemaat
        $jemaat->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus!');
    }

    // 5. Menyimpan Data dari Form Create ke Database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'keluarga_id'    => 'nullable|exists:keluargas,id',
            'jenis_kelamin'  => 'required|in:L,P',
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'status_baptis'  => 'required|in:Belum,Sudah',
            'status_sidi'    => 'required|in:Belum,Sudah',
        ]);

        // Simpan ke database
        Jemaat::create($validatedData);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil ditambahkan!');
    }
}