<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
class HomeController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();
        $tags = Category::get();
        $posts = Post::get();
        return view('backend.home',compact('users','tags','posts'));
    }
}
