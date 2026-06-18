<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    // Daftarkan semua kolom database yang diisi dari form create
    protected $fillable = [
        'nama_lengkap',
        'keluarga_id',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_baptis',
        'status_sidi'
    ];

    // Relasi ke model Keluarga
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id');
    }
}