<form action="{{ route('admin.buku.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="judul">Judul Buku</label>
    <input type="text" name="judul" value="{{ old('judul', $book->judul) }}" required>

    <label for="penulis">Penulis</label>
    <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}" required>

    <label for="tahun_terbit">Tahun Terbit</label>
    <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required>

    <label for="boleh_dipinjam">Boleh Dipinjam</label>
    <select name="boleh_dipinjam">
        <option value="1" {{ $book->boleh_dipinjam ? 'selected' : '' }}>Ya</option>
        <option value="0" {{ !$book->boleh_dipinjam ? 'selected' : '' }}>Tidak</option>
    </select>

    <button type="submit">Simpan Perubahan</button>
</form>
