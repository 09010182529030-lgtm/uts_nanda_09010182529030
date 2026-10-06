@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

<div class="page-header">
    <div>
        <h1>➕ Tambah Buku</h1>
        <p>Tambahkan buku baru ke perpustakaan.</p>
    </div>
</div>

<div class="form-card">

    <form action="{{ route('books.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Judul Buku</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Penulis</label>
            <input
                type="text"
                name="author"
                class="form-control"
                value="{{ old('author') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Penerbit</label>
            <input
                type="text"
                name="publisher"
                class="form-control"
                value="{{ old('publisher') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input
                type="number"
                name="year"
                class="form-control"
                value="{{ old('year') }}"
                min="1900"
                max="2100"
                required
            >
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input
                type="number"
                name="stock"
                class="form-control"
                value="{{ old('stock', 0) }}"
                min="0"
                required
            >
        </div>

        <div class="form-group">
            <label>Kategori</label>

            <select
                name="category_id"
                class="form-control"
                required
            >

                <option value="">-- Pilih Kategori --</option>

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

        <div style="display:flex;gap:10px;">

            <button type="submit" class="btn btn-primary">
                Simpan Buku
            </button>

            <a
                href="{{ route('books.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection