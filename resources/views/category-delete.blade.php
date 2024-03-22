@extends('layouts.mainlayout')

@section('title', 'Hapus Kategori')

@section('content')
    <h2>Apakah kamu yakin ingin menghapus kategori {{ $category->name }}???</h2>
    <div class="mt-5">
        <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger me-5">Hapus</a>
        <a href="/categories" class="btn btn-primary">Kembali</a>
    </div>
@endsection
