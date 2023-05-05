<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index()
  {
    return view('users.home.index', [
      'blogs' => Blog::with(['author', 'category'])->where('user_id', '=', Auth::id())->get()
    ]);
  }

  public function profile()
  {
    return view('users.profile.index');
  }
}
