<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $featuredPosts = BlogPost::with(['author', 'category', 'tags'])
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = BlogCategory::withCount('posts')
            ->orderBy('name')
            ->get();

        $latestPosts = BlogPost::with(['author', 'category', 'tags'])
            ->published()
            ->latest('published_at')
            ->take(2)
            ->get();

        return view('blog', compact('featuredPosts', 'categories', 'latestPosts'));
    }

    public function show($slug)
    {
        $post = BlogPost::with(['author', 'category', 'tags', 'relatedPosts'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = $post->relatedPosts()
            ->with(['author', 'category'])
            ->published()
            ->take(3)
            ->get();

        return view('blog.post', compact('post', 'relatedPosts'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        
        $posts = BlogPost::with(['author', 'category', 'tags'])
            ->where('category_id', $category->id)
            ->published()
            ->latest('published_at')
            ->paginate(9);

        return view('blog.category', compact('category', 'posts'));
    }

    public function tag($slug)
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();
        
        $posts = $tag->posts()
            ->with(['author', 'category', 'tags'])
            ->published()
            ->latest('published_at')
            ->paginate(9);

        return view('blog.tag', compact('tag', 'posts'));
    }
} 