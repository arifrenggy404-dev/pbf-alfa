<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Jemaat;
use App\Models\Kelahiran;
use App\Models\Pernikahan;
use App\Models\Kematian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total baris data yang tersimpan di masing-masing tabel database
        $totalKeluarga   = Keluarga::count();
        $totalJemaat     = Jemaat::count();
        $totalKelahiran  = Kelahiran::count();
        $totalPernikahan = Pernikahan::count();
        $totalKematian   = Kematian::count();

        // Mengirimkan semua variabel ke file blade dashboard
        return view('dashboard', compact(
            'totalKeluarga', 
            'totalJemaat', 
            'totalKelahiran', 
            'totalPernikahan', 
            'totalKematian'
        ));
    }
}