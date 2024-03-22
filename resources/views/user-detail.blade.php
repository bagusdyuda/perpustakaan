@extends('layouts.mainlayout')

@section('title', 'Pengguna')

@section('content')
    <h3>Detail Pengguna</h3>

    <div class="mt-3 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-info">Aktifkan Pengguna</a>
        @endif
    </div>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-3 w-25">
        <div class="mb-2">
            <label for="" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" readonly value="{{ $user->username }}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">No. Telephone</label>
            <input type="text" class="form-control" readonly value="{{ $user->phone }}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Alamat</label>
            <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize: none">{{ $user->address }}</textarea>
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}">
        </div>
    </div>

    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
