@extends('layouts.app')

@section('title', 'Edit Data Jemaat - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <div class="container-fluid px-0" style="max-width: 800px;">
        
        <header class="card glass-card p-4 mb-4 border-0">
            <div class="row align-items-center g-3 text-center text-md-start">
                <div class="col-md-8">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: #ccfbf1; color: #115e59; font-size: 0.75rem;">Manajemen Jemaat</span>
                    <h1 class="h2 mb-1 fw-800 text-dark">Edit Data Jemaat</h1>
                    <p class="text-muted mb-0 small">Perbarui informasi profil dan status administratif warga jemaat.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="{{ route('jemaat.index') }}" class="btn btn-light border px-3 py-2.5 rounded-3 fw-semibold text-secondary small shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </header>

        <div class="card glass-card p-4 border-0">
            <div class="card-body p-2">
                <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST">
                    @csrf 
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $jemaat->nama_lengkap) }}" required>
                        @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keluarga_id" class="form-label fw-semibold">Hubungkan Ke Keluarga (KK)</label>
                        <select name="keluarga_id" id="keluarga_id" class="form-select">
                            <option value="">-- Pilih Kepala Keluarga (Opsional) --</option>
                            @foreach($keluargas as $k)
                                <option value="{{ $k->id }}" {{ old('keluarga_id', $jemaat->keluarga_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kepala_keluarga }} (KK: {{ $k->no_kk }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_l" value="L" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'L' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p" value="P" {{ old('jenis_kelamin', $jemaat->jenis_kelamin) == 'P' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="jk_p">Perempuan</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tempat_lahir" class="form-label fw-semibold">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $jemaat->tempat_lahir) }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="status_baptis" class="form-label fw-semibold">Status Baptis</label>
                            <select name="status_baptis" id="status_baptis" class="form-select" required>
                                <option value="Belum" {{ old('status_baptis', $jemaat->status_baptis) == 'Belum' ? 'selected' : '' }}>Belum Baptis</option>
                                <option value="Sudah" {{ old('status_baptis', $jemaat->status_baptis) == 'Sudah' ? 'selected' : '' }}>Sudah Baptis</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="status_sidi" class="form-label fw-semibold">Status Sidi</label>
                            <select name="status_sidi" id="status_sidi" class="form-select" required>
                                <option value="Belum" {{ old('status_sidi', $jemaat->status_sidi) == 'Belum' ? 'selected' : '' }}>Belum Sidi</option>
                                <option value="Sudah" {{ old('status_sidi', $jemaat->status_sidi) == 'Sudah' ? 'selected' : '' }}>Sudah Sidi</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.05);">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('jemaat.index') }}" class="btn btn-light border px-4 py-2.5 rounded-3 text-secondary fw-semibold">Batal</a>
                        <button type="submit" class="btn py-2.5 px-4 rounded-3 text-white fw-bold shadow-sm" style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border: none;">
                            <i class="bi bi-cloud-arrow-up-fill me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection