@extends('layouts.mainlayout')

@section('title', 'Riwayat Peminjaman')

@section('content')

    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
