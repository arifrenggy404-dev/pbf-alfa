<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Disesuaikan dengan spesifikasi Modul Kelahiran jemaat.
     */
    protected $fillable = [
        'nama_anak',
        'nama_orang_tua',
        'tanggal_lahir',
        'jenis_kelamin',
        'keterangan'
    ];
}