<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Follower;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return abort(404);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $author)
  {
    $followers = Follower::where('follower_id', $author->id)->get();
    $posts = $author->posts()->orderBy('created_at', 'desc')->paginate(5);
    return view('blog.author', compact('posts', 'author', 'followers'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $author)
  {
    $this->authorize('update', $author);
    abort_if($author->id !== auth()->id(), 403);
    return view('blog.edit', compact('author'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(User $author, Request $request)
  {
    $this->authorize('update', $author);
    $this->validate($request, [
      'name' => ['string', 'min:5', 'max:255'],
      'email' => ['string', 'email', 'max:255'],
      'img' => 'required|mimes:jpeg,jpg,png,svg',
      'userName' => ['alpha_dash'],
      'number' => ['numeric', 'min:11', 'max:13', 'starts_with:01'],
      'education' => ['string', 'min:5', 'max:255'],
      'birth' => ['date'],
    ]);
    $data = $request->all();
    if ($request->hasFile('img')) {
      $image = $request->file('img');
      $fileName = time() . '.' . $image->getClientOriginalExtension();
      $destination = public_path('storage/users');
      $image->move($destination, $fileName);

      $data['img'] = $fileName;
    }
    $request->user()->update($data);
    return back();
  }

  public function follow(User $author)
  {
    auth()->user()->toggleFollow($author->id);
    return back();
  }
  public function search(Request $request)
  {
    $user = $request->get('search');
    $users = User::query()->where('name', 'LIKE', '%' . $user . '%')->orWhere('userName', 'LIKE', '%' . $user . '%')->get();
    return view('blog.search', compact('users'));
  }
}
