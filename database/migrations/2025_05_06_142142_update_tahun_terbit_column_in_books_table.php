<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Mengubah kolom tahun_terbit menjadi tipe 'year'
            $table->year('tahun_terbit')->change();
        });
    }
    
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Mengembalikan kolom tahun_terbit ke tipe integer jika rollback
            $table->integer('tahun_terbit')->change();
        });
    }
    

};
