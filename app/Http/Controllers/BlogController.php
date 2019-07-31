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
        $posts = Post::with('author')->orderBy('created_at', 'desc')->paginate(5);
        return view('blog.index', compact('posts'));
    }
    // create posts
    public function create(Post $post)
    {
        return view('blog.index', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            // 'slug' => 'required|unique:posts',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $request->user()->posts()->create($request->all());

        return redirect('/')->with('message', 'Post was created');
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
    // edit
    public function edit($id)
    {
            $post = POST::findOrFail($id);
            $this->authorize('view', $post);
        return view('/edit', compact('post'));
    }
    // update method
    public function update($id)
    {
        POST::findOrFail($id)->update(request()->all());
        return redirect('/')->with('message', 'Ur Post was Updated');
    }
    // delete post
    public function destroy($id)
    {
        $post = POST::findOrFail($id);
        $post->delete();
        return redirect('/')->with('message', 'Post was Deleted');
    }
}
