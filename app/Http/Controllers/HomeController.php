<?php

namespace App\Http\Controllers;

use App\Models\Pernikahan;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Keluarga; // Ditambahkan
use App\Models\Jemaat;   // Ditambahkan
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data terbaru dari 5 model utama
        $pernikahan = Pernikahan::latest()->get();
        $kelahiran  = Kelahiran::latest()->get();
        $kematian   = Kematian::latest()->get();
        $keluarga   = Keluarga::latest()->get(); // Ditambahkan
        $jemaat     = Jemaat::latest()->get();   // Ditambahkan

        // Kirim semua variabel ke tampilan depan
        return view('home', compact('pernikahan', 'kelahiran', 'kematian', 'keluarga', 'jemaat'));
    }
}