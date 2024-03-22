@extends('layouts.mainlayout')

@section('title', 'Kategori')

@section('content')
    <h4>List Kategori</h4>

    <div class="my-3 d-flex justify-content-end">
        <a href="category-deleted" class="btn btn-secondary me-3">Pulihkan Kategori</a>
        <a href="category-add" class="btn btn-primary">Tambahkan Kategori</a>
    </div>

    <div class="mt-4">
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
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="category-edit/{{ $item->slug }}">Edit</a>
                        <a href="category-delete/{{ $item->slug }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
