<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #172554, #2563eb, #38bdf8);
        }

        .login-card {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
        }

        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 18px;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: #172554;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 15px;
        }

        button {
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">📚</div>

    <h1>Perpustakaan</h1>
    <p class="subtitle">Sistem Pengelolaan Data Buku</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>

        <button type="submit">Login</button>
    </form>

</div>

</body>
</html>