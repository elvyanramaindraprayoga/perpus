<div class="max-w-4xl mx-auto mt-10">

    {{-- ✅ Notifikasi sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-3xl font-bold mb-6 text-center text-gray-700">Daftar Buku</h2>
    <a href="{{ route('buku.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Buku</a>

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4">Judul</th>
                <th class="py-2 px-4">Penulis</th>
                <th class="py-2 px-4">Tahun</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $book->judul }}</td>
                    <td class="py-2 px-4">{{ $book->penulis }}</td>
                    <td class="py-2 px-4">{{ $book->tahun_terbit }}</td>
                    <td class="py-2 px-4">
                        <span class="{{ $book->boleh_dipinjam ? 'text-green-600' : 'text-red-600' }}">
                            {{ $book->boleh_dipinjam ? 'Boleh Dipinjam' : 'Tidak' }}
                        </span>
                    </td>
                    <td class="py-2 px-4">
                        {{-- FORM HAPUS --}}
                        <form action="{{ route('admin.buku.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                Hapus
                            </button>
                        </form>

                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.buku.edit', $book->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 mt-2 inline-block">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
