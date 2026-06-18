<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Disesuaikan dengan spesifikasi Modul Keluarga jemaat.
     */
    protected $fillable = [
        'no_kk',
        'nama_kepala_keluarga',
        'alamat',
        'jumlah_anggota'
    ];

    /**
     * Relasi ke Model Jemaat (One to Many).
     * Menandakan bahwa satu keluarga memiliki banyak anggota jemaat.
     */
    public function jemaats(): HasMany
    {
        return $this->hasMany(Jemaat::class, 'keluarga_id');
    }
}