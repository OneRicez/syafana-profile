<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, News $news)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:1000',
            'email' => 'required|email|max:255',
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        // Simpan komentar ke database
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->email = $request->input('email');
        $comment->name = $request->input('name');
        $comment->website = $request->input('website');
        $comment->status = 'pending';
        $comment->news_id = $news->id;
        $comment->save();
        
        // Redirect kembali ke halaman berita dengan pesan sukses
        return response()->json([
            ['comment' => $comment]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
