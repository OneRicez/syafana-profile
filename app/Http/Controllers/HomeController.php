<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Filament\Forms\Components\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Logika untuk memfilter berita berdasarkan tag
        $news = News::where('status','published')->latest('updated_at')->paginate(4);
        $recent_comments = Comment::where('status','approved')->latest('updated_at', 'desc')->limit(10);
        $categories = Category::all();
        return view('pages.home', compact('news', 'recent_comments'));
    }
}
