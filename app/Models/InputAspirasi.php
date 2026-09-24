<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class InputAspirasi extends Model
{
    protected $primaryKey = 'id_pelaporan';
    public $incrementing = false;
    protected $fillable = ['id_pelaporan', 'nis', 'id_kategori', 'lokasi', 'ket'];

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}