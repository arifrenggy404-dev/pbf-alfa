<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - GKS Hibuwundu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --bg-main: #f3f4f6;
            --accent-color: #0d9488; /* Warna Teal Utama */
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.6);
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-main); 
            color: #334155;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Aurora Background Blur Effect */
        body::before, body::after {
            content: ""; position: fixed; width: 500px; height: 500px; z-index: -1;
        }
        body::before { top: -150px; right: -100px; background: radial-gradient(circle, rgba(13, 148, 136, 0.15) 0%, transparent 70%); }
        body::after { width: 600px; height: 600px; bottom: -200px; left: 100px; background: radial-gradient(circle, rgba(13, 148, 136, 0.1) 0%, transparent 70%); }

        /* PREMIUM SIDEBAR */
        .sidebar {
            width: var(--sidebar-width); height: 100vh; position: fixed; top: 0; left: 0;
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); color: #94a3b8;
            z-index: 1050; transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 4px 0 24px rgba(15, 23, 42, 0.15);
        }
        
        body.sidebar-collapsed .sidebar {
            left: calc(-1 * var(--sidebar-width));
        }
        
        .sidebar-brand { padding: 32px 28px; font-size: 1.25rem; font-weight: 800; color: #fff; letter-spacing: -0.5px; border-bottom: 1px solid rgba(255, 255, 255, 0.06); }
        .sidebar-menu { padding: 24px 16px; list-style: none; margin: 0; }
        .sidebar-link { display: flex; align-items: center; padding: 14px 18px; color: #94a3b8; text-decoration: none; border-radius: 12px; font-weight: 600; font-size: 0.95rem; transition: all 0.25s; }
        .sidebar-link i { font-size: 1.25rem; margin-right: 14px; transition: transform 0.25s; }
        .sidebar-link:hover { background: rgba(255, 255, 255, 0.05); color: #f8fafc; }
        .sidebar-link:hover i { transform: scale(1.1); }
        .sidebar-link.active { background: var(--accent-color); color: #fff; box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3); }

        .logout-box { padding: 0 16px; position: absolute; bottom: 30px; width: 100%; }
        .btn-logout-sidebar { width: 100%; display: flex; align-items: center; padding: 14px 18px; color: #cbd5e1; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; font-weight: 600; font-size: 0.95rem; transition: all 0.3s; }
        .btn-logout-sidebar i { font-size: 1.25rem; margin-right: 14px; color: #f43f5e; transition: transform 0.3s; }
        .btn-logout-sidebar:hover { background: rgba(244, 63, 94, 0.1); border-color: rgba(244, 63, 94, 0.2); color: #fff; }
        .btn-logout-sidebar:hover i { transform: translateX(3px); }

        /* MAIN CONTENT & UTILITIES */
        .main-content { 
            margin-left: var(--sidebar-width); 
            padding: 44px 48px; 
            min-height: 100vh; 
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        
        body.sidebar-collapsed .main-content {
            margin-left: 0;
        }

        .toggle-btn {
            position: fixed;
            top: 20px;
            left: calc(var(--sidebar-width) + 20px);
            z-index: 1100;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        body.sidebar-collapsed .toggle-btn {
            left: 20px;
        }

        .glass-card { background: var(--glass-bg); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid var(--glass-border); border-radius: 24px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03); }
        .fw-800 { font-weight: 800; }

        /* MINI INDICATORS STYLE */
        .stat-indicator { border-right: 1px solid rgba(0, 0, 0, 0.06); padding: 0 15px; }
        .stat-indicator:last-child { border-right: none; }
        .indicator-dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 6px; }

        /* COLOR PALETTE REF - Diselaraskan ke Teal */
        .dot-kk { background-color: #0d9488; }
        .dot-jemaat { background-color: #0891b2; }
        .dot-lahir { background-color: #059669; }
        .dot-nikah { background-color: #7c3aed; }
        .dot-mati { background-color: #e11d48; }

        .chart-container { position: relative; height: 320px; width: 100%; }

        @media (max-width: 1199.98px) { .main-content { padding: 24px; } }
        @media (max-width: 991.98px) {
            .sidebar { 
                left: calc(-1 * var(--sidebar-width)); 
            }
            body.sidebar-show .sidebar { 
                left: 0; 
            }
            .main-content { 
                margin-left: 0; 
                padding: 24px; 
                padding-top: 85px; 
            }
            body.sidebar-collapsed .main-content {
                margin-left: 0;
            }
            .toggle-btn { 
                left: 20px !important; 
            }
            .logout-box { position: static; padding: 24px 16px; }
            .stat-indicator { border-right: none; border-bottom: 1px solid rgba(0, 0, 0, 0.06); padding: 12px 0; }
            .stat-indicator:last-child { border-bottom: none; }
        }
    </style>
</head>
<body class="{{ Cookie::get('sidebar_collapsed') ? 'sidebar-collapsed' : '' }}">

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand d-flex align-items-center">
            <div class="p-2 bg-white bg-opacity-10 rounded-3 me-3 d-inline-flex">
                <i class="bi bi-church text-white m-0 lh-1"></i>
            </div>
            <span>GKS Hibuwundu</span>
        </div>
        <ul class="sidebar-menu">
            @php
                $menus = [
                    ['url' => 'dashboard', 'icon' => 'bi-speedometer2', 'title' => 'Dashboard', 'pattern' => 'dashboard'],
                    ['url' => 'keluarga', 'icon' => 'bi-folder2-open', 'title' => 'Data Keluarga', 'pattern' => 'keluarga*'],
                    ['url' => 'jemaat', 'icon' => 'bi-person-badge', 'title' => 'Data Jemaat', 'pattern' => 'jemaat*'],
                    ['url' => 'kelahiran', 'icon' => 'bi-heart-pulse', 'title' => 'Data Kelahiran', 'pattern' => 'kelahiran*'],
                    ['url' => 'pernikahan', 'icon' => 'bi-infinity', 'title' => 'Data Pernikahan', 'pattern' => 'pernikahan*'],
                    ['url' => 'kematian', 'icon' => 'bi-moon-stars', 'title' => 'Berita Kematian', 'pattern' => 'kematian*'],
                ];
            @endphp
            
            @foreach($menus as $menu)
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is($menu['pattern']) ? 'active' : '' }}" href="{{ url($menu['url']) }}">
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

    <button class="toggle-btn" id="toggle-sidebar" title="Toggle Sidebar">
        <i class="bi bi-list fs-4"></i>
    </button>

    <main class="main-content" id="main-content">
        
        <header class="glass-card p-4 mb-4">
            <div class="row align-items-center g-4">
                <div class="col-md-8 text-center text-md-start">
                    <span class="badge mb-2 px-3 py-2 rounded-pill text-uppercase font-monospace fw-bold" style="background: rgba(13, 148, 136, 0.1); color: #0d9488; font-size: 0.75rem;">Workspace Panel v2.0</span>
                    <h1 class="h2 mb-2 fw-800 text-dark">Selamat Datang di Sistem Informasi</h1>
                    <p class="text-muted mb-0">GKS Hibuwundu — Tata Kelola Administrasi & Registrasi Jemaat.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <span class="badge px-4 py-3 rounded-pill fs-7 fw-semibold bg-white text-success border" style="border-color: rgba(13, 148, 136, 0.15) !important;">
                        <span class="spinner-grow spinner-grow-sm me-2" style="width: 10px; height: 10px; color: #0d9488;"></span> Koneksi Aman & Aktif
                    </span>
                </div>
            </div>
        </header>

        <section class="mb-5">
            <div class="card glass-card p-4">
                <div class="row text-center text-md-start g-3 mb-4 pb-4 border-bottom justify-content-between">
                    <div class="col-md-auto stat-indicator flex-fill">
                        <div class="text-muted small fw-semibold mb-1">
                            <span class="indicator-dot dot-kk"></span>Keluarga (KK)
                        </div>
                        <h3 class="fw-800 text-dark mb-0 fs-3">{{ $totalKeluarga ?? 0 }}</h3>
                    </div>
                    <div class="col-md-auto stat-indicator flex-fill">
                        <div class="text-muted small fw-semibold mb-1">
                            <span class="indicator-dot dot-jemaat"></span>Total Jemaat
                        </div>
                        <h3 class="fw-800 text-dark mb-0 fs-3">{{ $totalJemaat ?? 0 }}</h3>
                    </div>
                    <div class="col-md-auto stat-indicator flex-fill">
                        <div class="text-muted small fw-semibold mb-1">
                            <span class="indicator-dot dot-lahir"></span>Kelahiran Baru
                        </div>
                        <h3 class="fw-800 text-dark mb-0 fs-3">{{ $totalKelahiran ?? 0 }}</h3>
                    </div>
                    <div class="col-md-auto stat-indicator flex-fill">
                        <div class="text-muted small fw-semibold mb-1">
                            <span class="indicator-dot dot-nikah"></span>Pernikahan
                        </div>
                        <h3 class="fw-800 text-dark mb-0 fs-3">{{ $totalPernikahan ?? 0 }}</h3>
                    </div>
                    <div class="col-md-auto stat-indicator flex-fill">
                        <div class="text-muted small fw-semibold mb-1">
                            <span class="indicator-dot dot-mati"></span>Meninggal Dunia
                        </div>
                        <h3 class="fw-800 text-dark mb-0 fs-3">{{ $totalKematian ?? 0 }}</h3>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark m-0">Visualisasi Log Statistik Modul</h5>
                    <span class="badge bg-light text-secondary border px-3 py-1.5 rounded-pill small">Sirkulasi Real-time</span>
                </div>
                <div class="chart-container">
                    <canvas id="mainAnalyticsChart"></canvas>
                </div>
            </div>
        </section>

        <section class="row g-4">
            <div class="col-lg-8">
                <div class="card glass-card p-4 h-100">
                    <h4 class="h5 mb-4 fw-bold text-dark d-flex align-items-center">
                        <i class="bi bi-journal-text me-2" style="color: var(--accent-color);"></i> Petunjuk Penggunaan Sistem Informasi
                    </h4>
                    <div class="d-flex mb-3 align-items-start">
                        <div class="p-2 rounded-circle me-3 d-flex align-items-center justify-content-center fw-bold shadow-sm text-white" style="width: 28px; height: 28px; font-size: 0.8rem; background-color: var(--accent-color);">1</div>
                        <p class="text-muted small mb-0 pt-1">Pastikan untuk mendaftarkan data <strong>Keluarga</strong> terlebih dahulu sebelum menambahkan berkas <strong>Jemaat baru</strong> agar relasi nomor Kartu Keluarga terjalin akurat.</p>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="p-2 rounded-circle me-3 d-flex align-items-center justify-content-center fw-bold shadow-sm text-white" style="width: 28px; height: 28px; font-size: 0.8rem; background-color: var(--accent-color);">2</div>
                        <p class="text-muted small mb-0 pt-1">Lakukan pembaharuan berkala pada pencatatan peristiwa penting (Kelahiran, Pernikahan, dan Kematian) demi akurasi mutakhir laporan berkas pada Sidang Tahunan Jemaat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card glass-card p-4 text-center d-flex flex-column justify-content-center h-100">
                    <span class="text-muted small text-uppercase tracking-wider fw-bold" style="font-size: 0.75rem;">Waktu Server Terkini</span>
                    <h2 class="my-2 fw-800 text-dark" id="clock" style="color: #0f172a !important;">{{ date('H:i:s') }} WITA</h2>
                    <div>
                        <span class="badge px-3 py-2 text-uppercase font-monospace rounded-pill fw-semibold bg-body-secondary text-secondary" style="font-size: 0.75rem;">
                            <i class="bi bi-calendar3 me-2"></i>{{ date('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            const toggleBtn = document.getElementById('toggle-sidebar');
            
            // Sync with localStorage on load
            if (localStorage.getItem('sidebarCollapsed') === 'true' && window.innerWidth > 991) {
                body.classList.add('sidebar-collapsed');
            }

            toggleBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (window.innerWidth <= 991) {
                    body.classList.toggle('sidebar-show');
                } else {
                    body.classList.toggle('sidebar-collapsed');
                    localStorage.setItem('sidebarCollapsed', body.classList.contains('sidebar-collapsed'));
                }
            });

            // Close mobile sidebar on click outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 991 && body.classList.contains('sidebar-show')) {
                    if (!document.getElementById('sidebar').contains(e.target) && !toggleBtn.contains(e.target)) {
                        body.classList.remove('sidebar-show');
                    }
                }
            });
        });

        setInterval(() => {
            const clockEl = document.getElementById('clock');
            if (clockEl) {
                const timeString = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                clockEl.innerText = timeString.replace(/\./g, ':') + ' WITA';
            }
        }, 1000);

        const ctx = document.getElementById('mainAnalyticsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Keluarga (KK)', 'Total Jemaat', 'Kelahiran Baru', 'Pernikahan', 'Meninggal Dunia'],
                datasets: [{
                    data: [{{ $totalKeluarga ?? 0 }}, {{ $totalJemaat ?? 0 }}, {{ $totalKelahiran ?? 0 }}, {{ $totalPernikahan ?? 0 }}, {{ $totalKematian ?? 0 }}],
                    backgroundColor: ['rgba(13, 148, 136, 0.25)', 'rgba(8, 145, 178, 0.25)', 'rgba(5, 150, 105, 0.25)', 'rgba(124, 58, 237, 0.25)', 'rgba(225, 29, 72, 0.25)'],
                    borderColor: ['#0d9488', '#0891b2', '#059669', '#7c3aed', '#e11d48'],
                    borderWidth: 2,
                    borderRadius: 12,
                    borderSkipped: false,
                    barThickness: 50
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: 'rgba(51, 65, 85, 0.06)', drawTicks: false }, ticks: { color: '#64748b' } },
                    x: { grid: { display: false }, ticks: { color: '#475569' } }
                }
            }
        });
    </script>
</body>
</html>