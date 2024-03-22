<h3>List Riwayat Peminjaman</h3>

<div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Tanggal Asli Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
            <tr class="{{ $item->actual_retrun_date == null ? '' : ($item->return_date < $item->actual_retrun_date ? 'text-bg-success !important' : 'text-bg-success !important' ) }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->username }}</td>
                <td>{{ $item->book->title }}</td>
                <td>{{ $item->rent_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->actual_retrun_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
