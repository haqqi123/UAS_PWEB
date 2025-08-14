<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Organisation extends Model
{
    use HasFactory;

    protected $table = 'organisations';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
    ];

    /**
     * Get the full URL for the foto attribute
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            // For Laravel storage with symbolic link
            return asset('storage/' . $this->foto);
        }
        return null;
    }

    /**
     * Check if foto exists in storage
     */
    public function hasFoto()
    {
        return $this->foto && Storage::disk('public')->exists($this->foto);
    }
}
