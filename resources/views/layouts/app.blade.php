<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Perpustakaan')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #0f172a 0%, #172554 100%);
            color: white;
            padding: 25px 18px;
            z-index: 1000;
            box-shadow: 8px 0 30px rgba(15, 23, 42, .12);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 8px 10px 28px;
            border-bottom: 1px solid rgba(255,255,255,.10);
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            box-shadow: 0 8px 20px rgba(59,130,246,.30);
        }

        .brand-text h2 {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
        }

        .brand-text span {
            color: #94a3b8;
            font-size: 11px;
        }

        .menu-title {
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            padding: 0 12px;
            margin-bottom: 10px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #cbd5e1;
            padding: 13px 14px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(
                135deg,
                rgba(59,130,246,.25),
                rgba(99,102,241,.20)
            );
            color: white;
        }

        .menu-icon {
            width: 30px;
            height: 30px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,.06);
        }

        .sidebar-bottom {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 22px;
        }

        .admin-card {
            padding: 14px;
            border-radius: 15px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.08);
            margin-bottom: 12px;
        }

        .admin-card small {
            color: #94a3b8;
            font-size: 10px;
        }

        .admin-card strong {
            display: block;
            margin-top: 4px;
            font-size: 13px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            border-radius: 11px;
            padding: 11px;
            background: rgba(239,68,68,.12);
            color: #fca5a5;
            cursor: pointer;
            font-weight: 700;
            transition: .2s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: white;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-title {
            color: #172554;
            font-weight: 800;
            font-size: 17px;
        }

        .topbar-subtitle {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 2px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #6366f1);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
        }

        .content {
            padding: 32px 35px;
            max-width: 1500px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 14px 17px;
            border-radius: 13px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 850px) {

            .sidebar {
                width: 72px;
                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 20px;
            }

            .brand-text,
            .menu-title,
            .menu span,
            .admin-card,
            .logout-btn {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 10px;
            }

            .menu-icon {
                width: 40px;
                height: 40px;
            }

            .main {
                margin-left: 72px;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 500px) {

            .topbar-title {
                font-size: 14px;
            }

            .topbar-subtitle,
            .profile-name {
                display: none;
            }

            .content {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                📚
            </div>

            <div class="brand-text">
                <h2>Perpustakaan</h2>
                <span>Library Management</span>
            </div>

        </div>

        <div class="menu-title">
            MENU UTAMA
        </div>

        <nav class="menu">

            <a href="{{ route('books.index') }}"
               class="{{ request()->routeIs('books.index') ? 'active' : '' }}">

                <div class="menu-icon">📖</div>
                <span>Daftar Buku</span>

            </a>

            <a href="{{ route('books.create') }}"
               class="{{ request()->routeIs('books.create') ? 'active' : '' }}">

                <div class="menu-icon">➕</div>
                <span>Tambah Buku</span>

            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="admin-card">

                <small>LOGIN SEBAGAI</small>

                <strong>
                    👤 {{ auth()->user()->name ?? 'Administrator' }}
                </strong>

            </div>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout-btn">
                    🚪 Keluar
                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN --}}
    <main class="main">

        <header class="topbar">

            <div>

                <div class="topbar-title">
                    Sistem Manajemen Perpustakaan
                </div>

                <div class="topbar-subtitle">
                    Kelola koleksi buku dengan mudah
                </div>

            </div>

            <div class="profile">

                <div class="profile-name">
                    {{ auth()->user()->name ?? 'Admin' }}
                </div>

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

            </div>

        </header>


        <section class="content">

            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    ⚠️ Terdapat kesalahan pada input.
                </div>
            @endif

            @yield('content')

        </section>

    </main>

</body>
</html>