<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $active = "posts";

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' By ' . $author->name;
        }

        return view('posts', [
            'active' => $active,
            'title' => "All Post" . $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(5)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        $title = 'Single Post';
        $active = 'posts';

        $comments = $post->comments()->with('user')->orderBy('created_at', 'desc')->get();
        return view('post', compact('title', 'post', 'active', 'comments'));
    }
}
