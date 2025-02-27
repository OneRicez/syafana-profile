<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Content;
use App\Models\News;
use Filament\Forms\Components\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {  
        // Get carousel content
        $carousel = Content::where('description', 'LIKE', 'carousel%')
            ->where('status', 'shown')
            ->get(['img_path', 'alt'])
            ->toArray();

        // Get paginated news for initial load
        $news = News::where('status', 'published')
            ->latest('updated_at')
            ->paginate(4);  // Adjust number as needed

        // Get recent comments
        $recent_comments = Comment::where('status', 'approved')
            ->latest('updated_at')
            ->with('news')
            ->limit(10)
            ->get();

        // Get categories with news count
        $categories = Category::withCount(['news' => function ($query) {
            $query->where('status', 'published');
        }])->get();

        // Get video content
        $videos = Content::where('description', 'LIKE', '%url%')
            ->where('status', 'shown')
            ->get(['url', 'alt'])
            ->toArray();

        // Get about section content
        $about = Content::where('description', 'about-text')
            ->first('content');
        
        $about_image = Content::where('description', 'LIKE', 'about-image%')
            ->get(['img_path', 'alt']);

        $sponsor = Content::where('description', 'LIKE', 'sponsor%')
            ->get(['img_path', 'alt']);

        return view('pages.home', compact(
            'about_image',
            'about',
            'categories',
            'carousel',
            'news', 
            'recent_comments',
            'videos',
            'sponsor'
        ));
    }
}
