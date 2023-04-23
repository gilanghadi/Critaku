<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $author)
    {
        return view('users.blog.author', [
            'blog' => $author->blog->load('category', 'author'),
        ]);
    }
}
