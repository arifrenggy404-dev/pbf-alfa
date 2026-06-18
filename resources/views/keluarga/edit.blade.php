@extends('layouts.app')

@section('title', 'Edit Data Keluarga - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <div class="container-fluid px-0" style="max-width: 800px;">
        
        <header class="card glass-card p-4 mb-4 border-0">
            <div class="row align-items-center g-3 text-center text-md-start">
                <div class="col-md-8">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: rgba(13, 148, 136, 0.1); color: #0d9488; font-size: 0.75rem;">Form Pembaruan</span>
                    <h1 class="h2 mb-1 fw-800 text-dark">Edit Data Keluarga</h1>
                    <p class="text-muted mb-0 small">Ubah informasi berkas Kartu Keluarga jemaat GKS Hibuwundu.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="{{ route('keluarga.index') }}" class="btn btn-light border px-3 py-2.5 rounded-3 fw-semibold text-secondary small shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </header>

        <div class="card glass-card p-4 border-0">
            <div class="card-body p-2">
                <form action="{{ route('keluarga.update', $keluarga->id) }}" method="POST">
                    @csrf 
                    @method('PUT')

                    <div class="mb-4">
                        <label for="no_kk" class="form-label fw-semibold">Nomor KK</label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control font-monospace @error('no_kk') is-invalid @enderror" value="{{ old('no_kk', $keluarga->no_kk) }}" required>
                        @error('no_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_kepala_keluarga" class="form-label fw-semibold">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" value="{{ old('nama_kepala_keluarga', $keluarga->nama_kepala_keluarga) }}" required>
                        @error('nama_kepala_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold">Alamat Rumah</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $keluarga->alamat) }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jumlah_anggota" class="form-label fw-semibold">Jumlah Anggota Keluarga</label>
                        <input type="number" name="jumlah_anggota" id="jumlah_anggota" class="form-control @error('jumlah_anggota') is-invalid @enderror" value="{{ old('jumlah_anggota', $keluarga->jumlah_anggota) }}" required>
                        @error('jumlah_anggota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                        <a href="{{ route('keluarga.index') }}" class="btn btn-light px-4 py-2 rounded-3 text-secondary fw-semibold">Batal</a>
                        <button type="submit" class="btn py-2 px-4 rounded-3 text-white fw-bold" style="background: var(--accent-color);">
                            <i class="bi bi-cloud-arrow-up-fill me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection