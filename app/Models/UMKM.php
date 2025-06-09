<?php

// app/Models/Umkm.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    
    protected $fillable = [
        'Nama_UMKM',
        'Deskripsi',
        'Harga_Minimum',
        'Harga_Maximum',
        'Gambar'
    ];
}
