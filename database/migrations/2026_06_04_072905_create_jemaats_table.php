<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jemaats', function (Blueprint $table) {
    $table->id();
    $table->foreignId('keluarga_id')->nullable()->constrained()->onDelete('set null');
    $table->string('nama_lengkap');
    $table->enum('jenis_kelamin', ['L', 'P']);
    $table->string('tempat_lahir');
    $table->date('tanggal_lahir');
    $table->enum('status_baptis', ['Sudah', 'Belum'])->default('Belum');
    $table->enum('status_sidi', ['Sudah', 'Belum'])->default('Belum');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaats');
    }
};
