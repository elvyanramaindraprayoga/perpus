<div class="max-w-5xl mx-auto mt-10">
    <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Katalog Buku</h2>

    <form method="GET" action="{{ route('user.katalog') }}" class="mb-6 flex justify-center">
        <input type="text" name="cari" placeholder="Cari judul atau penulis"
               class="border p-2 rounded-l w-1/2" value="{{ request('cari') }}">
        <button type="submit" class="bg-blue-600 text-white px-4 rounded-r hover:bg-blue-700">
            Cari
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($books as $book)
        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition">
        @if($book->gambar)
        <img src="{{ asset('storage/' . $book->gambar) }}" alt="Sampul Buku" class="w-full h-48 object-cover rounded mb-3">
        @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 rounded mb-3">
        Tidak ada gambar
        </div>
        @endif
    <h3 class="text-xl font-semibold text-blue-700">{{ $book->judul }}</h3>
            <p class="text-gray-600">Penulis: {{ $book->penulis }}</p>
            <p class="text-gray-600">Tahun: {{ $book->tahun_terbit }}</p>
            <p class="mt-2 font-semibold {{ $book->boleh_dipinjam ? 'text-green-600' : 'text-red-600' }}">
                {{ $book->boleh_dipinjam ? 'Boleh Dipinjam' : 'Tidak Bisa Dipinjam' }}
            </p>
            @if($book->boleh_dipinjam)
            <a href="{{ route('user.pinjam', $book->id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mt-4 inline-block">
                Pinjam Buku
            </a>
            @endif
        </div>
        @empty
        <p class="text-center col-span-3 text-gray-500">Buku tidak ditemukan.</p>
        @endforelse
    </div>
</div>