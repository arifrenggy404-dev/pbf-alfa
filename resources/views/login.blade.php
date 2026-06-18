<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola | GKS Hibuwundu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --nav-navy: #1a202c;
            --gold: #c5a059;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        /* Split layout container */
        .login-wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        /* Left Side: Branding/Visual */
        .left-side {
            flex: 1;
            background: var(--nav-navy);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 80px;
            color: white;
            background-image: radial-gradient(circle at 20% 80%, rgba(197, 160, 89, 0.15) 0%, transparent 50%);
        }

        /* Right Side: Form */
        .right-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: white;
            padding: 48px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border: 1px solid #e2e8f0;
            padding: 14px 20px;
            border-radius: 12px;
            font-weight: 400;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(197, 160, 89, 0.15);
        }

        .btn-gold {
            background: var(--gold);
            color: white;
            font-weight: 600;
            padding: 14px;
            border-radius: 12px;
            width: 100%;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background: #a8874a;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(197, 160, 89, 0.3);
        }

        @media (max-width: 992px) {
            .left-side { display: none; }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="left-side">
            <h1 class="display-4 fw-800 mb-4">GKS<br><span style="color: var(--gold);">Hibuwundu</span></h1>
            <p class="lead text-white-50 opacity-75">Sistem informasi administrasi jemaat terpadu untuk pelayanan yang lebih efektif dan transparan.</p>
            <div class="mt-5">
                <a href="/" class="text-white text-decoration-none border-bottom border-secondary pb-1">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Website Utama
                </a>
            </div>
        </div>

        <div class="right-side">
            <div class="login-card">
                <h2 class="fw-800 text-dark mb-2">Selamat Datang</h2>
                <p class="text-muted mb-4">Masukkan kredensial Anda untuk masuk ke Dashboard.</p>

                @if($errors->any())
                    <div class="alert alert-danger border-0 p-3 mb-4 rounded-3 small">
                        <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $errors->first() }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small">Alamat Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark small">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-gold">
                        Masuk ke Dashboard <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>