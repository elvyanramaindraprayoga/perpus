@extends('layouts.app') {{-- pastikan layout app.blade.php sudah ada --}}

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-700">Edit Data Buku</h2>

    {{-- Notifikasi sukses jika ada --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form untuk mengedit buku --}}
    <form action="{{ route('admin.buku.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Input Judul Buku --}}
        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" name="judul" value="{{ old('judul', $book->judul) }}" required class="mt-1 block w-full px-4 py-2 rounded border-gray-300 shadow-sm">
        </div>

        {{-- Input Penulis Buku --}}
        <div>
            <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}" required class="mt-1 block w-full px-4 py-2 rounded border-gray-300 shadow-sm">
        </div>

        {{-- Input Tahun Terbit --}}
        <div>
            <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required class="mt-1 block w-full px-4 py-2 rounded border-gray-300 shadow-sm">
        </div>

        {{-- Dropdown Boleh Dipinjam --}}
        <div>
            <label for="boleh_dipinjam" class="block text-sm font-medium text-gray-700">Boleh Dipinjam?</label>
            <select name="boleh_dipinjam" class="mt-1 block w-full px-4 py-2 rounded border-gray-300 shadow-sm">
                <option value="1" {{ $book->boleh_dipinjam ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$book->boleh_dipinjam ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>

        {{-- Tombol Submit --}}
        <div class="text-center mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
