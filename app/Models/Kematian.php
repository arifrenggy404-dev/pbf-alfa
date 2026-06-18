<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'nama_jemaat',
        'tanggal_lahir', // Menggantikan keterangan
        'tanggal_meninggal',
        'tempat_pemakaman'
    ];
}