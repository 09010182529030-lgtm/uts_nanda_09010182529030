@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="page-header">
    <div>
        <h1>✏️ Edit Buku</h1>
        <p>Perbarui informasi buku.</p>
    </div>
</div>

<div class="form-card">

    <form action="{{ route('books.update', $book) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Judul Buku</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $book->title) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Penulis</label>
            <input
                type="text"
                name="author"
                class="form-control"
                value="{{ old('author', $book->author) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Penerbit</label>
            <input
                type="text"
                name="publisher"
                class="form-control"
                value="{{ old('publisher', $book->publisher) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input
                type="number"
                name="year"
                class="form-control"
                value="{{ old('year', $book->year) }}"
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
                value="{{ old('stock', $book->stock) }}"
                min="0"
                required
            >
        </div>

        <div class="form-group">
            <label>Kategori</label>

            <select name="category_id" class="form-control" required>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <div style="display:flex;gap:10px;">

            <button type="submit" class="btn btn-warning">
                Simpan Perubahan
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