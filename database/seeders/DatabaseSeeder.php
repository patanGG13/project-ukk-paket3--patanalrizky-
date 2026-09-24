<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat data master Kategori
        Kategori::create([
            'id_kategori' => 1,
            'ket_kategori' => 'Fasilitas'
        ]);
        Kategori::create([
            'id_kategori' => 2,
            'ket_kategori' => 'Kebersihan'
        ]);
        Kategori::create([
            'id_kategori' => 3,
            'ket_kategori' => 'Keamanan'
        ]);

        // Membuat data master Siswa (menggunakan NIS 123123 yang kamu pakai sebelumnya)
        Siswa::create([
            'nis' => 123123,
            'kelas' => 'XII RPL'
        ]);
    
        \App\Models\Admin::create([
            'username' => 'admin',
            'password' => 'admin123'
        ]);

    }
    
}