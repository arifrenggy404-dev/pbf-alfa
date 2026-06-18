@extends('layouts.app')

@section('title', 'Edit Data Pernikahan - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <div class="container-fluid px-0" style="max-width: 800px;">
        
        <header class="card glass-card p-4 mb-4 border-0">
            <div class="row align-items-center g-3">
                <div class="col-md-8 text-center text-md-start">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: #fef3c7; color: #d97706; font-size: 0.75rem;">Form Pembaruan</span>
                    <h1 class="h2 mb-1 fw-800 text-dark">Edit Data Pernikahan</h1>
                    <p class="text-muted mb-0 small">Perbarui rincian berkas pencatatan nikah resmi jemaat GKS Hibuwundu.</p>
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
                <form action="{{ route('pernikahan.update', $pernikahan->id) }}" method="POST">
                    @csrf 
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nama_suami" class="form-label fw-semibold">
                                <i class="bi bi-gender-male text-primary me-1"></i> Nama Suami (Mempelai Pria)
                            </label>
                            <input type="text" name="nama_suami" id="nama_suami" class="form-control @error('nama_suami') is-invalid @enderror" value="{{ old('nama_suami', $pernikahan->nama_suami) }}" required>
                            @error('nama_suami') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="nama_istri" class="form-label fw-semibold">
                                <i class="bi bi-gender-female text-danger me-1"></i> Nama Istri (Mempelai Wanita)
                            </label>
                            <input type="text" name="nama_istri" id="nama_istri" class="form-control @error('nama_istri') is-invalid @enderror" value="{{ old('nama_istri', $pernikahan->nama_istri) }}" required>
                            @error('nama_istri') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_pernikahan" class="form-label fw-semibold">
                                <i class="bi bi-calendar-check text-muted me-1"></i> Tanggal Pernikahan
                            </label>
                            <input type="date" name="tanggal_pernikahan" id="tanggal_pernikahan" class="form-control @error('tanggal_pernikahan') is-invalid @enderror" value="{{ old('tanggal_pernikahan', $pernikahan->tanggal_pernikahan) }}" required>
                            @error('tanggal_pernikahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="tempat_pernikahan" class="form-label fw-semibold">
                                <i class="bi bi-geo-alt text-muted me-1"></i> Tempat Pernikahan
                            </label>
                            <input type="text" name="tempat_pernikahan" id="tempat_pernikahan" class="form-control @error('tempat_pernikahan') is-invalid @enderror" value="{{ old('tempat_pernikahan', $pernikahan->tempat_pernikahan) }}" required>
                            @error('tempat_pernikahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label fw-semibold">
                            <i class="bi bi-chat-left-text text-muted me-1"></i> Keterangan <span class="text-muted fw-normal">(Opsional)</span>
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $pernikahan->keterangan) }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.08);">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('pernikahan.index') }}" class="btn btn-light border px-4 py-2.5 rounded-3 text-secondary fw-semibold">Batal</a>
                        <button type="submit" class="btn py-2.5 px-4 rounded-3 text-white fw-bold" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none;">
                            <i class="bi bi-cloud-arrow-up-fill me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection