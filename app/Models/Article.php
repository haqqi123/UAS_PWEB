<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'thumbnail',
        'penulis',
        'views',
        'slug'
    ];

    // Generate slug before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->judul) . '-' . Str::random(6);
        });
    }

    // Get route key name
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Accessor for thumbnail URL
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return asset('images/default-article.jpg'); // Default image if no thumbnail
    }

    // Check if article has thumbnail
    public function hasThumbnail()
    {
        return $this->thumbnail && Storage::disk('public')->exists($this->thumbnail);
    }
}
