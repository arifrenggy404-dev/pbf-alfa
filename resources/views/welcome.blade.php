<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKS Hibuwundu - Cabang Tanau</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .hero-section {
            background: linear-gradient(rgba(111, 66, 193, 0.85), rgba(51, 30, 92, 0.9)), url('https://images.unsplash.com/photo-1548625361-155defe219f2?q=80&w=1200') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 80px 0;
        }
        .btn-purple { background-color: #6f42c1; color: white; font-weight: bold; }
        .btn-purple:hover { background-color: #5a32a3; color: white; }
        .text-purple { color: #6f42c1; }
        .card-info { border: none; border-radius: 12px; transition: transform 0.2s; }
        .card-info:hover { transform: translateY(-5px); }
        .nav-tabs .nav-link.active { background-color: #6f42c1; color: white; border-color: #6f42c1; }
        .nav-tabs .nav-link { color: #6f42c1; font-weight: bold; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-church text-warning me-2"></i>GKS Tanau
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#informasi-jemaat">Informasi Jemaat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jadwal-ibadah">Jadwal Ibadah</a></li>
                </ul>
                <div class="d-flex">
                    <a href="/login" class="btn btn-purple btn-sm px-4 rounded-pill shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Portal Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero-section text-center" id="beranda">
        <div class="container">
            <h1 class="display-5 fw-bold mb-2">GKS Hibuwundu</h1>
            <p class="lead mb-4">Portal Informasi Administrasi Jemaat Cabang Tanau</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-white-50 small">Halaman ini menyajikan data jemaat secara terbuka dan transparan yang bersumber langsung dari input data berkala oleh majelis dan admin pengelola gereja.</p>
                </div>
            </div>
            <a href="#informasi-jemaat" class="btn btn-warning fw-bold px-4 py-2 mt-3 text-dark rounded-pill shadow">
                Look Informasi Jemaat <i class="bi bi-arrow-down-short"></i>
            </a>
        </div>
    </div>

    <div class="container my-5" id="informasi-jemaat">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Pusat Data & Informasi Jemaat</h2>
            <p class="text-muted">Data mutasi sakramen dan pertumbuhan berkala warga jemaat GKS Tanau</p>
            <hr style="width: 60px; border: 2px solid #6f42c1; margin: 0 auto;">
        </div>

        <ul class="nav nav-tabs justify-content-center mb-4 shadow-sm rounded bg-white p-2 border-0" id="churchTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pernikahan-tab" data-bs-toggle="tab" data-bs-target="#pernikahan" type="button" role="tab"><i class="bi bi-heart-fill me-1"></i> Data Pernikahan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="baptis-tab" data-bs-toggle="tab" data-bs-target="#baptis" type="button" role="tab"><i class="bi bi-droplet-fill me-1"></i> Data Kelahiran/Baptis</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="duka-tab" data-bs-toggle="tab" data-bs-target="#duka" type="button" role="tab"><i class="bi bi-clipboard-x-fill me-1"></i> Berita Kematian</button>
            </li>
        </ul>

        <div class="tab-content bg-white p-4 rounded shadow-sm" id="churchTabsContent">
            
            <div class="tab-pane fade show active" id="pernikahan" role="tabpanel">
                <h4 class="fw-bold mb-3 text-purple"><i class="bi bi-heart-fill me-2"></i>Catatan Pernikahan Kudus</h4>
                <p class="text-muted small mb-4">Daftar jemaat yang telah melangsungkan atau mendaftarkan Pernikahan Kudus:</p>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">No</th>
                                <th>Mempelai Pria</th>
                                <th>Mempelai Wanita</th>
                                <th>Tanggal Pernikahan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pernikahan as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="fw-bold">{{ $data->nama_pria ?? $data->mempelai_pria }}</td>
                                    <td class="fw-bold">{{ $data->nama_wanita ?? $data->mempelai_wanita }}</td>
                                    <td>{{ isset($data->tanggal_nikah) ? date('d M Y', strtotime($data->tanggal_nikah)) : date('d M Y', strtotime($data->tanggal_pernikahan)) }}</td>
                                    <td><span class="badge bg-success">Tercatat</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada data pernikahan yang dimasukkan oleh admin.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="baptis" role="tabpanel">
                <h4 class="fw-bold mb-3 text-primary"><i class="bi bi-baby-carriage me-2"></i>Catatan Kelahiran</h4>
                <p class="text-muted small mb-4">Data kelahiran warga jemaat baru beserta status pelaksanaan sakramen baptis:</p>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Anak</th>
                                <th>Orang Tua</th>
                                <th>Tanggal Lahir</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kelahiran as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="fw-bold">{{ $data->nama_anak }}</td>
                                    <td>{{ $data->nama_orang_tua ?? $data->orang_tua }}</td>
                                    <td>{{ date('d M Y', strtotime($data->tanggal_lahir)) }}</td>
                                    <td><span class="badge bg-info">Tercatat</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada data kelahiran atau baptis yang dimasukkan oleh admin.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="duka" role="tabpanel">
                <h4 class="fw-bold mb-3 text-secondary"><i class="bi bi-journal-x me-2"></i>Berita Kemalangan (Meninggal Dunia)</h4>
                <p class="text-muted small mb-4">Mengenang saudara-saudari jemaat kita yang telah dipanggil kembali oleh Tuhan:</p>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Nama Jemaat</th>
                                <th width="10%">Usia</th>
                                <th width="15%">Tanggal Meninggal</th>
                                <th width="15%">Penyebab Meninggal</th>
                                <th width="15%">Tempat Pemakaman</th>
                                <th width="15%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kematian as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="fw-bold">{{ $data->nama_jemaat ?? $data->nama }}</td>
                                    <td>{{ $data->umur ?? $data->usia }} Tahun</td>
                                    <td>{{ date('d M Y', strtotime($data->tanggal_meninggal)) }}</td>
                                    <td>{{ $data->penyebab_meninggal ?? '-' }}</td>
                                    <td>{{ $data->tempat_pemakaman ?? '-' }}</td>
                                    <td>{{ $data->keterangan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Tidak ada berita duka/kemalangan yang tercatat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4" id="jadwal-ibadah">
            <div class="col-md-6 mb-4">
                <div class="card card-info bg-dark text-white p-4 h-100 shadow-sm">
                    <h4 class="fw-bold mb-3 text-warning"><i class="bi bi-clock me-2"></i>Jadwal Ibadah Minggu</h4>
                    <p class="mb-2"><i class="bi bi-calendar3 me-2"></i>Setiap Hari Minggu</p>
                    <p class="mb-2"><i class="bi bi-alarm me-2"></i>Ibadah I : 06.00 WITA (Bahasa Daerah/Indonesia)</p>
                    <p class="mb-4"><i class="bi bi-alarm me-2"></i>Ibadah II : 08.30 WITA (Bahasa Indonesia)</p>
                    <div class="alert alert-light bg-opacity-10 border-0 text-white-50 small mb-0">
                        <i class="bi bi-info-circle me-1 text-warning"></i> Harap jemaat hadir tepat waktu demi kelancaran jalannya ibadah kita bersama.
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card card-info bg-white p-4 h-100 shadow-sm border-0">
                    <h4 class="fw-bold mb-3 text-purple"><i class="bi bi-telephone me-2"></i>Kontak Sekretariat</h4>
                    <p class="text-muted small">Jika bapa/mama jemaat menemukan kekeliruan data atau mutasi berkas yang belum tercantum pada sistem informasi, silakan hubungi kontak tata usaha gereja:</p>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><i class="bi bi-geo-alt-fill text-purple me-2"></i> Sumba Timur, Waingapu, Cabang Tanau</li>
                        <li class="mb-2"><i class="bi bi-whatsapp text-success me-2"></i> +62 812-3456-7890 (Tata Usaha)</li>
                        <li><i class="bi bi-envelope-fill text-danger me-2"></i> info@gks-tanau.org</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white-50 text-center py-3 mt-5 small">
        <p class="mb-0">&copy; 2026 GKS Hibuwundu Cabang Tanau. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>