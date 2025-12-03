<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleApiController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')
            ->where('is_visible', true)
            ->latest()
            ->paginate(10);

        // Transform data untuk menambahkan full URL pada gambar
        $articles->getCollection()->transform(function ($article) {
            $article->article_image = $article->article_image
                ? url('storage/' . $article->article_image)
                : null;
            return $article;
        });

        return response()->json([
            "message" => "Data Articles Shown",
            "data" => $articles,
        ], 200);
    }

    public function show($slug)
    {
        $article = Article::with('tags')->where('article_slug', $slug)->where('is_visible', true)->first();

        if (!$article) {
            return response()->json([
                "message" => "Article Not Found",
                "data" => null,
            ], 404);
        }

        // Transform image URL
        $article->article_image = $article->article_image
            ? url('storage/' . $article->article_image)
            : null;

        return response()->json([
            "message" => "Article Detail Shown",
            "data" => $article,
        ], 200);
    }
}
