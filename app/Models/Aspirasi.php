<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $primaryKey = 'id_aspirasi';
    public $incrementing = false;
    protected $fillable = ['id_aspirasi', 'status', 'id_kategori', 'feedback'];
}