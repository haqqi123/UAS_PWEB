<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
