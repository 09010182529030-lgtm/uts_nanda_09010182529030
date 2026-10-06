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
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        nav {
            background: linear-gradient(135deg, #172554, #2563eb);
            color: white;
            padding: 16px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,.15);
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
        }

        .brand small {
            display: block;
            font-size: 11px;
            opacity: .8;
            font-weight: normal;
            margin-top: 3px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-right span {
            font-size: 14px;
        }

        .logout {
            border: none;
            background: rgba(255,255,255,.15);
            color: white;
            padding: 9px 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        .logout:hover {
            background: rgba(255,255,255,.25);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .page-header h1 {
            margin: 0;
            color: #172554;
        }

        .page-header p {
            margin: 6px 0 0;
            color: #64748b;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 9px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .search-box {
            background: white;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(15,23,42,.06);
            margin-bottom: 22px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-form input,
        .search-form select {
            flex: 1;
            min-width: 200px;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(15,23,42,.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #eff6ff;
            color: #172554;
            text-align: left;
            padding: 15px;
        }

        td {
            padding: 14px 15px;
            border-top: 1px solid #e2e8f0;
        }

        tr:hover td {
            background: #f8fafc;
        }

        .actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(15,23,42,.07);
            max-width: 750px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
        }

        .detail-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(15,23,42,.07);
            max-width: 800px;
            margin: auto;
        }

        .detail-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-label {
            width: 180px;
            font-weight: bold;
            color: #475569;
        }

        .pagination {
            padding: 20px;
        }

        @media (max-width: 700px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }

            .detail-row {
                flex-direction: column;
                gap: 5px;
            }

            .detail-label {
                width: auto;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="brand">
        📚 Perpustakaan
        <small>Sistem Pengelolaan Data Buku</small>
    </div>

    <div class="nav-right">
        <span>{{ auth()->user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout" type="submit">
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul style="margin:0;padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>