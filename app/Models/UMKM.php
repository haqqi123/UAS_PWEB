<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UMKM extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan migrasi
    protected $table = 'UMKM';
    
    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'Nama_UMKM',
        'Deskripsi',
        'Harga_Minimum',
        'Harga_Maximum',
        'Gambar',
        'Nomor_Telephone',
        'Alamat',
        'user_id' // Jika menggunakan sistem autentikasi
    ];

    // Relasi one-to-many dengan produk
    public function products()
    {
        return $this->hasMany(Product::class, 'umkm_id');
    }

    // Accessor untuk format harga minimum
    public function getFormattedHargaMinimumAttribute(): string
    {
        return 'Rp ' . number_format($this->Harga_Minimum, 0, ',', '.');
    }

    // Accessor untuk format harga maksimum
    public function getFormattedHargaMaximumAttribute(): string
    {
        return 'Rp ' . number_format($this->Harga_Maximum, 0, ',', '.');
    }

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute(): string
    {
        return asset('images/' . $this->Gambar);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where('Nama_UMKM', 'like', "%{$term}%")
                    ->orWhere('Deskripsi', 'like', "%{$term}%")
                    ->orWhere('Alamat', 'like', "%{$term}%");
    }
}