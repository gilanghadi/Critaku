<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TopicCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Topic $topic, Request $request)
    {
        $categories = Category::with(['blog'])->get();
        $topicToCategory = TopicCategory::with(['topic'])->limit(10)->get();
        $tab = $request->tab ? $request->tab : 'all';
        $sortTopicTab = $request->tab ? $request->tab : 'all';
        $blogs = Blog::all();

        if ($sortTopicTab == 'all') {
            $topicToCategory = TopicCategory::with(['topic'])->limit(10)->get()->unique('topic_id');
        } else {
            $topicToCategory = TopicCategory::with(['category', 'topic'])->whereHas('category', function ($query) use ($sortTopicTab) {
                return $query->where('slug', $sortTopicTab);
            })->limit(10)->get()->unique('topic_id');
        }

        return view('users.topics.index', [
            'categories' => $categories,
            'topicToCategory' => $topicToCategory,
            'tab' => $tab,
            'blogs' => $blogs
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
