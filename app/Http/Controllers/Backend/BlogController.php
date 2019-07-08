<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'author')->latest()->paginate(8);
        return view("backend.blog.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $posts)
    {
        $categories = Category::get();
        return view('backend.blog.create', compact('posts', 'categories'));
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
            'slug' => 'required|unique:posts',
            'description' => 'required',
            'category_id' => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            // 'image'     => 'mims:png,jpg,jpeg'
        ]);
        $request->user()->posts()->create($request->all());

        return redirect('/backend/blog')->with('message', 'Ur Post was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $post=POST::findOrFail($id);
        return view('backend/blog/edit',compact('post','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return view('backend/blog', compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *\
     */
    public function update($id)
    {
        // $post->update(request()->all());
        POST::findOrFail($id)->update(request()->all());
        return redirect('/backend/blog')->with('message', 'Ur Post was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=POST::findOrFail($id);
        $post->delete();
        return redirect('/backend/blog')->with('message', 'Post was Deleted');
    }
}
