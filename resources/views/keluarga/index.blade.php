@extends('layouts.app')

@section('title', 'Daftar Keluarga - GKS Hibuwundu')

@section('content')
<div class="main-wrapper">
    <header class="card glass-card p-4 mb-4 border-0">
        <div class="row align-items-center g-4">
            <div class="col-md-7 text-center text-md-start">
                <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: rgba(13, 148, 136, 0.1); color: #0d9488; font-size: 0.75rem;">
                    <i class="bi bi-people-fill me-1"></i> Sirkulasi Jemaat
                </span>
                <h1 class="h2 mb-1 fw-800 text-dark">Data Keluarga</h1>
                <p class="text-muted mb-0 small">Manajemen berkas Kartu Keluarga (KK) Jemaat GKS Hibuwundu.</p>
            </div>
            <div class="col-md-5 text-center text-md-end">
                <div class="d-inline-flex gap-2">
                    <button onclick="window.print()" class="btn btn-outline-secondary px-3 py-2.5 rounded-3 fw-semibold small shadow-sm no-print">
                        <i class="bi bi-printer-fill me-1"></i> Cetak
                    </button>

                    <a href="{{ route('keluarga.create') }}" class="btn py-2.5 px-4 rounded-3 text-white fw-semibold shadow-sm" style="background: var(--accent-color); border: none;">
                        <i class="bi bi-plus-circle-fill"></i> Tambah
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="card glass-card p-4 border-0">
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control py-2 shadow-sm border-0" 
                   placeholder="🔍 Cari nomor KK atau nama kepala keluarga..." onkeyup="filterTable()">
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 p-3 mb-4 d-flex align-items-center" style="background-color: rgba(13, 148, 136, 0.1); color: #0d9488;">
                <i class="bi bi-check-circle-fill me-3 fs-5"></i>
                <div class="flex-grow-1 fw-semibold small">{{ session('success') }}</div>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="keluargaTable">
                <thead>
                    <tr style="border-bottom: 2px solid rgba(0,0,0,0.06); color: #475569; font-size: 0.9rem;">
                        <th class="py-3 fw-bold">#</th>
                        <th class="py-3 fw-bold">Nomor KK</th>
                        <th class="py-3 fw-bold">Nama Kepala Keluarga</th>
                        <th class="py-3 fw-bold">Alamat</th>
                        <th class="py-3 fw-bold text-center">Jumlah Anggota</th>
                        <th class="py-3 fw-bold text-center no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody style="font-size: 0.95rem; color: #334155;">
                    @forelse ($keluargas as $keluarga)
                    <tr style="border-bottom: 1px solid rgba(0,0,0,0.04);">
                        <td class="py-3 fw-semibold text-muted">{{ $loop->iteration }}</td>
                        <td class="py-3">
                            <span class="badge font-monospace px-2.5 py-2 rounded-3" style="background: #f1f5f9; color: #334155; border: 1px solid rgba(0,0,0,0.05); font-size: 0.85rem;">
                                {{ $keluarga->no_kk }}
                            </span>
                        </td>
                        <td class="py-3 text-dark fw-bold">{{ $keluarga->nama_kepala_keluarga }}</td>
                        <td class="py-3 text-secondary small"><i class="bi bi-geo-alt text-muted me-1"></i> {{ $keluarga->alamat }}</td>
                        <td class="py-3 text-center">
                            <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background: rgba(13, 148, 136, 0.1); color: #0d9488; font-size: 0.8rem;">
                                <i class="bi bi-people-fill me-1"></i> {{ $keluarga->jumlah_anggota }} Orang
                            </span>
                        </td>
                        <td class="py-3 text-center no-print">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('keluarga.edit', $keluarga->id) }}" class="text-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('keluarga.destroy', $keluarga->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="m-0">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-danger border-0 bg-transparent"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted py-5">Data keluarga tidak ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @media print {
        .sidebar, .btn, .alert, .no-print, #searchInput { display: none !important; }
        .main-wrapper { margin-left: 0 !important; padding: 20px !important; }
        .glass-card { background: white !important; border: 1px solid #ddd !important; box-shadow: none !important; }
        table { width: 100% !important; }
        body { background: white !important; }
    }
</style>

<script>
    function filterTable() {
        let input = document.getElementById("searchInput");
        let filter = input.value.toLowerCase();
        let table = document.getElementById("keluargaTable");
        let tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            let rowText = tr[i].textContent || tr[i].innerText;
            if (rowText.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>
@endsection