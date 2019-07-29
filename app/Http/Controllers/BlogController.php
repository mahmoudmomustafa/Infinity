<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    //index function
    public function index()
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        // $posts = Post::with('author')->orderBy('created_at','desc')->get();
        // $posts = Post::with('author')->latest()->published()->paginate(3);
        $posts = Post::with('author')->orderBy('title', 'desc')->paginate(3);
        return view('blog.index', compact('posts', 'categories'));
    }
    // category
    public function category(Category $category)
    {
        $categoryName = $category->title;

        $posts = $category->posts()
            ->with('author')
            ->paginate(3);

        return view('blog.index', compact('posts', 'categoryName'));
    }
    // author 
    public function author(User $author)
    {
        $authorName = $author->name;

        $posts = $author->posts()
            ->with('category')
            ->paginate(3);

        return view('blog.index', compact('posts', 'authorName'));
    }
    // show function
    public function show(Post $post)
    {
        // increase view count
        $post->increment('view_count');

        return view('blog.show', compact('post'));
    }
}
