<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'UMKM';
    protected $fillable = [
        'Nama_UMKM',
        'Deskripsi',
        'Harga_Minimum',
        'Harga_Maximum',
        'Gambar'
    ];
}