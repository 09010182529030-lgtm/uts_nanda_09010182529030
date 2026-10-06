@extends('layouts.app')

@section('title', 'Daftar Buku - Perpustakaan')

@section('content')

<style>
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .dashboard-header h1 {
        margin: 0;
        color: #172554;
        font-size: 30px;
        font-weight: 850;
        letter-spacing: -.5px;
    }

    .dashboard-header p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .add-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: white;
        padding: 12px 18px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 8px 20px rgba(37, 99, 235, .20);
        transition: .2s;
    }

    .add-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(37, 99, 235, .28);
    }

    /* STATISTIK */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 22px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 21px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        right: -30px;
        top: -35px;
        background: rgba(59, 130, 246, .07);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .blue {
        background: #dbeafe;
    }

    .purple {
        background: #ede9fe;
    }

    .green {
        background: #dcfce7;
    }

    .stat-label {
        margin-top: 17px;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
    }

    .stat-value {
        margin-top: 4px;
        color: #172554;
        font-size: 25px;
        font-weight: 850;
    }

    /* SEARCH */

    .filter-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 20px;
        margin-bottom: 22px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    }

    .filter-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .filter-header-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #eff6ff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .filter-header h3 {
        margin: 0;
        color: #172554;
        font-size: 15px;
    }

    .filter-form {
        display: grid;
        grid-template-columns: 1fr 220px auto;
        gap: 10px;
    }

    .search-wrapper {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
    }

    .search-input,
    .category-select {
        width: 100%;
        height: 45px;
        border: 1px solid #cbd5e1;
        border-radius: 11px;
        background: #f8fafc;
        padding: 0 14px;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .search-input {
        padding-left: 42px;
    }

    .search-input:focus,
    .category-select:focus {
        background: white;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .08);
    }

    .search-button {
        border: none;
        height: 45px;
        padding: 0 20px;
        border-radius: 11px;
        background: #172554;
        color: white;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .search-button:hover {
        background: #1e40af;
    }

    /* TABLE */

    .table-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    }

    .table-header {
        padding: 20px 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e2e8f0;
    }

    .table-title h2 {
        margin: 0;
        color: #172554;
        font-size: 16px;
    }

    .table-title p {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 11px;
    }

    .book-count {
        padding: 7px 11px;
        background: #eff6ff;
        color: #1d4ed8;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead th {
        background: #f8fafc;
        color: #64748b;
        text-align: left;
        padding: 13px 18px;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: 800;
        white-space: nowrap;
    }

    tbody td {
        padding: 16px 18px;
        border-top: 1px solid #f1f5f9;
        font-size: 13px;
        color: #475569;
        vertical-align: middle;
    }

    tbody tr {
        transition: .15s;
    }

    tbody tr:hover {
        background: #f8fbff;
    }

    .book-name {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 230px;
    }

    .book-cover-small {
        width: 42px;
        height: 52px;
        border-radius: 9px;
        background: linear-gradient(145deg, #2563eb, #4f46e5);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        flex-shrink: 0;
        box-shadow: 0 5px 12px rgba(37, 99, 235, .18);
    }

    .book-title {
        color: #172554;
        font-weight: 800;
        font-size: 13px;
    }

    .book-id {
        margin-top: 3px;
        color: #94a3b8;
        font-size: 10px;
    }

    .category-badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 10px;
        font-weight: 800;
    }

    .year-badge {
        color: #475569;
        font-weight: 700;
    }

    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
    }

    .stock-good {
        background: #dcfce7;
        color: #15803d;
    }

    .stock-empty {
        background: #fee2e2;
        color: #b91c1c;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .action-btn {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: .18s;
        font-size: 14px;
        text-decoration: none;
    }

    .action-view {
        background: #eff6ff;
        color: #2563eb;
    }

    .action-edit {
        background: #fff7ed;
        color: #ea580c;
    }

    .action-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .empty-icon {
        font-size: 50px;
        margin-bottom: 12px;
    }

    .empty-state h3 {
        color: #334155;
        margin: 0 0 5px;
    }

    .empty-state p {
        color: #94a3b8;
        margin: 0;
        font-size: 13px;
    }

    .pagination-area {
        padding: 18px 22px;
        border-top: 1px solid #e2e8f0;
    }

    /* RESPONSIVE */

    @media (max-width: 900px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }

        .search-button {
            width: 100%;
        }

        .dashboard-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 600px) {

        .dashboard-header h1 {
            font-size: 24px;
        }

        .add-button {
            width: 100%;
            justify-content: center;
        }

        .table-header {
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>


{{-- HEADER --}}
<div class="dashboard-header">

    <div>
        <h1>📚 Daftar Buku</h1>

        <p>
            Kelola seluruh koleksi buku perpustakaan dari satu tempat.
        </p>
    </div>

    <a href="{{ route('books.create') }}" class="add-button">
        ➕ Tambah Buku
    </a>

</div>


{{-- STATISTIK --}}
<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon blue">
                📚
            </div>

        </div>

        <div class="stat-label">
            TOTAL BUKU
        </div>

        <div class="stat-value">
            {{ $books->total() }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon purple">
                📦
            </div>

        </div>

        <div class="stat-label">
            TOTAL STOK
        </div>

        <div class="stat-value">
            {{ \App\Models\Book::sum('stock') }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon green">
                🏷️
            </div>

        </div>

        <div class="stat-label">
            TOTAL KATEGORI
        </div>

        <div class="stat-value">
            {{ $categories->count() }}
        </div>

    </div>

</div>


{{-- FILTER --}}
<div class="filter-card">

    <div class="filter-header">

        <div class="filter-header-icon">
            🔎
        </div>

        <h3>
            Cari & Filter Buku
        </h3>

    </div>

    <form action="{{ route('books.index') }}" method="GET">

        <div class="filter-form">

            <div class="search-wrapper">

                <span class="search-icon">
                    🔍
                </span>

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    value="{{ request('search') }}"
                    placeholder="Cari berdasarkan judul atau penulis..."
                >

            </div>

            <select name="category_id" class="category-select">

                <option value="">
                    Semua Kategori
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            <button type="submit" class="search-button">
                🔍 Cari
            </button>

        </div>

    </form>

</div>


{{-- TABLE --}}
<div class="table-card">

    <div class="table-header">

        <div class="table-title">

            <h2>
                Koleksi Buku
            </h2>

            <p>
                Daftar seluruh buku yang tersedia
            </p>

        </div>

        <div class="book-count">
            {{ $books->total() }} Buku
        </div>

    </div>


    @if($books->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($books as $book)

                        <tr>

                            <td>

                                <div class="book-name">

                                    <div class="book-cover-small">
                                        📖
                                    </div>

                                    <div>

                                        <div class="book-title">
                                            {{ $book->title }}
                                        </div>

                                        <div class="book-id">
                                            ID #{{ $book->id }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            <td>
                                {{ $book->author }}
                            </td>


                            <td>

                                <span class="category-badge">
                                    {{ $book->category->name }}
                                </span>

                            </td>


                            <td>

                                <span class="year-badge">
                                    {{ $book->year }}
                                </span>

                            </td>


                            <td>

                                @if($book->stock > 0)

                                    <span class="stock-badge stock-good">
                                        ● {{ $book->stock }} tersedia
                                    </span>

                                @else

                                    <span class="stock-badge stock-empty">
                                        ● Habis
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="actions">

                                    <a
                                        href="{{ route('books.show', $book->id) }}"
                                        class="action-btn action-view"
                                        title="Detail"
                                    >
                                        👁️
                                    </a>

                                    <a
                                        href="{{ route('books.edit', $book->id) }}"
                                        class="action-btn action-edit"
                                        title="Edit"
                                    >
                                        ✏️
                                    </a>

                                    <form
                                        action="{{ route('books.destroy', $book->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                        style="margin:0;"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus"
                                        >
                                            🗑️
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <div class="pagination-area">
            {{ $books->links() }}
        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">
                📭
            </div>

            <h3>
                Buku tidak ditemukan
            </h3>

            <p>
                Coba gunakan kata kunci pencarian atau kategori yang berbeda.
            </p>

        </div>

    @endif

</div>

@endsection