<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Topic;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\SocialMedia;
use App\Models\TopicCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blog = Blog::with(['author', 'category'])->paginate(10)->withQueryString();
        $categories = Category::all();
        $sort = $request->sort ? $request->sort : null;
        $sortCategory = $request->category ?  $request->category : null;
        $sorTopic = $request->topic ? $request->topic : null;
        $sortAuthor = $request->author ? $request->author : null;
        $sortSearch = $request->search ? $request->search : null;

        if ($sort === 'latest') {
            $blog = Blog::with(['author', 'category'])->orderBy('id', 'desc')->paginate(10)->withQueryString();
        } else {
            $blog = Blog::with(['author', 'category'])->orderBy('id', 'asc')->paginate(10)->withQueryString();
        }

        if ($sortSearch) {
            $blog = Blog::with(['author', 'category'])->Where('title', 'like', '%' . $sortSearch . '%')->orWhereHas('author', function ($query) use ($sortSearch) {
                return $query->where('username', 'like', '%' . $sortSearch . '%');
            })->orWhereHas('category', function ($query) use ($sortSearch) {
                return $query->where('slug', 'like', '%' . $sortSearch . '%');
            })->paginate(10)->withQueryString();
        }

        if ($sortCategory) {
            $blog = Blog::with(['author', 'category'])->WhereHas('category', function ($query) use ($sortCategory) {
                return $query->where('slug', $sortCategory);
            })->paginate(10)->withQueryString();
        }

        if ($sorTopic) {
            $blog = Blog::with(['author', 'category', 'topics'])->WhereHas('topics', function ($query) use ($sorTopic) {
                return $query->where('slug', $sorTopic);
            })->paginate(10)->withQueryString();
        }

        if ($sortAuthor) {
            $blog = Blog::with(['author', 'category', 'topics'])->WhereHas('author', function ($query) use ($sortAuthor) {
                return $query->where('username', $sortAuthor);
            })->paginate(10)->withQueryString();
        }

        return view('users.blog.index', [
            'categories' => $categories,
            'blog' => $blog,
            'sort' => $sort,
            'sortCategory' => $sortCategory
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
            'categories' => Category::with(['blog'])->get(),
            'topics' => Topic::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        try {
            $validator = $request->validated();

            $validator['excerpt'] = Str::limit(strip_tags($request->body), 130);
            $validator['user_id'] = Auth::user()->id;

            if ($request->hasFile('image')) {
                $validator['image'] = $request->file('image')->store('image/blog', 'public');
            }
            $image = $validator['image'];

            if ($request->name) {
                $explodeName = explode(' ', $request->name);
                $addArray = [];
                foreach ($explodeName as $key => $name) {
                    $addArray[$key] = ucfirst($name);
                }
                $nameTopic = implode(' ', $addArray);
                $checkTopic = Topic::whereRaw('LOWER(name) = ?', strtolower($request->name))->first();
                $topic = [
                    'name' => $nameTopic,
                    'slug' => strtolower(Str::slug($request->name)),
                ];
                if ($checkTopic) {
                    return back()->with(['error' => 'Topic already exist']);
                } else {
                    $addTopic = Topic::create($topic);
                    $validator['topic_id'] = $addTopic->id;
                }
            }

            $blog = Blog::create($validator);

            $topicCategory = new \App\Models\TopicCategory();
            $topicCategory->blog_id = $blog->id;
            $topicCategory->category_id = $request->category_id;
            $topicCategory->topic_id = $request->topic_id;
            $topicCategory->save();

            if ($request->social_media) {
                foreach ($request->social_media as $sosmed) {
                    SocialMedia::create([
                        'blog_id' => $blog->id,
                        'url_social_media' => $sosmed
                    ]);
                }
            } else {
                $blog->social_media = [];
                $blog->save();
            }
            Image::create([
                'url' => $image,
                'imageable_id' => $blog->id,
                'imageable_type' => 'App\Blog'
            ]);
            return redirect()->route('home.critaku')->with('success', 'New Blog Has Been Added');
        } catch (\Throwable $th) {
            return back()->with(['error' => 'An error occurred when creating a blog or there was duplicate data']);
        }
        // An error occurred while creating your blog or your title slug already exists
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $comments = Comment::with(['user'])->where('blog_id', $blog->id)->orderBy('created_at', 'desc')->get();
        $social_media = SocialMedia::where('blog_id', $blog->id)->get();
        return view('users.blog.show', [
            'blog' => $blog,
            'comments' => $comments,
            'topics' => Topic::all(),
            'social_media' => $social_media
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);
        $social_medias = SocialMedia::where('blog_id', $blog->id)->get();

        if ($blog->author->id !== Auth::id()) {
            return back()->with('error', '
            You are not the owner of this blog');
        }

        return view('users.home.edit', [
            'blog' => $blog,
            'categories' => Category::all(),
            'topics' => Topic::all(),
            'social_medias' => $social_medias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog, Image $image)
    {
        try {
            if ($blog->author->id !== Auth::id()) {
                return back()->with('error', 'You are not the owner of this blog');
            }

            $rules = [
                'title' => 'required|max:225',
                'image' => 'mimes:jpg,png,jpeg|image',
                'category_id' => 'required',
                'topic_id' => 'required',
                'body' => 'required',
            ];


            if ($request->slug !== $blog->slug) {
                $rules['slug'] = 'required|unique:blogs';
            }

            $validator = $request->validate($rules);

            $validator['user_id'] = Auth::user()->id;
            $validator['excerpt'] = Str::limit(strip_tags($request->body), 130);

            if ($request->name) {
                $explodeName = explode(' ', $request->name);
                $addArray = [];
                foreach ($explodeName as $key => $name) {
                    $addArray[$key] = ucfirst($name);
                }
                $nameTopic = implode(' ', $addArray);
                $checkTopic = Topic::whereRaw('LOWER(name) = ?', strtolower($request->name))->first();
                $topic = [
                    'name' => $nameTopic,
                    'slug' => strtolower(Str::slug($request->name)),
                ];
                if ($checkTopic) {
                    return back()->with(['error' => 'Topic already exist']);
                } else {
                    $addTopic = Topic::updateOrCreate($topic);
                    TopicCategory::where('blog_id', $blog->id)->update([
                        'category_id' => $request->category_id,
                        'topic_id' => $addTopic->id
                    ]);
                    $validator['topic_id'] = $addTopic->id;
                }
            }

            if ($request->file('image')) {
                if (Storage::exists($blog->image)) {
                    Storage::delete($blog->image);
                };
                $validator['image'] = $request->file('image')->store('image/blog', 'public');
            } else {
                $validator['image'] = $blog->image;
            }

            if ($request->social_media) {
                foreach ($request->social_media as $sosmed) {
                    $social_media = new SocialMedia();
                    $social_media->updateOrCreate([
                        'blog_id' => $blog->id,
                        'url_social_media' => $sosmed
                    ]);
                }
            } else {
                $validator['social_media'] = $blog->social_media;
            }

            $image = $validator['image'];
            Blog::where('id', $blog->id)->update($validator);
            Image::where('imageable_id', '===', $blog->id)->update([
                'url' => $image,
                'imageable_id' => $blog->id,
                'imageable_type' => 'App\Blog',
            ]);

            return redirect()->route('home.critaku')->with('success', 'Blog Has Been Updated');
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()]);
        }
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


    public function deleteSocialMedia($id)
    {
        SocialMedia::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Social media data has been successfully deleted!',
        ]);
    }
}
