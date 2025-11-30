<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Types\Model\Article;

// Controller For Admin
class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }
}
