@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

<div class="page-header">
    <div>
        <h1>📖 Detail Buku</h1>
        <p>Informasi lengkap buku.</p>
    </div>
</div>

<div class="detail-card">

    <div class="detail-row">
        <div class="detail-label">Judul Buku</div>
        <div>{{ $book->title }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Penulis</div>
        <div>{{ $book->author }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Penerbit</div>
        <div>{{ $book->publisher }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Tahun Terbit</div>
        <div>{{ $book->year }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Stok</div>
        <div>{{ $book->stock }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Kategori</div>
        <div>{{ $book->category->name }}</div>
    </div>

    <div style="margin-top:25px;display:flex;gap:10px;">

        <a
            href="{{ route('books.edit', $book) }}"
            class="btn btn-warning"
        >
            Edit Buku
        </a>

        <a
            href="{{ route('books.index') }}"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>

</div>

@endsection
