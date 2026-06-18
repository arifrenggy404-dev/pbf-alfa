@extends('layouts.app')

@section('title', 'Tambah Data Pernikahan - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <div class="container-fluid px-0" style="max-width: 850px;">
        
        <header class="card glass-card p-4 mb-4 border-0">
            <div class="row align-items-center g-3 text-center text-md-start">
                <div class="col-md-8">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: #e0e7ff; color: #4338ca; font-size: 0.75rem;">Input Baru</span>
                    <h1 class="h2 mb-1 fw-800 text-dark">Tambah Data Pernikahan</h1>
                    <p class="text-muted mb-0 small">Daftarkan pencatatan berkas nikah resmi jemaat GKS Hibuwundu.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="{{ route('pernikahan.index') }}" class="btn btn-light border px-3 py-2.5 rounded-3 fw-semibold text-secondary small shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </header>

        <div class="card glass-card p-4 border-0">
            <div class="card-body p-2">
                <form action="{{ route('pernikahan.store') }}" method="POST">
                    @csrf 

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nama_suami" class="form-label">
                                <i class="bi bi-person-fill text-primary me-1"></i> Nama Suami (Mempelai Pria)
                            </label>
                            <input type="text" name="nama_suami" id="nama_suami" class="form-control @error('nama_suami') is-invalid @enderror" value="{{ old('nama_suami') }}" placeholder="Masukkan nama lengkap suami" required>
                            @error('nama_suami') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="nama_istri" class="form-label">
                                <i class="bi bi-person-fill text-danger me-1"></i> Nama Istri (Mempelai Wanita)
                            </label>
                            <input type="text" name="nama_istri" id="nama_istri" class="form-control @error('nama_istri') is-invalid @enderror" value="{{ old('nama_istri') }}" placeholder="Masukkan nama lengkap istri" required>
                            @error('nama_istri') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_pernikahan" class="form-label">
                                <i class="bi bi-calendar-heart text-muted me-1"></i> Tanggal Pernikahan
                            </label>
                            <input type="date" name="tanggal_pernikahan" id="tanggal_pernikahan" class="form-control @error('tanggal_pernikahan') is-invalid @enderror" value="{{ old('tanggal_pernikahan') }}" required>
                            @error('tanggal_pernikahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="tempat_pernikahan" class="form-label">
                                <i class="bi bi-geo-alt-fill text-muted me-1"></i> Tempat Pernikahan
                            </label>
                            <input type="text" name="tempat_pernikahan" id="tempat_pernikahan" class="form-control @error('tempat_pernikahan') is-invalid @enderror" value="{{ old('tempat_pernikahan') }}" placeholder="Misal: Gedung Gereja, Aula, dll" required>
                            @error('tempat_pernikahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label">
                            <i class="bi bi-chat-square-dots text-muted me-1"></i> Keterangan <span class="text-muted fw-normal">(Opsional)</span>
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan catatan atau keterangan tambahan jika ada">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr style="border-color: rgba(0, 0, 0, 0.05); margin: 30px 0;">

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('kelahiran.index') }}" class="btn btn-light px-4 rounded-3 text-secondary fw-semibold">Kembali</a>
                        <button type="submit" class="btn py-2.5 px-4 rounded-3 text-white fw-bold shadow-sm" 
                        style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border: none;">
                            <i class="bi bi-floppy me-1"></i> Simpan Data Pernikahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection