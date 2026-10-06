@extends('layouts.app')

@section('title', 'Tambah Buku - Perpustakaan')

@section('content')

<style>
    .page-header {
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

    .form-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 22px;
        align-items: start;
    }

    .form-card,
    .info-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    }

    .form-card {
        padding: 28px;
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        padding-bottom: 20px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e2e8f0;
    }

    .heading-icon {
        width: 46px;
        height: 46px;
        border-radius: 13px;
        background: linear-gradient(135deg, #2563eb, #6366f1);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .card-heading h2 {
        margin: 0;
        color: #172554;
        font-size: 17px;
    }

    .card-heading p {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 11px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 19px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        color: #334155;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .required {
        color: #ef4444;
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
        height: 45px;
        padding: 0 14px 0 43px;
        border: 1px solid #cbd5e1;
        border-radius: 11px;
        background: #f8fafc;
        color: #1e293b;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .form-control:focus {
        background: white;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .08);
    }

    .error-text {
        color: #dc2626;
        font-size: 11px;
        margin-top: 6px;
    }

    .button-area {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 24px;
        margin-top: 25px;
        border-top: 1px solid #e2e8f0;
    }

    .btn {
        border: none;
        border-radius: 11px;
        padding: 12px 18px;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: .2s;
        text-decoration: none;
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
    }

    .btn-save {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: white;
        box-shadow: 0 7px 18px rgba(37, 99, 235, .20);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 23px rgba(37, 99, 235, .28);
    }

    /* INFO */

    .info-card {
        padding: 22px;
    }

    .info-card h3 {
        margin: 0 0 18px;
        color: #172554;
        font-size: 15px;
    }

    .info-item {
        display: flex;
        gap: 11px;
        padding: 13px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-icon {
        width: 32px;
        height: 32px;
        flex-shrink: 0;
        border-radius: 9px;
        background: #eff6ff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-item strong {
        display: block;
        color: #334155;
        font-size: 12px;
        margin-bottom: 3px;
    }

    .info-item span {
        color: #94a3b8;
        font-size: 11px;
        line-height: 1.5;
    }

    @media (max-width: 950px) {
        .form-layout {
            grid-template-columns: 1fr;
        }

        .info-card {
            order: -1;
        }
    }

    @media (max-width: 650px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-card {
            padding: 20px;
        }

        .button-area {
            flex-direction: column;
        }

        .btn {
            justify-content: center;
        }
    }
</style>


<div class="page-header">

    <h1>➕ Tambah Buku</h1>

    <p>
        Tambahkan koleksi buku baru ke dalam sistem perpustakaan.
    </p>

</div>


<div class="form-layout">

    {{-- FORM --}}
    <div class="form-card">

        <div class="card-heading">

            <div class="heading-icon">
                📚
            </div>

            <div>
                <h2>Informasi Buku</h2>

                <p>
                    Lengkapi data buku dengan benar.
                </p>
            </div>

        </div>


        <form action="{{ route('books.store') }}" method="POST">

            @csrf

            <div class="form-grid">

                {{-- JUDUL --}}
                <div class="form-group full">

                    <label for="title">
                        Judul Buku <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">📖</span>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Laskar Pelangi"
                            required
                        >

                    </div>

                    @error('title')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>


                {{-- PENULIS --}}
                <div class="form-group">

                    <label for="author">
                        Penulis <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">👤</span>

                        <input
                            type="text"
                            id="author"
                            name="author"
                            class="form-control"
                            value="{{ old('author') }}"
                            placeholder="Nama penulis"
                            required
                        >

                    </div>

                    @error('author')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>


                {{-- PENERBIT --}}
                <div class="form-group">

                    <label for="publisher">
                        Penerbit <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">🏢</span>

                        <input
                            type="text"
                            id="publisher"
                            name="publisher"
                            class="form-control"
                            value="{{ old('publisher') }}"
                            placeholder="Nama penerbit"
                            required
                        >

                    </div>

                    @error('publisher')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>


                {{-- TAHUN --}}
                <div class="form-group">

                    <label for="year">
                        Tahun Terbit <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">📅</span>

                        <input
                            type="number"
                            id="year"
                            name="year"
                            class="form-control"
                            value="{{ old('year') }}"
                            min="1900"
                            max="{{ date('Y') }}"
                            placeholder="Contoh: 2024"
                            required
                        >

                    </div>

                    @error('year')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>


                {{-- STOK --}}
                <div class="form-group">

                    <label for="stock">
                        Stok <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">📦</span>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            class="form-control"
                            value="{{ old('stock', 0) }}"
                            min="0"
                            placeholder="Jumlah stok"
                            required
                        >

                    </div>

                    @error('stock')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>


                {{-- KATEGORI --}}
                <div class="form-group full">

                    <label for="category_id">
                        Kategori <span class="required">*</span>
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">🏷️</span>

                        <select
                            id="category_id"
                            name="category_id"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    @error('category_id')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="button-area">

                <a
                    href="{{ route('books.index') }}"
                    class="btn btn-cancel"
                >
                    ↩️ Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    💾 Simpan Buku
                </button>

            </div>

        </form>

    </div>


    {{-- INFORMASI --}}
    <div class="info-card">

        <h3>💡 Panduan Pengisian</h3>

        <div class="info-item">

            <div class="info-icon">
                📖
            </div>

            <div>
                <strong>Judul Buku</strong>
                <span>
                    Masukkan judul buku sesuai dengan data sebenarnya.
                </span>
            </div>

        </div>


        <div class="info-item">

            <div class="info-icon">
                👤
            </div>

            <div>
                <strong>Penulis</strong>
                <span>
                    Masukkan nama lengkap penulis buku.
                </span>
            </div>

        </div>


        <div class="info-item">

            <div class="info-icon">
                🏷️
            </div>

            <div>
                <strong>Kategori</strong>
                <span>
                    Pilih kategori yang sesuai dengan buku.
                </span>
            </div>

        </div>


        <div class="info-item">

            <div class="info-icon">
                📦
            </div>

            <div>
                <strong>Stok</strong>
                <span>
                    Masukkan jumlah buku yang tersedia.
                </span>
            </div>

        </div>

    </div>

</div>

@endsection