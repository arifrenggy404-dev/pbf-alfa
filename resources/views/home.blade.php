<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKS Hibuwundu - Cabang Tanau</title>
    
    <!-- Bootstrap 5.3.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-navy: #0b1329;       
            --secondary-navy: #1c2541;     
            --accent-gold: #c5a880;        
            --dark-gold: #a37f55;          
            --gold-gradient: linear-gradient(135deg, #dfc49c 0%, #a37f55 100%);
            --light-gold: #fcf8f2;         
            --glass-white: rgba(255, 255, 255, 0.85);
            --card-shadow: 0 12px 40px rgba(11, 19, 41, 0.04);
            --hover-shadow: 0 20px 40px rgba(163, 127, 85, 0.15);
        }

        body { 
            background-color: #f6f8fa; 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            scroll-behavior: smooth; 
            color: #334155;
            overflow-x: hidden;
        }

        h1, h2, h3, .font-serif { font-family: 'Playfair Display', serif; }
        
        .custom-navbar {
            background: rgba(11, 19, 41, 0.92) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 2px solid rgba(223, 196, 156, 0.2) !important;
            padding: 15px 0;
            transition: all 0.3s ease;
        }

        .hero-section {
            background: linear-gradient(180deg, rgba(11, 19, 41, 0.75) 0%, rgba(11, 19, 41, 0.95) 100%), 
                        url('edo-pangestu-repo-gereja1591104715-m.jpeg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            color: white;
            padding: 180px 0 140px 0;
            position: relative;
        }

        .hero-section::after {
            content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 80px;
            background: linear-gradient(to top, #f6f8fa, transparent);
        }

        .btn-gold { 
            background: var(--gold-gradient); color: #0b1329 !important; font-weight: 700; border: none;
            letter-spacing: 0.5px; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 15px rgba(163, 127, 85, 0.3);
        }
        .btn-gold:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(163, 127, 85, 0.5); opacity: 0.95; }
        
        .text-gold { color: var(--dark-gold); }
        .bg-gold-light { background-color: var(--light-gold); }
        .bg-navy-dark { background-color: var(--primary-navy); }
        
        .card-info { 
            border: 1px solid rgba(163, 127, 85, 0.1) !important; border-radius: 16px; background: white;
            box-shadow: var(--card-shadow); transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); 
        }
        .card-info:hover { transform: translateY(-6px); box-shadow: var(--hover-shadow); border-color: rgba(163, 127, 85, 0.3) !important; }
        
        .custom-tabs-container { background: #ffffff; padding: 10px; border-radius: 20px; box-shadow: var(--card-shadow); border: 1px solid rgba(0,0,0,0.03); }
        .nav-tabs .nav-link { color: #64748b; font-weight: 600; border: none; padding: 14px 24px; border-radius: 14px !important; margin: 0 4px; transition: all 0.3s ease; }
        .nav-tabs .nav-link:hover { background: rgba(197, 168, 128, 0.1); color: var(--primary-navy); }
        .nav-tabs .nav-link.active { background: var(--primary-navy) !important; color: var(--accent-gold) !important; box-shadow: 0 8px 20px rgba(11, 19, 41, 0.2); }
        
        .table-container { border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; }
        .table thead { background: #f8fafc; color: var(--primary-navy); font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px; }

        .gallery-container { position: relative; overflow: hidden; border-radius: 16px; }
        .gallery-img { height: 280px; object-fit: cover; transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .card-info:hover .gallery-img { transform: scale(1.06); }
        .badge-premium { background: rgba(11, 19, 41, 0.06); color: var(--primary-navy); border: 1px solid rgba(11, 19, 41, 0.1); font-weight: 600; padding: 6px 14px; border-radius: 8px; }
        .section-title-container span { font-size: 0.85rem; letter-spacing: 3px; color: var(--dark-gold); font-weight: 700; }
    </style>
</head>
<body>

    <!-- Navbar Utama -->
   <nav class="navbar navbar-expand-lg navbar-dark sticky-top custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold text-white d-flex align-items-center fs-4" href="/">
            <i class="bi bi-church text-warning me-2 fs-3"></i>
            <span style="letter-spacing: 0.5px;">GKS <span class="text-gold font-serif">Tanau</span></span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link px-3 text-white" href="#beranda">Beranda</a></li>
                
                <li class="nav-item">
                    <a class="nav-link px-3 text-white-50" href="#tentang-kami">Tentang Gereja</a>
                </li>
                
                <li class="nav-item"><a class="nav-link px-3 text-white-50" href="#informasi-jemaat">Informasi Jemaat</a></li>
                <li class="nav-item"><a class="nav-link px-3 text-white-50" href="#galeri">Galeri Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link px-3 text-white-50" href="#warta">Warta Jemaat</a></li>
                <li class="nav-item"><a class="nav-link px-3 text-white-50" href="#jadwal-ibadah">Jadwal & Kontak</a></li>
            </ul>
            <div class="d-flex">
                <a href="/login" class="btn btn-gold btn-sm px-4 py-2 rounded-pill shadow-sm d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Portal Admin
                </a>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <div class="hero-section text-center" id="beranda">
        <div class="container position-relative" style="z-index: 2;">
            <h1 class="display-3 fw-bold mb-2 text-white" style="letter-spacing: 1px;">GKS Hibuwundu</h1>
            <h3 class="fw-normal text-warning font-serif mb-4" style="letter-spacing: 3px; opacity: 0.9;">Cabang Tanau - Waingapu</h3>
            <p class="lead mb-5 mx-auto fst-italic fs-4" style="max-width: 800px; color: #e2e8f0; font-weight: 300;">
                "Melayani dengan Kasih, Membangun Iman Jemaat yang Tangguh dan Transparan"
            </p>
            <div class="row justify-content-center mb-5">
                <div class="col-md-7">
                    <p class="text-white-50 small" style="line-height: 1.8;">Sistem informasi administrasi pelayanan jemaat terpadu. Menyajikan data pertumbuhan berkala, jadwal ibadah, sakramen, dan mutasi warga jemaat secara akurat.</p>
                </div>
            </div>
            <a href="#informasi-jemaat" class="btn btn-gold fw-bold px-5 py-3 rounded-pill shadow-lg text-uppercase fs-6">
                Buka Pusat Data Jemaat <i class="bi bi-arrow-down-short ms-1 fs-5 align-middle"></i>
            </a>
        </div>
    </div>

    <!-- Tentang Kami Section -->
   <div class="container my-5 py-5" id="tentang-kami">
    <div class="row align-items-start g-5">
        <div class="col-lg-6">
            <div class="section-title-container mb-3">
                <span class="text-uppercase d-block mb-2">Profil Singkat</span>
                <h2 class="display-5 fw-bold text-dark">GKS Hibuwundu<br><span class="text-gold font-serif">Cabang Tanau</span></h2>
            </div>
            <p class="text-muted text-justify" style="line-height: 1.9; font-size: 1.05rem;">Gereja Kristen Sumba (GKS) Hibuwundu Cabang Tanau hadir sebagai wadah persekutuan, kesaksian, dan pelayanan kasih bagi warga jemaat di wilayah Tanau, Sumba Timur. Melalui komitmen keterbukaan informasi, kami terus berupaya meningkatkan kualitas manajemen administrasi gerejawi demi kenyamanan pelayanan seluruh jemaat.</p>
            <p class="text-muted" style="line-height: 1.9; font-size: 1.05rem;">Kami rindu untuk terus bertumbuh bersama bapa, mama, serta saudara-saudari sekalian dalam iman, pengharapan, dan kasih yang nyata.</p>
        </div>

        <div class="col-lg-6" id="visi-misi">
            <div class="mb-4">
                <img src="{{ asset('images/gereja.jpeg') }}" class="img-fluid rounded-3 shadow w-100" style="height: 260px; object-fit: cover;" alt="Ilustrasi Gereja">
            </div>
            
            <div class="row g-4">
                <div class="col-12">
                    <div class="card card-info bg-gold-light p-4 shadow-sm border-0">
                        <h5 class="fw-bold text-gold font-serif fs-4 mb-2"><i class="bi bi-eye-fill me-2"></i>Visi Gereja</h5>
                        <p class="text-dark small mb-0" style="line-height: 1.7; font-size: 0.95rem;">Menjadi jemaat yang mandiri, misioner, serta berdampak nyata mewujudkan syalom Allah di tengah masyarakat Sumba Timur.</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-info bg-white p-4 shadow-sm">
                        <h5 class="fw-bold text-dark font-serif fs-4 mb-2"><i class="bi bi-compass-fill me-2 text-gold"></i>Misi Pelayanan</h5>
                        <p class="text-muted small mb-0" style="line-height: 1.8; font-size: 0.95rem;">
                            <span class="d-block mb-2"><strong>1.</strong> Menyelenggarakan ibadah yang hidup dan pembinaan iman berkala bagi seluruh kategori usia jemaat.</span>
                            <span class="d-block"><strong>2.</strong> Mengembangkan sistem pelayanan data administrasi jemaat yang modern, transparan, dan teratur.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Pusat Data Jemaat Section -->
    <div class="container my-5 py-4" id="informasi-jemaat">
        <div class="text-center mb-5">
            <div class="section-title-container">
                <span class="text-uppercase d-block mb-1">Sistem Administrasi</span>
                <h2 class="fw-bold display-5 text-dark">Pusat Data & Informasi Jemaat</h2>
                <p class="text-muted mt-2 fs-5">Data mutasi sakramen dan pertumbuhan berkala warga jemaat GKS Tanau</p>
                <div class="mt-3 mx-auto" style="width: 50px; height: 3px; background: var(--gold-gradient); border-radius: 2px;"></div>
            </div>
        </div>

        <div class="custom-tabs-container mb-4">
            <ul class="nav nav-tabs justify-content-center border-0" id="churchTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active" id="keluarga-tab" data-bs-toggle="tab" data-bs-target="#keluarga" type="button" role="tab"><i class="bi bi-card-list me-2"></i>Data KK</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" id="jemaat-tab" data-bs-toggle="tab" data-bs-target="#jemaat" type="button" role="tab"><i class="bi bi-people-fill me-2"></i>Data Jemaat</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" id="pernikahan-tab" data-bs-toggle="tab" data-bs-target="#pernikahan" type="button" role="tab"><i class="bi bi-heart-fill me-2"></i>Data Pernikahan</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" id="baptis-tab" data-bs-toggle="tab" data-bs-target="#baptis" type="button" role="tab"><i class="bi bi-baby-carriage me-2"></i>Data Kelahiran</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" id="duka-tab" data-bs-toggle="tab" data-bs-target="#duka" type="button" role="tab"><i class="bi bi-clipboard-x-fill me-2"></i>Berita Kematian</button></li>
            </ul>
        </div>

        <div class="tab-content bg-white p-4 p-md-5 rounded-4 shadow-sm border border-light" id="churchTabsContent">
            <!-- Tab Data KK -->
            <div class="tab-pane fade show active" id="keluarga" role="tabpanel">
                <h4 class="fw-bold mb-2 text-dark font-serif fs-3"><i class="bi bi-card-list me-2 text-gold"></i>Daftar Kartu Keluarga Tercatat</h4>
                <p class="text-muted small mb-4">Informasi kepala keluarga warga jemaat GKS Tanau:</p>
                <input type="text" class="form-control mb-3" onkeyup="filterTable(this, 'tabel-keluarga')" placeholder="Cari berdasarkan NIK atau Nama...">
                <div class="table-responsive table-container">
                    <table class="table table-hover align-middle mb-0" id="tabel-keluarga">
                        <thead>
                            <tr>
                                <th width="7%" class="ps-4">No</th>
                                <th>Nomor KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th class="pe-4">Jumlah Anggota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($keluarga as $key => $data)
                                <tr>
                                    <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                    <td class="fw-bold text-secondary">{{ $data->no_kk }}</td>
                                    <td class="fw-bold text-dark font-serif fs-6">{{ $data->nama_kepala_keluarga }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td class="pe-4"><span class="badge badge-premium">{{ $data->jumlah_anggota }} Orang</span></td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center text-muted py-5 fs-6">Belum ada data Kartu Keluarga yang dimasukkan oleh admin.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab Data Jemaat -->
            <div class="tab-pane fade" id="jemaat" role="tabpanel">
                <h4 class="fw-bold mb-2 text-dark font-serif fs-3"><i class="bi bi-people-fill me-2 text-gold"></i>Daftar Seluruh Anggota Jemaat</h4>
                <p class="text-muted small mb-4">Data registrasi jemaat aktif GKS Cabang Tanau:</p>
                <input type="text" class="form-control mb-3" onkeyup="filterTable(this, 'tabel-jemaat')" placeholder="Cari berdasarkan Nama Lengkap...">
                <div class="table-responsive table-container">
                    <table class="table table-hover align-middle mb-0" id="tabel-jemaat">
                        <thead>
                            <tr>
                                <th width="7%" class="ps-4">No</th>
                                <th>Nama Lengkap</th>
                                <th>JK</th>
                                <th>Tempat, Tgl Lahir</th>
                                <th>Kepala Keluarga</th>
                                <th>Baptis</th>
                                <th class="pe-4">Sidi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jemaat as $key => $data)
                                <tr>
                                    <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                    <td class="fw-bold text-dark font-serif fs-6">{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->jk == 'L' || $data->jk == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td>{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d M Y') }}</td>
                                    <td>{{ $data->keluarga->nama_kepala_keluarga ?? $data->keluarga->kepala_keluarga ?? '-' }}</td>
                                    <td><span class="badge rounded-pill {{ strtolower($data->status_baptis) == 'sudah' ? 'bg-success bg-opacity-10 text-success' : 'bg-warning bg-opacity-15 text-dark' }} px-3 py-2">{{ $data->status_baptis ?? 'Belum' }}</span></td>
                                    <td class="pe-4"><span class="badge rounded-pill {{ strtolower($data->status_sidi) == 'sudah' ? 'bg-info bg-opacity-10 text-info-dark' : 'bg-secondary bg-opacity-10 text-secondary' }} px-3 py-2">{{ $data->status_sidi ?? 'Belum' }}</span></td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-center text-muted py-5 fs-6">Belum ada data anggota jemaat yang dimasukkan oleh admin.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Tab Pernikahan -->
            <div class="tab-pane fade" id="pernikahan" role="tabpanel">
                <h4 class="fw-bold mb-2 text-dark font-serif fs-3"><i class="bi bi-heart-fill me-2 text-gold"></i>Catatan Pernikahan Kudus</h4>
                <p class="text-muted small mb-4">Daftar jemaat yang telah melangsungkan atau mendaftarkan Pernikahan Kudus:</p>
                <input type="text" class="form-control mb-3" onkeyup="filterTable(this, 'tabel-pernikahan')" placeholder="Cari berdasarkan Nama Kepala Keluarga...">
                <div class="table-responsive table-container">
                    <table class="table table-hover align-middle mb-0" id="tabel-pernikahan">
                        <thead>
                            <tr>
                                <th width="7%" class="ps-4">No</th>
                                <th>Nama Suami</th>
                                <th>Nama Istri</th>
                                <th>Tanggal Pernikahan</th>
                                <th>Tempat Pernikahan</th>
                                <th class="pe-4">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pernikahan as $key => $data)
                                <tr>
                                    <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                    <td class="fw-bold text-dark font-serif fs-6"><i class="bi bi-gender-male text-primary me-1"></i> {{ $data->nama_suami }}</td>
                                    <td class="fw-bold text-dark font-serif fs-6"><i class="bi bi-gender-female text-danger me-1"></i> {{ $data->nama_istri }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_pernikahan)->format('d M Y') }}</td>
                                    <td>{{ $data->tempat_pernikahan }}</td>
                                    <td class="pe-4"><small class="text-muted">{{ $data->keterangan ?? '-' }}</small></td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center text-muted py-5 fs-6">Belum ada data pernikahan yang dimasukkan oleh admin.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab Kelahiran -->
            <div class="tab-pane fade" id="baptis" role="tabpanel">
                <h4 class="fw-bold mb-2 text-dark font-serif fs-3"><i class="bi bi-baby-carriage me-2 text-gold"></i>Catatan Kelahiran Baru</h4>
                <p class="text-muted small mb-4">Data kelahiran warga jemaat baru:</p>
                <input type="text" class="form-control mb-3" onkeyup="filterTable(this, 'tabel-kelahiran')" placeholder="Cari berdasarkan Nama Anak...">
                <div class="table-responsive table-container">
                    <table class="table table-hover align-middle mb-0" id="tabel-kelahiran">
                        <thead>
                            <tr>
                                <th width="7%" class="ps-4">No</th>
                                <th>Nama Anak</th>
                                <th>Nama Orang Tua</th>
                                <th>Tanggal Lahir</th>
                                <th>JK</th>
                                <th class="pe-4">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kelahiran as $key => $data)
                                <tr>
                                    <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                    <td class="fw-bold text-dark font-serif fs-6">{{ $data->nama_anak }}</td>
                                    <td>{{ $data->nama_orang_tua }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d M Y') }}</td>
                                    <td>{{ $data->jk == 'L' || $data->jk == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td class="pe-4"><small class="text-muted">{{ $data->keterangan ?? '-' }}</small></td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center text-muted py-5 fs-6">Belum ada data kelahiran yang dimasukkan oleh admin.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab Berita Duka -->
            <div class="tab-pane fade" id="duka" role="tabpanel">
                <h4 class="fw-bold mb-2 text-dark font-serif fs-3"><i class="bi bi-journal-x me-2 text-danger"></i>Berita Kemalangan (Meninggal Dunia)</h4>
                <p class="text-muted small mb-4">Mengenang saudara-saudari jemaat kita yang telah dipanggil kembali oleh Tuhan:</p>
                <input type="text" class="form-control mb-3" onkeyup="filterTable(this, 'tabel-duka')" placeholder="Cari berdasarkan Nama...">
                <div class="table-responsive table-container">
                    <table class="table table-hover align-middle mb-0" id="tabel-duka">
                        <thead>
                            <tr>
                                <th width="7%" class="ps-4">No</th>
                                <th>Nama Jemaat</th>
                                <th>Tanggal Lahir</th>
                                <th>Tanggal Meninggal</th>
                                <th class="pe-4">Tempat Pemakaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kematian as $key => $data)
                                <tr>
                                    <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                                    <td class="fw-bold text-dark font-serif fs-6">{{ $data->nama_jemaat }}</td>
                                    <td>{{ $data->tanggal_lahir ? \Carbon\Carbon::parse($data->tanggal_lahir)->format('d M Y') : '-' }}</td>
                                    <td class="text-danger fw-bold">{{ \Carbon\Carbon::parse($data->tanggal_meninggal)->format('d M Y') }}</td>
                                    <td class="pe-4 text-muted">{{ $data->tempat_pemakaman }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center text-muted py-5 fs-6">Tidak ada berita duka/kemalangan yang tercatat.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri Kegiatan Section -->
    <div class="container my-5 py-4" id="galeri">
        <div class="text-center mb-5">
            <div class="section-title-container">
                <span class="text-uppercase d-block mb-1">Dokumentasi Pelayanan</span>
                <h2 class="fw-bold display-5 text-dark">Galeri Kegiatan Gereja</h2>
                <div class="mt-3 mx-auto" style="width: 50px; height: 3px; background: var(--gold-gradient); border-radius: 2px;"></div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-info h-100 border-0 shadow-sm">
                    <div class="gallery-container"><img src="{{ asset('images/ibadahminggu.jpeg') }}" class="img-fluid rounded-3 shadow w-100 gallery-img" alt="Ibadah Minggu"></div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2 font-serif text-dark">Pelaksanaan Ibadah Minggu Raya</h5>
                        <p class="text-muted small mb-0">Persekutuan sakral berkala jemaat induk dan cabang Tanau.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info h-100 border-0 shadow-sm">
                    <div class="gallery-container"><img src="{{ asset('images/ibadahpadang.jpeg') }}" class="img-fluid rounded-3 shadow w-100 gallery-img" alt="Ibadah Padang"></div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2 font-serif text-dark">Ibadah Padang Bersama</h5>
                        <p class="text-muted small mb-0">Menumbuhkan Iman.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info h-100 border-0 shadow-sm">
                    <div class="gallery-container"><img src="{{ asset('images/sekolahminggu.jpeg') }}" class="img-fluid rounded-3 shadow w-100 gallery-img" alt="Sekolah Minggu"></div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2 font-serif text-dark">Kegiatan Ceria Sekolah Minggu</h5>
                        <p class="text-muted small mb-0">Pembinaan rohani anak-anak sejak usia dini di pos pelayanan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warta Jemaat Section -->
    <div class="py-5 border-top border-bottom bg-white" id="warta">
        <div class="container py-3">
            <div class="text-center mb-5">
                <div class="section-title-container">
                    <span class="text-uppercase d-block mb-1">Pengumuman Terbaru</span>
                    <h2 class="fw-bold display-5 text-dark">Warta Jemaat</h2>
                    <div class="mt-3 mx-auto" style="width: 50px; height: 3px; background: var(--gold-gradient); border-radius: 2px;"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card card-info p-4 mb-4 border-0 border-start border-warning border-4 shadow-sm bg-light bg-opacity-50">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-warning bg-opacity-10 text-dark fw-bold px-3 py-2 rounded">Informasi Penting</span>
                            <small class="text-muted"><i class="bi bi-calendar-event me-1"></i> Warta Terbaru</small>
                        </div>
                        <h4 class="fw-bold text-dark font-serif mb-2">Pendaftaran Kelas Katekisasi Sidi Baru</h4>
                        <p class="text-muted mb-0">Bagi bapa/mama yang memiliki anak remaja yang telah memenuhi syarat usia peneguhan sidi, pendaftaran kelas pengajaran sidi baru telah dibuka melalui sekretariat tata usaha.</p>
                    </div>
                    <div class="card card-info p-4 border-0 border-start border-secondary border-4 shadow-sm bg-light bg-opacity-50">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-secondary bg-opacity-10 text-dark fw-bold px-3 py-2 rounded">Kegiatan</span>
                            <small class="text-muted"><i class="bi bi-calendar-event me-1"></i> Rutin Mingguan</small>
                        </div>
                        <h4 class="fw-bold text-dark font-serif mb-2">Aksi Sosial Kasih Majelis & Jemaat</h4>
                        <p class="text-muted mb-0">Rencana kunjungan diakonia dan pelayanan doa rumah tangga di lingkungan Sektor Cabang Tanau akan dilaksanakan bertahap mulai pekan ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jadwal & Kontak Section -->
    <div class="container my-5 py-4" id="jadwal-ibadah">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-info bg-white text-dark p-4 p-md-5 h-100 shadow border-0 position-relative overflow-hidden">
                    <div style="position: absolute; right: -20px; bottom: -20px; opacity: 0.04; font-size: 12rem;"><i class="bi bi-clock text-dark"></i></div>
                    <h3 class="fw-bold mb-4 text-dark font-serif display-6"><i class="bi bi-clock-history me-3 text-secondary"></i>Jadwal Ibadah</h3>
                    <div class="d-flex mb-3 align-items-center"><i class="bi bi-calendar3 fs-4 text-secondary me-3"></i><span class="fs-5 fw-medium">Setiap Hari Minggu</span></div>
                    <div class="d-flex mb-3 align-items-center"><i class="bi bi-alarm fs-4 text-secondary me-3"></i><span class="fs-6 text-muted">Ibadah Minggu Pagi : <strong class="text-dark fs-5">08.30 WITA</strong></span></div>
                    <div class="d-flex mb-5 align-items-center"><i class="bi bi-people fs-4 text-secondary me-3"></i><span class="fs-6 text-muted">Sekolah Minggu Anak : <strong class="text-dark fs-5">15.00 WITA</strong></span></div>
                    <div class="alert border-0 text-muted small mb-0 p-3 rounded-3" style="background: rgba(0,0,0,0.05);"><i class="bi bi-info-circle-fill me-2 text-secondary"></i> Harap jemaat hadir tepat waktu demi kelancaran jalannya ibadah kita bersama.</div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card card-info p-4 p-md-5 h-100 border-0 shadow-sm bg-white">
                    <h3 class="fw-bold mb-3 text-dark font-serif display-6"><i class="bi bi-telephone-inbound text-gold me-3"></i>Sekretariat</h3>
                    <p class="text-muted mb-4">Jika bapa/mama jemaat menemukan kekeliruan data atau mutasi berkas yang belum tercantum pada sistem informasi, silakan hubungi kontak tata usaha gereja:</p>
                    <ul class="list-unstyled text-muted fs-6">
                        <li class="mb-3 d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-gold border"><i class="bi bi-geo-alt-fill fs-5"></i></div>
                            <a href="https://maps.app.goo.gl/GRZr2RZdNEYXZnDD6?g_st=ac" target="_blank" class="text-decoration-none text-dark"><span>Sumba Timur, Waingapu, Cabang Tanau</span></a>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-success border"><i class="bi bi-whatsapp fs-5"></i></div>
                            <strong>+62 812-3456-7890 <span class="text-muted fw-normal ms-1">(Tata Usaha)</span></strong>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-danger border"><i class="bi bi-envelope-fill fs-5"></i></div>
                            <span class="text-decoration-underline">info@gks-tanau.org</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Sistem -->
   <footer class="bg-navy-dark text-white-50 text-center py-5 small border-top border-dark">
    <div class="container">
        <p class="mb-2 text-light fs-6">&copy; 2026 GKS Hibuwundu Cabang Tanau. All Rights Reserved.</p>
        <!-- Mengubah text-muted menjadi text-white -->
        <p class="text-white mb-0 mx-auto" style="max-width: 500px; font-size: 0.85rem;">
            Dirancang untuk transparansi dan integrasi data administrasi jemaat lokal Waingapu.
        </p>
    </div>
</footer>

    <!-- Bootstrap & Custom JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterTable(input, tableId) {
            let filter = input.value.toLowerCase();
            let table = document.getElementById(tableId);
            let tr = table.getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td");
                let found = false;
                for (let j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerText.toLowerCase().indexOf(filter) > -1) { found = true; break; }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            var triggerTabList = [].slice.call(document.querySelectorAll('#churchTabs button'))
            triggerTabList.forEach(function (triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl)
                triggerEl.addEventListener('click', function (event) {
                    event.preventDefault();
                    tabTrigger.show();
                })
            })
        });
    </script>
</body>
</html>