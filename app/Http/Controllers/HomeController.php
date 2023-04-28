<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('users.home.index');
  }

  public function profile()
  {
    return view('users.profile.index');
  }
}
