@extends('layouts.mainlayout')

@section('title', 'Edit Kategori')

@section('content')

    <h1>Edit Kategori</h1>

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

        <form action="/category-edit/{{ $category->slug }}" method="POST">
            @csrf
            @method('put')
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Nama Kategori">
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Perbarui</button>
            </div>
        </form>
    </div>

@endsection
