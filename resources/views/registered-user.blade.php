@extends('layouts.mainlayout')

@section('title', 'Pengguna')

@section('content')
    <h3>List Pengguna Teregistrasi</h3>

    <div class="my-3 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary">List Pengguna Yang Diterima</a>
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
                @foreach ($registeredUsers as $item)
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
