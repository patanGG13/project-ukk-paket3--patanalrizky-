<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('input_aspirasis', function (Blueprint $table) {
    $table->integer('id_pelaporan')->primary(); // Id_pelaporan(int,5)
    $table->integer('nis'); // nis(int, 10)
    $table->integer('id_kategori'); // id_kategori(int,5)
    $table->string('lokasi', 50); // lokasi(varchar,50)
    $table->string('ket', 50); // ket(varchar,50)
    $table->timestamps();
    
    // Foreign keys
    $table->foreign('nis')->references('nis')->on('siswas');
    $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_aspirasis');
    }
};
