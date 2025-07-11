<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'nama_pemilik',
        'nik',
        'nama_usaha',
        'jenis_produk',
        'deskripsi',
        'harga_minimum',
        'harga_maximum',
        'whatsapp',
        'email',
        'alamat',
        'foto_usaha',
        'status',
        'catatan_status',
        'kategori'
    ];

    protected $casts = [
        'harga_minimum' => 'decimal:2',
        'harga_maximum' => 'decimal:2',
    ];

    // Accessor untuk format harga minimum
    public function getFormattedHargaMinimumAttribute(): string
    {
        return 'Rp ' . number_format($this->harga_minimum, 0, ',', '.');
    }

    // Accessor untuk format harga maksimum
    public function getFormattedHargaMaximumAttribute(): string
    {
        return 'Rp ' . number_format($this->harga_maximum, 0, ',', '.');
    }

    // Accessor untuk URL foto
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto_usaha) {
            return asset('storage/umkm/' . $this->foto_usaha);
        }
        return asset('images/default-store.jpg');
    }

    // Accessor untuk status badge
    public function getStatusBadgeAttribute(): string
    {
        $badges = [
            'menunggu' => 'bg-yellow-100 text-yellow-800',
            'diterima' => 'bg-green-100 text-green-800',
            'ditolak' => 'bg-red-100 text-red-800'
        ];

        return $badges[$this->status] ?? 'bg-gray-100 text-gray-800';
    }

    // Accessor untuk format whatsapp
    public function getWhatsappUrlAttribute(): string
    {
        if ($this->whatsapp) {
            $number = preg_replace('/[^0-9]/', '', $this->whatsapp);
            return "https://wa.me/{$number}";
        }
        return '#';
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where('nama_usaha', 'like', "%{$term}%")
            ->orWhere('deskripsi', 'like', "%{$term}%")
            ->orWhere('jenis_produk', 'like', "%{$term}%")
            ->orWhere('alamat', 'like', "%{$term}%");
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        if ($kategori) {
            return $query->where('kategori', $kategori);
        }
        return $query;
    }

    // Scope untuk filter berdasarkan status
    public function scopeStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }
}
