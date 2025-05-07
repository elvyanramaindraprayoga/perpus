<div class="max-w-xl mx-auto bg-gray-900 text-white shadow-xl rounded-xl p-8 mt-12">
    <h2 class="text-3xl font-semibold mb-6 text-center text-white">📚 Tambah Buku</h2>
    <form method="POST" action="{{ route('buku.store') }}">
        @csrf

        <div class="mb-5">
            <label class="block mb-1 text-gray-300">Judul</label>
            <input type="text" name="judul" class="w-full bg-gray-800 border border-gray-700 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-5">
            <label class="block mb-1 text-gray-300">Penulis</label>
            <input type="text" name="penulis" class="w-full bg-gray-800 border border-gray-700 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-5">
            <label class="block mb-1 text-gray-300">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="w-full bg-gray-800 border border-gray-700 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-6">
            <label class="block mb-1 text-gray-300">Boleh Dipinjam?</label>
            <select name="boleh_dipinjam" class="w-full bg-gray-800 border border-gray-700 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 transition duration-300 px-6 py-3 rounded-lg text-white font-medium">
                💾 Simpan Buku
            </button>
        </div>
    </form>
</div>
