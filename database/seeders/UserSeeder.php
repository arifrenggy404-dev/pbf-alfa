<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Putri - Admin GKS Tanau',
            'email' => 'putri@gmail.com',
            'password' => Hash::make('123456789'), // Menggunakan Hash::make (standar keamanan Laravel)
            'role' => 'Admin',                     // Menentukan hak akses sesuai migrasi baru
            'no_hp' => '081234567890',              // Contoh nomor kontak pengelola
        ]);
    }
}