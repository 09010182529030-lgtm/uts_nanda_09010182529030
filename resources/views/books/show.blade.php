@extends('layouts.app')

@section('title', 'Detail Buku - Perpustakaan')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
        color: #172554;
        font-size: 30px;
        font-weight: 850;
    }

    .page-header p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 11px 16px;
        border-radius: 11px;
        background: white;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s;
    }

    .back-button:hover {
        background: #f8fafc;
        transform: translateY(-1px);
    }

    .detail-layout {
        display: grid;
        grid-template-columns: 330px minmax(0, 1fr);
        gap: 22px;
        align-items: start;
    }

    .book-card,
    .information-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 22px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    }

    /* =========================
       BOOK PROFILE
    ========================= */

    .book-card {
        padding: 25px;
        text-align: center;
    }

    .book-cover {
        width: 180px;
        height: 230px;
        margin: 5px auto 22px;
        border-radius: 18px;
        background: linear-gradient(145deg, #1d4ed8, #4338ca);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 70px;
        color: white;
        box-shadow:
            0 20px 35px rgba(37, 99, 235, .25),
            inset 0 1px 0 rgba(255,255,255,.20);
        position: relative;
        overflow: hidden;
    }

    .book-cover::before {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        top: -55px;
        right: -45px;
    }

    .book-cover::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        bottom: -35px;
        left: -25px;
    }

    .book-card h2 {
        margin: 0;
        color: #172554;
        font-size: 20px;
        line-height: 1.35;
    }

    .book-author {
        margin-top: 7px;
        color: #64748b;
        font-size: 12px;
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 14px;
        padding: 7px 13px;
        border-radius: 20px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 10px;
        font-weight: 800;
    }

    .book-actions {
        display: flex;
        gap: 8px;
        margin-top: 22px;
    }

    .book-actions a {
        flex: 1;
        padding: 11px 8px;
        border-radius: 10px;
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s;
    }

    .edit-button {
        background: #fff7ed;
        color: #ea580c;
    }

    .edit-button:hover {
        background: #ffedd5;
    }

    .delete-button {
        background: #fef2f2;
        color: #dc2626;
        border: none;
        cursor: pointer;
        font-family: inherit;
    }

    .delete-button:hover {
        background: #fee2e2;
    }

    /* =========================
       INFORMATION
    ========================= */

    .information-card {
        padding: 28px;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 18px;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 20px;
    }

    .section-heading h2 {
        margin: 0;
        color: #172554;
        font-size: 18px;
    }

    .section-heading span {
        color: #94a3b8;
        font-size: 11px;
    }

    .information-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .information-item {
        padding: 17px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        transition: .2s;
    }

    .information-item:hover {
        border-color: #bfdbfe;
        background: #f8fbff;
    }

    .information-icon {
        width: 35px;
        height: 35px;
        border-radius: 10px;
        background: #eff6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }

    .information-label {
        color: #94a3b8;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .information-value {
        color: #334155;
        font-size: 14px;
        font-weight: 800;
        margin-top: 5px;
        word-break: break-word;
    }

    .stock-section {
        margin-top: 22px;
        padding: 20px;
        border-radius: 15px;
        background: linear-gradient(
            135deg,
            #eff6ff,
            #eef2ff
        );
        border: 1px solid #dbeafe;
    }

    .stock-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .stock-header strong {
        color: #172554;
        font-size: 13px;
    }

    .stock-number {
        color: #2563eb;
        font-size: 18px;
        font-weight: 900;
    }

    .stock-bar {
        width: 100%;
        height: 8px;
        background: #dbeafe;
        border-radius: 20px;
        overflow: hidden;
    }

    .stock-progress {
        height: 100%;
        border-radius: 20px;
        background: linear-gradient(90deg, #2563eb, #6366f1);
    }

    .stock-text {
        margin-top: 8px;
        color: #64748b;
        font-size: 10px;
    }

    .metadata {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .metadata-item {
        flex: 1;
        padding: 13px;
        background: #f8fafc;
        border-radius: 11px;
        text-align: center;
    }

    .metadata-item small {
        display: block;
        color: #94a3b8;
        font-size: 9px;
        margin-bottom: 4px;
    }

    .metadata-item strong {
        color: #475569;
        font-size: 11px;
    }

    @media (max-width: 950px) {
        .detail-layout {
            grid-template-columns: 1fr;
        }

        .book-card {
            max-width: 500px;
            width: 100%;
            margin: auto;
        }
    }

    @media (max-width: 650px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .back-button {
            width: 100%;
            justify-content: center;
        }

        .information-grid {
            grid-template-columns: 1fr;
        }

        .information-card {
            padding: 20px;
        }

        .metadata {
            flex-direction: column;
        }
    }
</style>


{{-- HEADER --}}
<div class="page-header">

    <div>

        <h1>📖 Detail Buku</h1>

        <p>
            Informasi lengkap mengenai koleksi buku.
        </p>

    </div>

    <a
        href="{{ route('books.index') }}"
        class="back-button"
    >
        ← Kembali ke Daftar
    </a>

</div>


<div class="detail-layout">

    {{-- =========================
         KARTU BUKU
    ========================== --}}
    <div class="book-card">

        <div class="book-cover">
            📚
        </div>

        <h2>
            {{ $book->title }}
        </h2>

        <div class="book-author">
            Oleh <strong>{{ $book->author }}</strong>
        </div>

        <div class="category-badge">
            🏷️ {{ $book->category->name }}
        </div>


        <div class="book-actions">

            <a
                href="{{ route('books.edit', $book->id) }}"
                class="edit-button"
            >
                ✏️ Edit
            </a>


            <form
                action="{{ route('books.destroy', $book->id) }}"
                method="POST"
                style="flex:1; margin:0;"
                onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="delete-button"
                    style="width:100%; height:100%;"
                >
                    🗑️ Hapus
                </button>

            </form>

        </div>

    </div>


    {{-- =========================
         INFORMASI BUKU
    ========================== --}}
    <div class="information-card">

        <div class="section-heading">

            <div>
                <h2>📋 Informasi Buku</h2>
            </div>

            <span>
                ID #{{ $book->id }}
            </span>

        </div>


        <div class="information-grid">

            {{-- JUDUL --}}
            <div class="information-item">

                <div class="information-icon">
                    📖
                </div>

                <div class="information-label">
                    Judul Buku
                </div>

                <div class="information-value">
                    {{ $book->title }}
                </div>

            </div>


            {{-- PENULIS --}}
            <div class="information-item">

                <div class="information-icon">
                    👤
                </div>

                <div class="information-label">
                    Penulis
                </div>

                <div class="information-value">
                    {{ $book->author }}
                </div>

            </div>


            {{-- PENERBIT --}}
            <div class="information-item">

                <div class="information-icon">
                    🏢
                </div>

                <div class="information-label">
                    Penerbit
                </div>

                <div class="information-value">
                    {{ $book->publisher }}
                </div>

            </div>


            {{-- TAHUN --}}
            <div class="information-item">

                <div class="information-icon">
                    📅
                </div>

                <div class="information-label">
                    Tahun Terbit
                </div>

                <div class="information-value">
                    {{ $book->year }}
                </div>

            </div>


            {{-- KATEGORI --}}
            <div class="information-item">

                <div class="information-icon">
                    🏷️
                </div>

                <div class="information-label">
                    Kategori
                </div>

                <div class="information-value">
                    {{ $book->category->name }}
                </div>

            </div>


            {{-- STOK --}}
            <div class="information-item">

                <div class="information-icon">
                    📦
                </div>

                <div class="information-label">
                    Stok Saat Ini
                </div>

                <div class="information-value">
                    {{ $book->stock }} Buku
                </div>

            </div>

        </div>


        {{-- STOK --}}
        <div class="stock-section">

            <div class="stock-header">

                <strong>
                    📦 Ketersediaan Buku
                </strong>

                <div class="stock-number">
                    {{ $book->stock }}
                </div>

            </div>


            @php
                $stockPercent = min(($book->stock / 20) * 100, 100);
            @endphp

            <div class="stock-bar">

                <div
                    class="stock-progress"
                    style="width: {{ $stockPercent }}%;"
                ></div>

            </div>


            <div class="stock-text">

                @if($book->stock > 0)

                    ✅ Buku tersedia untuk dipinjam.

                @else

                    ❌ Stok buku sedang habis.

                @endif

            </div>

        </div>


        {{-- METADATA --}}
        <div class="metadata">

            <div class="metadata-item">

                <small>
                    ID BUKU
                </small>

                <strong>
                    #{{ $book->id }}
                </strong>

            </div>


            <div class="metadata-item">

                <small>
                    DIBUAT
                </small>

                <strong>
                    {{ $book->created_at->format('d M Y') }}
                </strong>

            </div>


            <div class="metadata-item">

                <small>
                    DIPERBARUI
                </small>

                <strong>
                    {{ $book->updated_at->format('d M Y') }}
                </strong>

            </div>

        </div>

    </div>

</div>

@endsection