<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    //index function
    public function index(){
        $categories = Category::with('posts')->orderBy('title','asc')->get();
        // $posts = Post::with('author')->orderBy('created_at','desc')->get();
        // $posts = Post::with('author')->latest()->published()->paginate(3);
        $posts = Post::with('author')->orderBy('published_at','desc')->published()->paginate(3);
        return view('blog.index',compact('posts','categories'));
    }
    // category
    public function category(Category $category){
        $categories = Category::with(['posts'=> function($query){
            $query->published();
        }])->orderBy('title','asc')->get();

        $posts = $category->posts()
                            ->with('author')
                            ->latest()
                            ->published()
                            ->paginate(3);

        return view('blog.index',compact('posts','categories'));
    }
    // show function
    public function show(Post $post){
        $categories = Category::with(['posts'=> function($query){
            $query->published();
        }])->orderBy('title','asc')->get();
        return view('blog.show',compact('post','categories'));
    }
}
