<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Tambahkan field yang boleh di-assign massal
    protected $fillable = [
        'judul', 'penulis', 'tahun_terbit', 'boleh_dipinjam'
    ];
}
