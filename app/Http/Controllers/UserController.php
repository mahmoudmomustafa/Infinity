<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(User $author)
  {
    //
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $author)
  {
    $posts = $author->posts()->orderBy('created_at', 'desc')->paginate(5);
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
    // $this->authorize('update', $author);
    abort_if($author->id !== auth()->id(),403);
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
      'number' => ['numeric','min:11','max:13', 'starts_with:01'],
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

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
