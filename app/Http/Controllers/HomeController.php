<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('users.home.index');
  }

  public function about()
  {
    return view('users.about.index');
  }
}
