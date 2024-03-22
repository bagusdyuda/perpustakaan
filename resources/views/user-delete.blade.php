@extends('layouts.mainlayout')

@section('title', 'Hapus User')

@section('content')
    <h2>Apakah kamu yakin ingin menghapus pengguna {{ $user->username }}???</h2>
    <div class="mt-5">
        <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger me-5">Hapus</a>
        <a href="/users" class="btn btn-primary">Kembali</a>
    </div>
@endsection
