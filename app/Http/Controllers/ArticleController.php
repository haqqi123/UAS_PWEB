<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        // Increment view count
        $article->increment('views');

        // Get related articles (4 latest articles excluding current one)
        $related = Article::where('id', '!=', $article->id)
            ->latest()
            ->take(4)
            ->get();

        return view('articles.show', compact('article', 'related'));
    }
}
