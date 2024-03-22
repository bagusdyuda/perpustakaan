@extends('layouts.mainlayout')

@section('title', 'Pengguna')

@section('content')
    <h3>List Pengguna</h3>

    <div class="my-3 d-flex justify-content-end">
        <a href="/user-banned" class="btn btn-secondary me-3">Pengguna Diblokir</a>
        <a href="/registered-users" class="btn btn-primary">Pengguna Registrasi Baru</a>
    </div>

    <div class="mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengguna</th>
                    <th>No. Telephone</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-detail/{{ $item->slug }}">Detail</a>
                        <a href="/user-ban/{{ $item->slug }}">Blokir Pengguna</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
