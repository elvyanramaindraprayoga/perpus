<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-700">Tambah Buku</h2>
    <form method="POST" action="{{ route('buku.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-600">Judul</label>
            <input type="text" name="judul" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-600">Penulis</label>
            <input type="text" name="penulis" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-600">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-600">Boleh Dipinjam?</label>
            <select name="boleh_dipinjam" class="w-full border p-2 rounded">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Buku
        </button>
    </form>
</div>
