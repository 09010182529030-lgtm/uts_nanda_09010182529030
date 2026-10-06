<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Perpustakaan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at 10% 10%, rgba(59,130,246,.35), transparent 30%),
                radial-gradient(circle at 90% 90%, rgba(99,102,241,.30), transparent 30%),
                linear-gradient(135deg, #0f172a, #172554, #312e81);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            min-height: 590px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            background: rgba(255,255,255,.97);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0,0,0,.35);
        }

        /* =========================
           LEFT
        ========================== */

        .login-banner {
            position: relative;
            overflow: hidden;
            padding: 55px;
            background: linear-gradient(145deg, #1d4ed8, #312e81);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,.07);
        }

        .shape-one {
            width: 300px;
            height: 300px;
            right: -130px;
            top: -100px;
        }

        .shape-two {
            width: 240px;
            height: 240px;
            left: -130px;
            bottom: -100px;
        }

        .brand {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 38px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            border-radius: 17px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 12px 25px rgba(0,0,0,.12);
        }

        .brand-text strong {
            display: block;
            font-size: 17px;
        }

        .brand-text span {
            color: #bfdbfe;
            font-size: 11px;
        }

        .login-banner h1 {
            position: relative;
            font-size: 39px;
            line-height: 1.15;
            margin-bottom: 17px;
            max-width: 430px;
        }

        .login-banner > p {
            position: relative;
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.8;
            max-width: 420px;
        }

        .feature-list {
            position: relative;
            margin-top: 32px;
            display: grid;
            gap: 12px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #eff6ff;
            font-size: 13px;
        }

        .feature-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: rgba(255,255,255,.10);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================
           RIGHT
        ========================== */

        .login-form-area {
            padding: 55px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome .mini-icon {
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 17px;
        }

        .welcome h2 {
            color: #172554;
            font-size: 27px;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #64748b;
            font-size: 13px;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 11px;
            margin-bottom: 17px;
            font-size: 12px;
        }

        .alert-danger {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
            font-size: 12px;
            font-weight: 800;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            height: 46px;
            border: 1px solid #cbd5e1;
            border-radius: 11px;
            background: #f8fafc;
            padding: 0 14px 0 43px;
            color: #1e293b;
            font-size: 13px;
            outline: none;
            transition: .2s;
        }

        .form-control:focus {
            background: white;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37,99,235,.08);
        }

        .error-text {
            color: #dc2626;
            font-size: 11px;
            margin-top: 5px;
        }

        .login-button {
            width: 100%;
            height: 47px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(37,99,235,.22);
            transition: .2s;
            margin-top: 5px;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37,99,235,.30);
        }

        .account-box {
            margin-top: 20px;
            padding: 14px 15px;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            font-size: 11px;
            color: #64748b;
            line-height: 1.7;
        }

        .account-box strong {
            color: #334155;
        }

        .footer {
            text-align: center;
            margin-top: 22px;
            color: #94a3b8;
            font-size: 10px;
        }

        @media (max-width: 800px) {

            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .login-banner {
                padding: 35px;
            }

            .login-banner h1 {
                font-size: 30px;
            }

            .feature-list {
                display: none;
            }

            .login-form-area {
                padding: 40px 30px;
            }
        }

        @media (max-width: 450px) {

            body {
                padding: 12px;
            }

            .login-banner {
                padding: 30px 25px;
            }

            .login-form-area {
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    {{-- LEFT --}}
    <div class="login-banner">

        <div class="shape shape-one"></div>
        <div class="shape shape-two"></div>

        <div class="brand">

            <div class="brand-icon">
                📚
            </div>

            <div class="brand-text">

                <strong>Perpustakaan</strong>

                <span>
                    Library Management System
                </span>

            </div>

        </div>


        <h1>
            Kelola Koleksi Buku dengan Lebih Mudah.
        </h1>

        <p>
            Sistem manajemen perpustakaan yang membantu
            mengelola koleksi buku secara cepat, teratur,
            dan efisien.
        </p>


        <div class="feature-list">

            <div class="feature">

                <div class="feature-icon">
                    📚
                </div>

                <span>
                    Manajemen koleksi buku
                </span>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    🔎
                </div>

                <span>
                    Pencarian dan filter buku
                </span>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    🏷️
                </div>

                <span>
                    Pengelolaan kategori
                </span>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    🔐
                </div>

                <span>
                    Akses administrator
                </span>

            </div>

        </div>

    </div>


    {{-- RIGHT --}}
    <div class="login-form-area">

        <div class="welcome">

            <div class="mini-icon">
                👋
            </div>

            <h2>
                Selamat Datang
            </h2>

            <p>
                Masuk ke dashboard perpustakaan Anda.
            </p>

        </div>


        @if(session('error'))

            <div class="alert alert-danger">
                ⚠️ {{ session('error') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger">
                ⚠️ Email atau password yang dimasukkan salah.
            </div>

        @endif


        <form
            action="{{ route('login.process') }}"
            method="POST"
        >

            @csrf


            {{-- EMAIL --}}
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        ✉️
                    </span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                    >

                </div>

                @error('email')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- PASSWORD --}}
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        🔒
                    </span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                </div>

                @error('password')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <button
                type="submit"
                class="login-button"
            >
                🔐 Masuk ke Dashboard
            </button>

        </form>


        <div class="account-box">

            <strong>🔑 Akun Administrator</strong><br>

            Email:
            <strong>admin@gmail.com</strong><br>

            Password:
            <strong>admin123</strong>

        </div>


        <div class="footer">
            © {{ date('Y') }} Sistem Perpustakaan
        </div>

    </div>

</div>

</body>
</html>