<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // $query = News::query();

        // // Apply filtering by category
        // if ($request->has('category') && $request->category !== 'all') {
        //     $query->where('category', $request->category);
        // }

        // // Apply sorting
        // if ($request->has('sort')) {
        //     $query->orderBy($request->sort, $request->get('direction', 'asc'));
        // }

        // $news = $query->paginate(12); // Paginate 12 news items per page
        $news = News::all();
        return view('pages.news', compact('news'));
    }

    public function view($slug)
    {
        // Logika untuk memfilter berita berdasarkan tag
        $news = News::where('slug', $slug)->first();
        $recent_comments = Comment::orderBy('updated_at', 'desc')->limit(10)->get();
        $categories = Category::all();
        return view('pages.news-view', compact('categories','news', 'slug', 'recent_comments'));
    }
}
