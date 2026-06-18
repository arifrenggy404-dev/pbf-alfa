@extends('layouts.app')

@section('title', 'Edit Data Kelahiran - GKS Tanau')

@push('styles')
<style>
    /* Menggunakan variabel yang sama dengan halaman index */
    :root {
        --accent-color: #0d9488;
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.6);
    }

    .main-wrapper {
        margin-left: 280px;
        padding: 40px 30px;
        transition: all 0.4s;
    }

    .glass-card { 
        background: var(--glass-bg); 
        backdrop-filter: blur(12px); 
        -webkit-backdrop-filter: blur(12px); 
        border: 1px solid var(--glass-border) !important; 
        border-radius: 24px; 
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03); 
    }

    .form-control, .form-select {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        padding: 12px 16px;
    }

    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
    }

    .btn-save {
        background: linear-gradient(135deg, var(--accent-color) 0%, #0f766e 100%);
        color: white;
        border-radius: 12px;
        padding: 12px 24px;
        border: none;
        transition: all 0.3s;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(13, 148, 136, 0.2);
        color: white;
    }
</style>
@endpush

@section('content')
<div class="main-wrapper">
    <div class="container-fluid" style="max-width: 800px;">
        
        <div class="card glass-card border-0 overflow-hidden">
            <div class="p-4 text-white" style="background: linear-gradient(135deg, var(--accent-color) 0%, #0f766e 100%);">
                <h2 class="h4 mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Data Kelahiran</h2>
            </div>
            
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('kelahiran.update', $kelahiran->id) }}" method="POST">
                    @csrf 
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-12 mb-2">
                            <label for="nama_anak" class="form-label fw-bold small text-muted">Nama Anak</label>
                            <input type="text" name="nama_anak" id="nama_anak" class="form-control @error('nama_anak') is-invalid @enderror" value="{{ old('nama_anak', $kelahiran->nama_anak) }}" required>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="nama_orang_tua" class="form-label fw-bold small text-muted">Nama Orang Tua</label>
                            <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control @error('nama_orang_tua') is-invalid @enderror" value="{{ old('nama_orang_tua', $kelahiran->nama_orang_tua) }}" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="tanggal_lahir" class="form-label fw-bold small text-muted">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $kelahiran->tanggal_lahir) }}" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold small text-muted d-block">Jenis Kelamin</label>
                            <div class="d-flex gap-3 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_l" value="L" {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'L' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jk_l">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p" value="P" {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'P' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jk_p">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="keterangan" class="form-label fw-bold small text-muted">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{ old('keterangan', $kelahiran->keterangan) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('kelahiran.index') }}" class="btn btn-light px-4 rounded-3 text-secondary fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-save px-4 fw-bold">
                            <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection