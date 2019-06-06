<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $categoryName = $category->title;

        $categories = Category::with(['posts'=> function($query){
            $query->published();
        }])->orderBy('title','asc')->get();

        $posts = $category->posts()
                            ->with('author')
                            ->latest()
                            ->published()
                            ->paginate(3);

        return view('blog.index',compact('posts','categories','categoryName'));
    }
    // author 
    public function author(User $author){
        $authorName = $author->name;
        $categories = Category::with(['posts'=> function($query){
            $query->published();
        }])->orderBy('title','asc')->get();
        $posts = $author->posts()
                            ->with('category')
                            ->latest()
                            ->published()
                            ->paginate(3);

        return view('blog.index',compact('posts','categories','authorName'));
    }
    // show function
    public function show(Post $post){
        $categories = Category::with(['posts'=> function($query){
            $query->published();
        }])->orderBy('title','asc')->get();
        return view('blog.show',compact('post','categories'));
    }
}
