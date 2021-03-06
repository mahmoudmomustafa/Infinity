<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Follower;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //index function
    public function index()
    {
        $followers = Follower::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('blog.index', compact('followers'));
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
            'description' => 'required|max:150',
            // 'image' => 'reuired|mimes:jpg,jpeg,png,svg',
            'image' => 'mimes:jpeg,jpg,png,svg',
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
        $categories = Category::get();
        $posts = $category->posts()
            ->with('author')
            ->get();

        return view('blog.index', compact('posts', 'categories'));
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
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('/edit', compact('post'));
    }
    // update method
    public function update(Post $post)
    {
        $this->authorize('update', $post);
        $post->update(request()->all());
        return back()->with('message', 'Post was Updated');
    }
    // delete post
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
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
