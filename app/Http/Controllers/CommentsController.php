<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'body' => 'required|min:3',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return back();
    }
    // liked
    public function likeComment(Post $post,Comment $comment)
    {
        $comment->like();
        return back();
    }
}
