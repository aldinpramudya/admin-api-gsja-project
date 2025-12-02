<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Halaman Index Artikel
    public function index()
    {
        $articles = Article::with('tags')->paginate(10);
        return view('article.index', compact('articles'));
    }

    // Halaman Create Artikel
    public function create()
    {
        $tags = Tag::all();
        return view('article.createArticle', compact('tags'));
    }

    // Halaman Edit Artikel
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('article.editArticle', compact('article', 'tags'));
    }

    // Create Artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string',
            'article_excerpt' => 'required|string',
            'article_content' => 'required|string',
            'is_visible' => 'required|boolean',
            'tags' => 'array',
            'article_image' => 'nullable|image|max:2048',
        ]);

        // Default image berada di public/images/default-article.jpg
        $defaultImage = 'images/default-image-article.jpg';

        // Upload jika ada gambar
        if ($request->hasFile('article_image')) {
            $imagePath = $request->file('article_image')->store('articles', 'public');
        } else {
            $imagePath = $defaultImage;
        }

        $article = Article::create([
            'article_title' => $request->article_title,
            'article_slug' => Str::slug($request->article_title),
            'article_excerpt' => $request->article_excerpt,
            'article_content' => $request->article_content,
            'is_visible' => $request->is_visible,
            'article_image' => $imagePath
        ]);

        $article->tags()->sync($request->tags);

        return redirect()->route('admin.article.index')->with('success', "Artikel berhasil dibuat");
    }

    // Update Artikel
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'article_title' => 'required|string',
            'article_excerpt' => 'required|string',
            'article_content' => 'required|string',
            'is_visible' => 'required|boolean',
            'tags' => 'array',
            'article_image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $article->article_image;

        if ($request->hasFile('article_image')) {

            // Hapus gambar lama kalau berasal dari storage
            if ($article->article_image && str_starts_with($article->article_image, 'articles/')) {
                Storage::disk('public')->delete($article->article_image);
            }

            $imagePath = $request->file('article_image')->store('articles', 'public');
        }

        $article->update([
            'article_title' => $request->article_title,
            'article_slug' => Str::slug($request->article_title),
            'article_excerpt' => $request->article_excerpt,
            'article_content' => $request->article_content,
            'is_visible' => $request->is_visible,
            'article_image' => $imagePath
        ]);

        $article->tags()->sync($request->tags);

        return redirect()->route('admin.article.index')->with('success', "Artikel berhasil Diedit");
    }

    // Delete Artikel
    public function destroy(Article $article)
    {
        if ($article->article_image) {
            Storage::disk('public')->delete($article->article_image);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect()->route('admin.article.index')->with('success', "Artikel Berhasil Dihapus");
    }
}
