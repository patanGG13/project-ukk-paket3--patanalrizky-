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
       Schema::create('aspirasis', function (Blueprint $table) {
        $table->integer('id_aspirasi')->primary(); // id_aspirasi(int,5)
        $table->enum('status', ['Menunggu', 'Proses', 'Selesai']); // status enum
        $table->integer('id_kategori'); // id_kategori(int,5)
        
        // Catatan: Di soal tertulis feedback(int,5), namun umumnya feedback berisi teks. 
        // Jika penguji membebaskan, ubah menjadi $table->text('feedback'). 
        // Jika harus strict sesuai soal:
        $table->integer('feedback'); 
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
