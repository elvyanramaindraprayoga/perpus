<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use pdf;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.buku.index', compact('books'));
    }
    

    public function create()
    {
        return view('admin.buku.create'); // Pastikan file view ini ada
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'boleh_dipinjam' => 'required|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('buku', 'public');
            $data['gambar'] = $gambar;
    }

        Book::create($data);

        return redirect()->route('admin.buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function katalog(Request $request)
    {
        $query = Book::query();

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where('judul', 'like', "%$cari%")
                ->orWhere('penulis', 'like', "%$cari%");
        }

        $books = $query->get();

        return view('user.katalog', compact('books'));
    }

    public function pinjam($id)
    {
        $book = Book::findOrFail($id);
    
        if (!$book->boleh_dipinjam) {
            return redirect()->route('user.katalog')->with('error', 'Buku ini tidak tersedia untuk dipinjam.');
        }
    
        Peminjaman::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => now(),
        ]);
    
        $book->update(['boleh_dipinjam' => false]);
    
        return redirect()->route('user.katalog')->with('success', 'Buku berhasil dipinjam.');
    }

        public function peminjaman()
    {
            $peminjaman = Peminjaman::with('book', 'user')->get();
            return view('admin.peminjaman', compact('peminjaman'));
    }

        public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'tanggal_kembali' => now(),
        ]);
        
        $buku = Book::find($peminjaman->book_id);
        $buku->update(['boleh_dipinjam' => true]);

        return redirect()->route('admin.peminjaman')->with('success', 'Buku telah dikembalikan.');
    }

        public function exportPdf()
    {
        $peminjaman = Peminjaman::with('book', 'user')->get();

        $pdf = PDF::loadView('admin.laporan_pdf', compact('peminjaman'));
        return $pdf->download('laporan_peminjaman.pdf');
    }


    public function show(Book $book)
    {
        
    }

    public function edit(Book $book)
    {
        
    }

    public function update(Request $request, Book $book)
    {
        
    }

    public function destroy(Book $book)
    {
        
    }

    
}
