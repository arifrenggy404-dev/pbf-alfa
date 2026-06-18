<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - GKS Hibuwundu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --accent-color: #0d9488;
            --bg-main: #f3f4f6;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-main); 
            color: #334155;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width); height: 100vh; position: fixed; top: 0; left: 0;
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); color: #94a3b8;
            z-index: 1050; box-shadow: 4px 0 24px rgba(15, 23, 42, 0.15);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* State: Collapsed (Desktop) */
        body.sidebar-collapsed .sidebar {
            left: calc(-1 * var(--sidebar-width));
        }
        
        .sidebar-brand { padding: 32px 28px; font-size: 1.25rem; font-weight: 800; color: #fff; border-bottom: 1px solid rgba(255, 255, 255, 0.06); }
        .sidebar-menu { padding: 24px 16px; list-style: none; }
        
        .sidebar-link { 
            display: flex; align-items: center; padding: 14px 18px; color: #94a3b8; 
            text-decoration: none; border-radius: 12px; font-weight: 600; transition: all 0.25s;
        }
        
        .sidebar-link i { 
            font-size: 1.4rem; 
            margin-right: 14px; 
            width: 24px; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center;
        }
        
        .sidebar-link:hover { background: rgba(255, 255, 255, 0.05); color: #f8fafc; }
        .sidebar-link.active { background: var(--accent-color); color: #fff; box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3); }

        .logout-box { padding: 0 16px; position: absolute; bottom: 30px; width: 100%; }
        .btn-logout-sidebar { 
            width: 100%; display: flex; align-items: center; padding: 14px 18px; 
            color: #cbd5e1; background: rgba(255, 255, 255, 0.03); 
            border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; 
            font-weight: 600; transition: all 0.3s; 
        }
        .btn-logout-sidebar:hover { background: rgba(244, 63, 94, 0.1); border-color: rgba(244, 63, 94, 0.2); color: #fff; }

        /* Content Styling */
        .main-content { 
            margin-left: var(--sidebar-width); 
            padding: 44px 48px; 
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1); 
            min-height: 100vh;
        }
        
        body.sidebar-collapsed .main-content {
            margin-left: 0;
        }

        /* Toggle Button */
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
                    ['url' => 'kelahiran', 'icon' => 'bi-person-plus', 'title' => 'Data Kelahiran', 'pattern' => 'kelahiran*'],
                    ['url' => 'pernikahan', 'icon' => 'bi-heart-half', 'title' => 'Data Pernikahan', 'pattern' => 'pernikahan*'],
                    ['url' => 'kematian', 'icon' => 'bi-plus-lg', 'title' => 'Berita Kematian', 'pattern' => 'kematian*'],
                ];
            @endphp
            @foreach($menus as $menu)
                <li>
                    <a class="sidebar-link {{ Request::is($menu['pattern']) ? 'active' : '' }}" href="{{ url($menu['url']) }}">
                        <i class="bi {{ $menu['icon'] }}"></i> {{ $menu['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        
        <div class="logout-box">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn-logout-sidebar border-0">
                    <i class="bi bi-box-arrow-right me-3"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <button class="toggle-btn" id="toggle-sidebar" title="Toggle Sidebar">
        <i class="bi bi-list fs-4"></i>
    </button>

    <main class="main-content" id="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
    </script>
    @stack('scripts')
</body>
</html>