<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //index function
    public function index(){
        // $posts = Post::with('author')->orderBy('created_at','desc')->get();
        $posts = Post::with('author')->latest()->paginate(3);
        return view('blog.index',compact('posts'));
    }
}
