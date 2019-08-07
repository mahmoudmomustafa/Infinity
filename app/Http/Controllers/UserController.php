<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(User $author)
  {
    // $posts = $author->posts()->paginate(5);
    // return view('blog.author', compact('posts', 'author'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(User $user)
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, User $user)
  {
    // $this->validate($request, [
    //   'name' => 'required',
    //   'email' => 'required|unique:users',
    //   'userName' => 'required|unique:users|alpha_dash',
    //   'password' => ['required', 'confirmed'],
    //   'role_id' => ['required']
    // ]);
    // $data = $request->all();
    // $data['password'] = bcrypt($data['password']);
    // User::create($data);

    // return redirect('/dashboard/users')->with('message', 'New User was created');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $author)
  {
    $posts = $author->posts()
      ->with('category')
      ->paginate(5);

    return view('blog.author', compact('posts', 'author'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $author)
  {
    //
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
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required',
      'userName' => 'required|alpha_dash',
      'password' => ['required', 'confirmed'],
    ]);
    $data = $request->all();
    $data['password'] = bcrypt($data['password']);
    $author->save();
    $author->update($data);
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // $user = User::findOrFail($id);
    // if ($user->id == Auth::user()->id) {
    //   return abort(403);
    // }
    // $user->delete();
    // return redirect('/author/users')->with('message', 'User was Deleted');
  }
}
