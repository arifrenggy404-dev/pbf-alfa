@extends('layouts.app')

@section('title', 'Tambah Data Kematian - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <div class="container-fluid px-0" style="max-width: 800px;">
        
        <header class="card glass-card p-4 mb-4 border-0">
            <div class="row align-items-center g-3 text-center text-md-start">
                <div class="col-md-8">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: #f1f5f9; color: #475569; font-size: 0.75rem;">Input Baru</span>
                    <h1 class="h2 mb-1 fw-800 text-dark">Tambah Data Kematian</h1>
                    <p class="text-muted mb-0 small">Daftarkan sirkulasi berkas berita duka warga jemaat GKS Hibuwundu.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="{{ route('kematian.index') }}" class="btn btn-light border px-3 py-2.5 rounded-3 fw-semibold text-secondary small shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </header>

        <div class="card glass-card p-4 border-0">
            <div class="card-body p-2">
                <form action="{{ route('kematian.store') }}" method="POST">
                    @csrf 

                    <div class="mb-4">
                        <label for="nama_jemaat" class="form-label fw-semibold">
                            <i class="bi bi-person-fill text-secondary me-1"></i> Nama Jemaat
                        </label>
                        <input type="text" name="nama_jemaat" id="nama_jemaat" class="form-control @error('nama_jemaat') is-invalid @enderror" value="{{ old('nama_jemaat') }}" placeholder="Masukkan nama lengkap jemaat yang meninggal" required>
                        @error('nama_jemaat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_lahir" class="form-label fw-semibold">
                                <i class="bi bi-calendar-minus text-muted me-1"></i> Tanggal Lahir <span class="text-muted fw-normal">(Opsional)</span>
                            </label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="tanggal_meninggal" class="form-label fw-semibold">
                                <i class="bi bi-calendar-x text-danger me-1"></i> Tanggal Meninggal
                            </label>
                            <input type="date" name="tanggal_meninggal" id="tanggal_meninggal" class="form-control @error('tanggal_meninggal') is-invalid @enderror" value="{{ old('tanggal_meninggal') }}" required>
                            @error('tanggal_meninggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_pemakaman" class="form-label fw-semibold">
                            <i class="bi bi-geo-alt text-muted me-1"></i> Tempat Pemakaman
                        </label>
                        <input type="text" name="tempat_pemakaman" id="tempat_pemakaman" class="form-control @error('tempat_pemakaman') is-invalid @enderror" value="{{ old('tempat_pemakaman') }}" placeholder="Masukkan lokasi atau nama tempat pemakaman" required>
                        @error('tempat_pemakaman') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.05);">

                     <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('kelahiran.index') }}" class="btn btn-light px-4 rounded-3 text-secondary fw-semibold">Kembali</a>
                        <button type="submit" class="btn py-2.5 px-4 rounded-3 text-white fw-bold shadow-sm" 
                        style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border: none;">
                            <i class="bi bi-floppy me-1"></i> Simpan Data Kematian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection