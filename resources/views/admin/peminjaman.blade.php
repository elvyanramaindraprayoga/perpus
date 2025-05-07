<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Daftar Peminjaman</h2>

    <a href="{{ route('admin.peminjaman.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
    Export PDF
</a>


    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4">Buku</th>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Tanggal Pinjam</th>
                <th class="py-2 px-4">Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
                @foreach($peminjaman as $pinjam)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $pinjam->book->judul }}</td>
                <td class="py-2 px-4">{{ $pinjam->user->name }}</td>
                <td class="py-2 px-4">{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->format('d-m-Y') }}</td>
<td class="py-2 px-4">
    @if($pinjam->tanggal_kembali)
        {{ \Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d-m-Y') }}
    @else
        <a href="{{ route('admin.kembalikan', $pinjam->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
            Tandai Dikembalikan
        </a>
    @endif
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
