<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Disesuaikan dengan spesifikasi Modul Pernikahan jemaat.
     */
    protected $fillable = [
        'nama_suami',
        'nama_istri',
        'tanggal_pernikahan',
        'tempat_pernikahan',
        'keterangan'
    ];
}