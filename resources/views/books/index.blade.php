@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<div class="page-header">
    <div>
        <h1>📚 Daftar Buku</h1>
        <p>Kelola seluruh koleksi buku perpustakaan.</p>
    </div>

    <a href="{{ route('books.create') }}" class="btn btn-primary">
        + Tambah Buku
    </a>
</div>

<div class="search-box">

    <form action="{{ route('books.index') }}" method="GET" class="search-form">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari judul atau penulis..."
        >

        <select name="category_id">
            <option value="">Semua Kategori</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ request('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">
            🔍 Cari
        </button>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Reset
        </a>

    </form>

</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($books as $book)

            <tr>

                <td>
                    {{ $books->firstItem() + $loop->index }}
                </td>

                <td>
                    <strong>{{ $book->title }}</strong>
                </td>

                <td>
                    {{ $book->author }}
                </td>

                <td>
                    {{ $book->publisher }}
                </td>

                <td>
                    {{ $book->year }}
                </td>

                <td>
                    {{ $book->stock }}
                </td>

                <td>
                    {{ $book->category->name }}
                </td>

                <td>

                    <div class="actions">

                        <a
                            href="{{ route('books.show', $book) }}"
                            class="btn btn-primary"
                        >
                            Detail
                        </a>

                        <a
                            href="{{ route('books.edit', $book) }}"
                            class="btn btn-warning"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('books.destroy', $book) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="8" style="text-align:center;padding:40px;">
                    Belum ada data buku.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="pagination">
        {{ $books->links() }}
    </div>

</div>

@endsection