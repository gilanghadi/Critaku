<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(CommentRequest $request, Blog $blog)
    {
        if (!Auth::user()) {
            return redirect()->route('login')->with('error', 'You need login first');
        }
        $validator = $request->validated();
        $validator['user_id'] = Auth::id();
        $validator['blog_id'] = $blog->id;
        $blog = Comment::create($validator);
        return back()->with('success', 'Post comment for this blog success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
