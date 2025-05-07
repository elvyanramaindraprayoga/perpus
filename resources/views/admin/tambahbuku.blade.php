<form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- kolom lain tetap -->
    <div class="mb-4">
        <label for="gambar" class="block font-semibold text-gray-700">Gambar Buku</label>
        <input type="file" name="gambar" id="gambar" class="border rounded w-full p-2">
    </div>
    <!-- submit button -->
</form>
