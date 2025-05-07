<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Buku</h2>
    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $p)
            <tr>
                <td>{{ $p->book->judul }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') }}</td>
                <td>
                    @if($p->tanggal_kembali)
                        {{ \Carbon\Carbon::parse($p->tanggal_kembali)->format('d-m-Y') }}
                    @else
                        Belum kembali
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
