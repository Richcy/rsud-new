<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $running_text = RunningText::first();
        $categories = ArticleCategory::where('name', '!=', 'cimanews')->get();

        $search = $request->input('title');
        $categoryFilter = $request->input('category');
        // Menggunakan Eloquent dengan whereHas untuk menyaring artikel berdasarkan kategori
        $articles = Article::whereHas('article_category', function ($query) use ($categoryFilter) {
            if ($categoryFilter && $categoryFilter != 'Pilih Kategori Artikel') {
                $query->where('id', $categoryFilter);
            } else {
                $query->where('name', '!=', 'cimanews');
            }
        })
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('user.article.index', compact('running_text', 'articles', 'categories'));
    }

    public function show($slug)
    {
        $running_text = RunningText::first();
        $article = Article::where('slug', $slug)->first();
        $categories = ArticleCategory::where('name', '!=', 'cimanews')->get();
        $otherArticle = Article::where('slug', '!=', $slug)->where('article_category_id', $article->article_category_id)->limit(3)->get();
        return view('user.article.show', compact('running_text', 'article', 'categories', 'otherArticle'));
    }
}
