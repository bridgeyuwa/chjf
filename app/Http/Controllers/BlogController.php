<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::published()->orderBy('published_at', 'desc');

        if ($category = $request->get('category')) {
            $query->where('category', $category);
        }

        $posts = $query->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        if (!$post->is_published) {
            abort(404);
        }

        return view('pages.blog.show', compact('post'));
    }
}
