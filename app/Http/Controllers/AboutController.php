<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {  
        $history = Content::where('description', 'history')
        ->where('status', 'shown')
        ->first('content');

        $history_image = Content::where('description', 'image-history')
        ->where('status', 'shown')
        ->first(['img_path','alt']);
        
        $vision = Content::where('description', 'vision-text')
        ->where('status', 'shown')
        ->first('content');
        
        $mission = Content::where('description', 'mission-text')
        ->where('status', 'shown')
        ->first('content');
        
        $welcome = Content::where('description', 'welcome-text')
        ->where('status', 'shown')
        ->first('content');
        
        $welcome_image = Content::where('description', 'image-welcome')
        ->where('status', 'shown')
        ->first(['img_path','alt']);

        $org_structure = Content::where('description','LIKE' , 'orgstructure%')
        ->where('status', 'shown')
        ->get(['img_path','alt'])
        ->toArray();


        return view('pages.about', compact(
            'history',
            'history_image',
            'vision',
            'mission',
            'welcome', 
            'welcome_image',
            'org_structure',
        ));
    }
}
