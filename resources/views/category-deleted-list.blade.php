@extends('layouts.mainlayout')

@section('title', 'Histori Kategori')

@section('content')
    <h3>Histori List Kategori</h3>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/categories" class="btn btn-primary">Kembali</a>
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
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedCategories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="category-restore/{{ $item->slug }}">Pulihkan</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
