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
        $query = News::where('status', 'published');
    
        // Filtering by category
        if ($request->filled('category_id') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }
    
        // Search by title or content
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('content', 'like', "%$search%");
            });
        }
    
        // Sorting
        $sort = $request->get('sort', 'updated_at');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);
    
        $news = $query->paginate(12);
    
        // Return JSON for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'data' => $news->items(),
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
                'prev_page_url' => $news->previousPageUrl(),
                'next_page_url' => $news->nextPageUrl(),
            ]);
        }
    
        $categories = Category::all(['id', 'name']);
        return view('pages.news', compact('news', 'categories'));
    }
    

    public function view($slug)
    {
        // Logika untuk memfilter berita berdasarkan tag
        $news = News::where('slug', $slug)->with('category')->first();
        $comments = Comment::where('status','approved')->latest('updated_at', 'desc')->with('news')->limit(10)->get();
        $categories = Category::withCount(['news' => function ($query) {
            $query->where('status', 'published');
        }])->get();
        return view('pages.news-view', compact('categories','news', 'slug', 'comments'));
    }

    public function loadMore(Request $request)
{
    $news = News::with('author')
        ->latest()
        ->paginate(10);  // Adjust the number as needed

    $html = '';
    foreach ($news as $item) {
        $html .= view('components.news-item', [
            'title' => $item->title,
            'author' => $item->author,
            'image' => $item->image,
            'date' => $item->updated_at->format('d M Y'),
            'url' => '/news/' . $item->slug
        ])->render();
    }

    return response()->json([
        'html' => $html,
        'hasMorePages' => $news->hasMorePages()
    ]);
}
}
