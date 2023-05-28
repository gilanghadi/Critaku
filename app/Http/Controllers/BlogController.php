<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Catch_;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::with(['author', 'category'])->latest();
        return view('users.blog.index', [
            'blog' => $blog->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Blog $blog)
    {
        if (!Auth::user()) {
            return redirect()->route('signin.critaku')->with('error', 'Your Are Not Login');
        }
        return view('users.home.create', [
            'categories' => Category::with(['blog'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {

        $validator = $request->validated();

        if ($request->file('image')) {
            $validator['image'] = $request->file('image')->store('image/blog');
        }
        $image = $validator['image'];
        $validator['excerpt'] = Str::limit(strip_tags($request->body), 130);
        $validator['user_id'] = Auth::user()->id;
        $blog = Blog::create($validator);
        Image::create([
            'url' => $image,
            'imageable_id' => $blog->id,
            'imageable_type' => 'App\Blog'
        ]);
        return redirect()->route('home.critaku')->with('success', 'New Blog Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // $blog = Blog::findOrFail($id)->first();
        $comments = Comment::with(['user'])->where('blog_id', $blog->id)->orderBy('created_at', 'desc')->get();
        return view('users.blog.show', [
            'blog' => $blog,
            'comments' => $comments,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);

        if ($blog->author->id !== Auth::id()) {
            return back()->with('error', '
            You are not the owner of this blog');
        }

        return view('users.home.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog, Image $image)
    {

        if ($blog->author->id !== Auth::id()) {
            return back()->with('error', '
            You are not the owner of this blog');
        }


        $rules = [
            'title' => 'required|max:225',
            'image' => 'required|image|mimes:jpg,png,jpeg|file|max:3000',
            'category_id' => 'required',
            'body' => 'required',
        ];


        if ($request->slug !== $blog->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }

        $validator = $request->validate($rules);

        $validator['user_id'] = Auth::user()->id;
        $validator['excerpt'] = Str::limit(strip_tags($request->body), 130);

        if ($request->file('image')) {
            $image = public_path('storage/' . $image->url);
            if (File::exists($image)) {
                File::delete($image);
            };
            $validator['image'] = $request->file('image')->store('image/blog', 'public');
        }
        $image = $validator['image'];
        Blog::where('id', $blog->id)->update($validator);
        Image::where('imageable_id', '===', $blog->id)->update([
            'url' => $image,
            'imageable_id' => $blog->id,
            'imageable_type' => 'App\Blog',
        ]);
        return redirect()->route('home.critaku')->with('success', 'Blog Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        if ($blog->author->id !== Auth::id()) {
            return back()->with('error', '
            You are not the owner of this blog');
        } else {
            Blog::destroy($blog->id);
            if ($blog->image) {
                Storage::delete($blog->image);
            }
            return redirect()->route('home.critaku')->with('success', 'Deleted Successed!');
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
