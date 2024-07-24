<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;

class CimanewsController extends Controller
{
    public function index(Request $request)
    {
        $running_text = RunningText::first();
        $categories = ArticleCategory::where('name', 'cimanews')->get();

        $search = $request->input('title');
        $categoryFilter = $request->input('category');
        // Menggunakan Eloquent dengan whereHas untuk menyaring artikel berdasarkan kategori
        $cimanews = Article::whereHas('article_category', function ($query) use ($categoryFilter) {
            if ($categoryFilter && $categoryFilter != 'Pilih Kategori Artikel') {
                $query->where('id', $categoryFilter);
            } else {
                $query->where('name', 'cimanews');
            }
        })
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->orderBy('created_at', 'asc')
        ->paginate(6);
        return view('user.cimanews.index', compact('running_text', 'cimanews', 'categories'));
    }

    public function show($slug)
    {
        $running_text = RunningText::first();
        $cimanews = Article::where('slug', $slug)->first();
        $otherArticle = Article::where('slug', '!=', $slug)->where('article_category_id', $cimanews->article_category_id)->orderBy('created_at', 'asc')->limit(3)->get();
        return view('user.cimanews.show', compact('running_text', 'cimanews',  'otherArticle'));
    }
}
