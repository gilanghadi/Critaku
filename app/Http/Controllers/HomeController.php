<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index()
  {
    if (!Auth::user()) {
      return redirect()->route('signin.critaku')->with('error', 'Your Are Not Login');
    }
    return view('users.home.index', [
      'blogs' => Blog::with(['author', 'category'])->where('user_id', '=', Auth::id())->paginate(6)->withQueryString(),
    ]);
  }

  public function profile(User $user)
  {
    if (!Auth::user()) {
      return redirect()->route('signin.critaku')->with('error', 'Your Are Not Login');
    }
    return view('users.profile.index', [
      'user' => $user
    ]);
  }
}
