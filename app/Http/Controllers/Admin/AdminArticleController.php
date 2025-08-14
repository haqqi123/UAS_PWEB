<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        // Filter by date
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Sort
        $sortField = $request->sort ?? 'created_at';
        $sortDirection = $request->direction ?? 'desc';
        $query->orderBy($sortField, $sortDirection);

        $articles = $query->paginate(10)->withQueryString();

        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            'isi' => 'required|string|min:100', // Minimal 100 karakter
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();

            // Store file using Laravel Storage
            $path = $file->storeAs('articles', $filename, 'public');

            // Resize image using Intervention Image
            $fullPath = storage_path('app/public/' . $path);
            $image = Image::make($fullPath);
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save($fullPath, 90);

            $validated['thumbnail'] = $path;
        }

        // Set default values
        $validated['penulis'] = auth()->user()->name;
        $validated['views'] = 0;

        // Create article
        Article::create($validated);

        return redirect()
            ->route('admin.article.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // Validate request
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'isi' => 'required|string|min:100',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();

            // Store file using Laravel Storage
            $path = $file->storeAs('articles', $filename, 'public');

            // Resize image using Intervention Image
            $fullPath = storage_path('app/public/' . $path);
            $image = Image::make($fullPath);
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save($fullPath, 90);

            $validated['thumbnail'] = $path;
        }

        // Update article
        $article->update($validated);

        return redirect()
            ->route('admin.article.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        try {
            // Delete thumbnail if exists
            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }

            // Delete article
            $article->delete();

            return redirect()
                ->route('admin.article.index')
                ->with('success', 'Artikel berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.article.index')
                ->with('error', 'Gagal menghapus artikel');
        }
    }
}
