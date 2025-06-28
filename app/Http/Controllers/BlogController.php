<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($slug)
    {
        // For now, we'll create a placeholder blog post
        // In a real application, you'd fetch from a Blog model
        $post = (object) [
            'title' => 'Sample Blog Post',
            'slug' => $slug,
            'content' => 'This is a sample blog post content. In a real application, this would be fetched from the database.',
            'excerpt' => 'This is a sample blog post excerpt...',
            'author' => 'Digit-all Team',
            'published_at' => now(),
            'featured_image' => asset('images/blog/sample-post.jpg'),
            'tags' => ['Technology', 'Innovation', 'Digital'],
        ];

        return view('blog.show', compact('post'));
    }
} 