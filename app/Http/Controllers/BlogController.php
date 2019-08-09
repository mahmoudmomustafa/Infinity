<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Like;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //index function
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
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
            'description' => 'required',
            // 'image' => 'reuired|mimes:jpg,jpeg,png',
            'category_id' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('storage/posts');
            $image->move($destination, $fileName);

            $data['image'] = $fileName;
        }
        $request->user()->posts()->create($data);
        return back()->with('message', 'Post was created');
    }
    // category
    public function category(Category $category)
    {
        $posts = $category->posts()
            ->with('author')
            ->paginate(3);

        return view('blog.index', compact('posts'));
    }
    // show function
    public function show(Post $post)
    {
        $categories = Category::get();
        // increase view count
        $post->increment('view_count');
        return view('blog.show', compact('post', 'categories'));
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
        return back()->with('message', 'Post was Updated');
    }
    // delete post
    public function destroy($id)
    {
        $post = POST::findOrFail($id);
        $post->delete();
        return redirect('/')->with('message', 'Post was Deleted');
    }
    // liked
    public function likePost(Post $post)
    {
        $post->like();
        return back();
    }
}
