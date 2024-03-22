@extends('layouts.mainlayout')

@section('title', 'Riwayat Peminjaman')

@section('content')
    <h3>List Riwayat Peminjaman</h3>

    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
