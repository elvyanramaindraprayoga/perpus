<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->year('tahun_terbit');
            $table->boolean('boleh_dipinjam')->default(true); // status pinjam
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
