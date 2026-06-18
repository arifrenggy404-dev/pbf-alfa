@extends('layouts.app')

@section('title', 'Tambah Data Keluarga - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <div class="container-fluid px-0" style="max-width: 800px;">
        
        <header class="card glass-card p-4 mb-4 border-0">
            <div class="row align-items-center g-3 text-center text-md-start">
                <div class="col-md-8">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: rgba(99, 102, 241, 0.1); color: #6366f1; font-size: 0.75rem;">Input Baru</span>
                    <h1 class="h2 mb-1 fw-800 text-dark">Tambah Data Keluarga</h1>
                    <p class="text-muted mb-0 small">Daftarkan berkas Kartu Keluarga (KK) baru untuk warga jemaat GKS Hibuwundu.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="{{ route('keluarga.index') }}" class="btn btn-light border px-3 py-2.5 rounded-3 fw-semibold text-secondary small shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </header>

        <div class="card glass-card p-4 border-0">
            <div class="card-body p-2">
                <form action="{{ route('keluarga.store') }}" method="POST">
                    @csrf 

                    <div class="mb-4">
                        <label for="no_kk" class="form-label fw-semibold">
                            <i class="bi bi-card-text text-secondary me-1"></i> Nomor KK (Kartu Keluarga)
                        </label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control font-monospace @error('no_kk') is-invalid @enderror" value="{{ old('no_kk') }}" placeholder="Masukkan 16 digit nomor KK" required>
                        @error('no_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_kepala_keluarga" class="form-label fw-semibold">
                            <i class="bi bi-person-fill text-secondary me-1"></i> Nama Kepala Keluarga
                        </label>
                        <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" value="{{ old('nama_kepala_keluarga') }}" placeholder="Masukkan nama lengkap kepala keluarga" required>
                        @error('nama_kepala_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold">
                            <i class="bi bi-geo-alt-fill text-secondary me-1"></i> Alamat Rumah
                        </label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jumlah_anggota" class="form-label fw-semibold">
                            <i class="bi bi-people-fill text-secondary me-1"></i> Jumlah Anggota Keluarga Awal
                        </label>
                        <input type="number" name="jumlah_anggota" id="jumlah_anggota" class="form-control @error('jumlah_anggota') is-invalid @enderror" value="{{ old('jumlah_anggota', 0) }}" min="0" required>
                        <div class="form-text text-muted"><i class="bi bi-info-circle me-1"></i> Bisa diisi 0 jika nanti terhitung otomatis dari relasi data jemaat.</div>
                        @error('jumlah_anggota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.05);">

                     <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('kelahiran.index') }}" class="btn btn-light px-4 rounded-3 text-secondary fw-semibold">Kembali</a>
                        <button type="submit" class="btn py-2.5 px-4 rounded-3 text-white fw-bold shadow-sm" 
                        style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border: none;">
                            <i class="bi bi-floppy me-1"></i> Simpan Keluarga
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection