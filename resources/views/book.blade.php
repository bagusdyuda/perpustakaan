@extends('layouts.mainlayout')

@section('title', 'Buku')

@section('content')
    <h3>List Buku</h3>

    <div class="my-4 d-flex justify-content-end">
        <a href="book-deleted" class="btn btn-secondary me-3">Pulihkan Buku</a>
        <a href="book-add" class="btn btn-primary">Tambah Buku</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-4">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/book-edit/{{ $item->slug }}">Edit</a>
                        <a href="/book-delete/{{ $item->slug }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
