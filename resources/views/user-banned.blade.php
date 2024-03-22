@extends('layouts.mainlayout')

@section('title', 'Pengguna Diblokir')

@section('content')
    <h3>List Pengguna Diblokir</h3>

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
                @foreach ($bannedUsers as $item)
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
                        <a href="/user-restore/{{ $item->slug }}">Pulihkan</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
