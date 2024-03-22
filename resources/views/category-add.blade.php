@extends('layouts.mainlayout')

@section('title', 'Tambahkan Kategori')

@section('content')

    <h1>Tambahkan Kategori Baru</h1>

    <div class="mt-4 w-50">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="category-add" method="POST">
            @csrf
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Tambahkan Kategori">
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>

@endsection
