@extends('layouts.app')

@section('title', 'Tambah Jemaat Baru - GKS Tanau')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<style>
    /* VARIABEL UTAMA - DISERASIKAN KE TEAL/EMERALD MODERN */
    :root {
        --sidebar-width: 280px;
        --accent-color: #0d9488; /* Menggunakan Teal/Emerald modern */
        --bg-main: #f3f4f6;
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.6);
    }

    body { 
        background-color: var(--bg-main); 
        color: #334155;
    }

    /* Aurora Background Blur Effect */
    .main-wrapper::before, .main-wrapper::after {
        content: ""; position: fixed; width: 500px; height: 500px; z-index: -1; pointer-events: none;
    }
    .main-wrapper::before { top: -150px; right: -100px; background: radial-gradient(circle, rgba(13, 148, 136, 0.1) 0%, transparent 70%); }
    .main-wrapper::after { width: 600px; height: 600px; bottom: -200px; left: 380px; background: radial-gradient(circle, rgba(13, 148, 136, 0.06) 0%, transparent 70%); }

    /* PREMIUM SIDEBAR STYLE */
    .sidebar {
        width: var(--sidebar-width); 
        height: 100vh; 
        position: fixed; 
        top: 0; 
        left: 0;
        background: linear-gradient(180deg, #0f172a 0%, #115e59 100%); /* Gradasi gelap ke teal tua */
        color: #94a3b8;
        z-index: 1000; 
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 4px 0 24px rgba(15, 23, 42, 0.15);
    }
    .sidebar-brand { padding: 32px 28px; font-size: 1.25rem; font-weight: 800; color: #fff; letter-spacing: -0.5px; border-bottom: 1px solid rgba(255, 255, 255, 0.06); }
    .sidebar-menu { padding: 24px 16px; list-style: none; margin: 0; }
    .sidebar-link { display: flex; align-items: center; padding: 14px 18px; color: #94a3b8; text-decoration: none; border-radius: 12px; font-weight: 600; font-size: 0.95rem; transition: all 0.25s; }
    .sidebar-link i { font-size: 1.25rem; margin-right: 14px; transition: transform 0.25s; }
    .sidebar-link:hover { background: rgba(255, 255, 255, 0.05); color: #f8fafc; }
    .sidebar-link:hover i { transform: scale(1.1); }
    .sidebar-link.active { background: linear-gradient(135deg, var(--accent-color) 0%, #0f766e 100%); color: #fff; box-shadow: 0 8px 20px rgba(13, 148, 136, 0.25); }

    .logout-box { padding: 0 16px; position: absolute; bottom: 30px; width: 100%; }
    .btn-logout-sidebar { width: 100%; display: flex; align-items: center; padding: 14px 18px; color: #cbd5e1; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; font-weight: 600; font-size: 0.95rem; transition: all 0.3s; }
    .btn-logout-sidebar i { font-size: 1.25rem; margin-right: 14px; color: #f43f5e; transition: transform 0.3s; }
    .btn-logout-sidebar:hover { background: rgba(244, 63, 94, 0.1); border-color: rgba(244, 63, 94, 0.2); color: #fff; }
    .btn-logout-sidebar:hover i { transform: translateX(3px); }

    /* LAYOUT KONTEN UTAMA AGAR TIDAK TERTUTUP SIDEBAR */
    .main-wrapper {
        margin-left: var(--sidebar-width);
        padding: 40px 30px;
        transition: all 0.4s;
        min-height: 100vh;
    }

    /* FORM & GLASSMORPHISM CARD STYLING */
    .card-premium { 
        background: var(--glass-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid var(--glass-border) !important; 
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03); 
    }
    .card-premium-header { 
        background: linear-gradient(135deg, var(--accent-color) 0%, #0f766e 100%); 
        color: white; 
        border-radius: 23px 23px 0 0 !important;
    }
    .form-label {
        color: #475569;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }
    .form-control, .form-select {
        border-radius: 12px;
        padding: 12px 16px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        background-color: rgba(255, 255, 255, 0.5);
        font-size: 0.95rem;
        transition: all 0.2s ease-in-out;
        color: #334155;
    }
    .form-control:focus, .form-select:focus {
        background-color: #fff;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.15);
        color: #0f172a;
    }
    .form-check-input:checked {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }
    .form-check-label {
        font-size: 0.95rem;
        color: #334155;
        cursor: pointer;
    }
    .invalid-feedback {
        font-size: 0.85rem;
        margin-top: 6px;
        font-weight: 500;
    }
    .btn-premium {
        background: linear-gradient(135deg, var(--accent-color) 0%, #0f766e 100%);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        transition: all 0.25s;
    }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        color: white;
    }
    .btn-back {
        border-radius: 12px;
        padding: 12px 20px;
        font-weight: 600;
        transition: all 0.2s;
    }

    /* RESPONSIVE LAYOUT UNTUK LAYAR KECIL */
    @media (max-width: 991.98px) {
        .sidebar { left: -var(--sidebar-width); }
        .sidebar.show { left: 0; }
        .main-wrapper { margin-left: 0; padding: 20px 15px; }
        .logout-box { position: static; padding: 24px 16px; }
    }
</style>
@endpush

@section('content')
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand d-flex align-items-center">
        <div class="p-2 bg-warning bg-opacity-10 rounded-3 me-3 d-inline-flex">
            <i class="bi bi-church text-warning m-0 lh-1"></i>
        </div>
        <span>GKS Hibuwundu</span>
    </div>
    <ul class="sidebar-menu">
        @php
            $menus = [
                ['url' => '/dashboard', 'icon' => 'bi-speedometer2', 'title' => 'Dashboard'],
                ['route' => 'keluarga.index', 'icon' => 'bi-folder2-open', 'title' => 'Data Keluarga'],
                ['route' => 'jemaat.index', 'icon' => 'bi-person-badge', 'title' => 'Data Jemaat', 'active' => true],
                ['route' => 'kelahiran.index', 'icon' => 'bi-heart-pulse', 'title' => 'Data Kelahiran'],
                ['route' => 'pernikahan.index', 'icon' => 'bi-infinity', 'title' => 'Data Pernikahan'],
                ['route' => 'kematian.index', 'icon' => 'bi-moon-stars', 'title' => 'Berita Kematian'],
            ];
        @endphp
        @foreach($menus as $menu)
            <li class="sidebar-item">
                <a class="sidebar-link {{ isset($menu['active']) ? 'active' : '' }}" href="{{ isset($menu['url']) ? url($menu['url']) : route($menu['route']) }}">
                    <i class="bi {{ $menu['icon'] }}"></i> {{ $menu['title'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="logout-box">
        <form action="/logout" method="POST" id="logoutForm">
            @csrf
            <button type="submit" class="btn-logout-sidebar border-0">
                <i class="bi bi-box-arrow-right"></i> Keluar / Logout
            </button>
        </form>
    </div>
</aside>

<div class="main-wrapper">
    <div class="d-md-none mb-4">
        <button class="btn btn-light border shadow-sm px-3 py-2 rounded-3 text-secondary" type="button" onclick="document.getElementById('sidebar').classList.toggle('show')">
            <i class="bi bi-text-left fs-4 align-middle me-1"></i> Panel Menu
        </button>
    </div>

    <div class="container-fluid" style="max-width: 850px; margin-top: 10px;">
        
        <div class="mb-4 text-start pl-2">
            <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: #ccfbf1; color: #115e59; font-size: 0.75rem;">Formulir Entri</span>
            <h2 class="h3 fw-800 text-dark m-0">Registrasi Warga Jemaat</h2>
        </div>

        <div class="card card-premium">
            <div class="card-premium-header py-4 px-4 shadow-sm">
                <h3 class="h5 mb-0 d-flex align-items-center fw-bold">
                    <i class="bi bi-person-plus-fill me-3 fs-4"></i> Tambah Jemaat Baru
                </h3>
            </div>
            
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('jemaat.store') }}" method="POST">
                    @csrf 

                    <div class="mb-4">
                        <label for="nama_lengkap" class="form-label fw-semibold">
                            <i class="bi bi-person-fill text-secondary me-1"></i> Nama Lengkap
                        </label>
                        <input type="text" 
                               name="nama_lengkap" 
                               id="nama_lengkap" 
                               class="form-control @error('nama_lengkap') is-invalid @enderror" 
                               placeholder="Masukkan nama lengkap jemaat baru" 
                               value="{{ old('nama_lengkap') }}" 
                               required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keluarga_id" class="form-label fw-semibold">
                            <i class="bi bi-house-heart-fill text-secondary me-1"></i> Hubungkan Ke Keluarga (KK)
                        </label>
                        <select name="keluarga_id" id="keluarga_id" class="form-select @error('keluarga_id') is-invalid @enderror">
                            <option value="">-- Pilih Kepala Keluarga (Opsional) --</option>
                            @foreach($keluargas as $k)
                                <option value="{{ $k->id }}" {{ old('keluarga_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kepala_keluarga }} (KK: {{ $k->no_kk }})
                                </option>
                            @endforeach
                        </select>
                        @error('keluarga_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block">
                            <i class="bi bi-gender-ambiguous text-secondary me-1"></i> Jenis Kelamin
                        </label>
                        <div class="form-check form-check-inline mt-1">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jk_l" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jk_p" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="jk_p">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger small mt-2 d-block fw-semibold"><i class="bi bi-exclamation-circle me-1"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="tempat_lahir" class="form-label fw-semibold">
                                <i class="bi bi-geo-alt-fill text-secondary me-1"></i> Tempat Lahir
                            </label>
                            <input type="text" 
                                   name="tempat_lahir" 
                                   id="tempat_lahir" 
                                   class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                   placeholder="Contoh: Waingapu" 
                                   value="{{ old('tempat_lahir') }}" 
                                   required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir" class="form-label fw-semibold">
                                <i class="bi bi-calendar-event-fill text-secondary me-1"></i> Tanggal Lahir
                            </label>
                            <input type="date" 
                                   name="tanggal_lahir" 
                                   id="tanggal_lahir" 
                                   class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                   value="{{ old('tanggal_lahir') }}" 
                                   required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="status_baptis" class="form-label fw-semibold">
                                <i class="bi bi-droplet-fill text-secondary me-1"></i> Status Baptis
                            </label>
                            <select name="status_baptis" id="status_baptis" class="form-select" required>
                                <option value="Belum" {{ old('status_baptis') == 'Belum' ? 'selected' : '' }}>Belum Baptis</option>
                                <option value="Sudah" {{ old('status_baptis') == 'Sudah' ? 'selected' : '' }}>Sudah Baptis</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status_sidi" class="form-label fw-semibold">
                                <i class="bi bi-award-fill text-secondary me-1"></i> Status Sidi
                            </label>
                            <select name="status_sidi" id="status_sidi" class="form-select" required>
                                <option value="Belum" {{ old('status_sidi') == 'Belum' ? 'selected' : '' }}>Belum Sidi</option>
                                <option value="Sudah" {{ old('status_sidi') == 'Sudah' ? 'selected' : '' }}>Sudah Sidi</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: rgba(0,0,0,0.06);">

                     <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('kelahiran.index') }}" class="btn btn-light px-4 rounded-3 text-secondary fw-semibold">Kembali</a>
                        <button type="submit" class="btn py-2.5 px-4 rounded-3 text-white fw-bold shadow-sm" 
                        style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border: none;">
                            <i class="bi bi-floppy me-1"></i> Simpan Jemaat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection