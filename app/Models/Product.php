<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'umkm_id',
        'nama_produk',
        'gambar_produk'
    ];

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(UMKM::class, 'umkm_id');
    }

    public function getGambarProdukUrlAttribute(): string
    {
        return asset('images/products/' . $this->gambar_produk);
    }
}