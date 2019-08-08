@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-1">
      <div class="content mb-3 content-post">
        <article class="post-item">
          @if(Auth::check() && $author->id == Auth::user()->id)
          <div class="user-edit">
            <button type="button" class="like" data-toggle="modal" data-target="#userEdit" style="cursor:pointer">
              <i class="fas fa-edit"></i>
            </button>
          </div>
          {{-- asdas --}}
          <!-- Edit Modal -->
          <div class="modal fade" id="userEdit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class=" modal-dialog content" role="document">
              <div class="modal-content" style="border:none">
                <h5 class="modal-title p-4 font-weight-bold" style="color:#1d68a7;padding-bottom:.5rem !important;">Edit
                  ur Profile
                </h5>
                <div class="modal-body">
                  <form action="/author/{{$author->userName}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                      <div class="col">
                        <input class="form-control" type="text" name="name" id="name" placeholder="Full Name..."
                          value="{{$author->name}}">
                      </div>
                      @if ($errors->has('name'))
                      <span class="help-block">{{$errors->first('name') }}</span>
                      @endif
                    </div>
                    {{-- email --}}
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                      <div class="col">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email Address..."
                          value="{{$author->email}}">
                      </div>
                      @if ($errors->has('email'))
                      <span class="help-block">{{$errors->first('email') }}</span>
                      @endif
                    </div>
                    {{-- username --}}
                    <div class="form-group {{$errors->has('userName') ? 'has-error' : ''}}">
                      <div class="col">
                        <input class="form-control" type="text" name="userName" id="userName" placeholder="User Name..."
                          value="{{$author->userName}}">
                      </div>
                      @if ($errors->has('userName'))
                      <span class="help-block">{{$errors->first('userName') }}</span>
                      @endif
                    </div>
                    {{-- password --}}
                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                      <div class="col">
                        <input class="form-control" type="password" name="password" id="password"
                          placeholder="Password...">
                      </div>
                      @if ($errors->has('password'))
                      <span class="help-block">{{$errors->first('password') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                          required autocomplete="new-password" placeholder="Confirm Password">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save
                        changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          {{-- sada --}}
          @endif
          <div class="author-meta p-3">
            {{-- author name --}}
            <ul class="post-meta-group">
              <li>
                <div class="author">
                  <a href="/author/{{$author->userName}}">
                    <div class="author-img">
                      <img src="{{$author->img}}" alt="authorImg" style="width:100px !important">
                    </div>
                  </a>
                  <h5 class="font-weight-bold mt-4" style="color:#1d68a7;">
                    {{$author->name}}
                    <small>{ {{$author->userName}} }</small>
                  </h5>
                  <h4>{{$author->email}}</h4>
                  <span class="tag">
                    {{$author->posts()->count()}} Posts
                  </span>
                  <span class="tag">
                    {{$author->likes->count()}} Likes
                  </span>
                  <span class="tag">
                    {{$author->comments->count()}} Comment
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </article>
      </div>
    </div>
    <div class="col-md-5 offset-md-1">
      {{-- session message --}}
      @if (session('message'))
      <div class="content">
        <div class="alert alert-info">
          {{ session('message')}}
        </div>
      </div>
      @endif
      @auth
      @if(Auth::check() && $author->id == Auth::user()->id)
      {{-- form post --}}
      <div class="content mb-3">
        <article class="post-item">
          <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
            Share Your Thought..
          </h5>
          <form action="/" method="post">
            @csrf
            {{-- post title --}}
            <div class="form-group">
              <div class="col">
                <input class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" type="text" name="title"
                  id="title" placeholder="Post Title...">
                @if ($errors->has('title'))
                <div class="invalid-feedback">{{$errors->first('title') }}</div>
                @endif
              </div>
            </div>
            {{-- post description --}}
            <div class="form-group">
              <div class="col">
                <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" name="description"
                  id="description" placeholder="Write Post Description Here..." rows="2"></textarea>
                @if ($errors->has('description'))
                <span class="invalid-feedback">{{$errors->first('description') }}</span>
                @endif
              </div>
            </div>
            {{-- post category --}}
            <div class="form-group">
              <div class="col">
                <select name="category_id" id="category_id"
                  class="form-control {{$errors->has('category_id') ? 'is-invalid' : ''}}">
                  <option disabled selected>Choose Category</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
                </select>
                @if ($errors->has('category_id'))
                <span class="invalid-feedback">{{$errors->first('category_id') }}</span>
                @endif
              </div>
            </div>
            <div class="tag-sidebar tags ml-3"></div>
            <div class="form-group">
              <div class="col-md-4 offset-md-8 py-2">
                <button class="w-100 shadow btn btn-primary" type="submit">Post</button>
              </div>
            </div>
          </form>
        </article>
      </div>
      @endif
      @endauth
      @if (!$posts->count())
      <div class="contnet">
        <div class="alert alert-warning">
          <p>Nothing Found</p>
        </div>
      </div>
      @else
      {{-- authors posts --}}
      @foreach ($posts as $post)
      <div class="content mb-3 content-post">
        <article class="post-item">
          <div class="post-meta p-3">
            {{-- author name --}}
            <ul class="post-meta-group">
              <li>
                <div class="author">
                  <a href="/author/{{$post->author->userName}}">
                    <div class="author-img">
                      <img src="/img/user.svg" alt="authorImg">
                    </div>
                    <h5 class="float-left font-weight-bold " style="color:#1d68a7;">
                      {{$post->author->name}}
                      <span style="font-size:10px;font-weight:100;color:gray;">{{$post->created_at}}</span>
                    </h5>
                  </a>
                </div>
              </li>
              <div class="float-right">
                @if (Auth::check())
                <li>
                  <small>{{$post->likes->count()}}</small>
                </li>
                <li class="like">
                  <form id="likable" action="/blog/{{$post->id}}/likes" method="POST">
                    @csrf
                    <button type="submit" class="like">
                      <i class="lni-heart-filled {{$post->checkUser()}}"></i>
                    </button>
                  </form>
                </li>
                @endif
                <li class="tag">
                  <a href="/category/{{$post->category->slug}}">{{$post->category->title}}</a>
                </li>
                @if(Auth::check() && $post->author->id == Auth::user()->id)
                <li class="dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre><span class="caret more-icon"><i
                        class="lni-more-alt"></i></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                    {{-- edit form --}}
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editForm"
                      style="cursor:pointer">
                      Edit
                    </button>
                    {{-- delete form --}}
                    <a class="dropdown-item" href="/blog/{{$post->id}}" onclick="event.preventDefault();
                                                             document.getElementById('delete-form').submit();">
                      {{ __('Delete') }}
                    </a>
                    <form id="delete-form" action="/blog/{{$post->id}}" method="POST" style="display: none;">
                      @method('DELETE')
                      @csrf
                    </form>
                  </div>
                </li>
                @endif
              </div>
            </ul>
            <!-- Edit Modal -->
            <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-hidden="true">
              <div class=" modal-dialog content" role="document">
                <div class="modal-content" style="border:none">
                  <h5 class="modal-title p-4 font-weight-bold" style="color:#1d68a7;padding-bottom:.5rem !important;">
                    Edit Post
                  </h5>
                  <div class="modal-body">
                    <form action="/blog/{{$post->id}}" method="post">
                      @method('patch')
                      @csrf
                      <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                        <div class="col">
                          <input class="form-control" value="{{$post->title}}" type="text" name="title" id="title"
                            placeholder="Post Title...">
                        </div>
                        @if ($errors->has('title'))
                        <span class="help-block">{{$errors->first('title') }}</span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                        <div class="col">
                          <textarea class="form-control" name="description" id="description"
                            placeholder="Write Post Description Here..." rows="2">{{$post->description}}</textarea>
                        </div>
                        @if ($errors->has('description'))
                        <span class="help-block">{{$errors->first('description') }}</span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                        <div class="col">
                          <select name="category_id" id="category_id" value="{{$post->category_id}}"
                            class="form-control">
                            <option disabled selected>Choose Category
                            </option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                              {{$category->title}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('category_id'))
                          <span class="help-block">{{$errors->first('category_id') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                          changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- author post --}}
          <div class="post-item-body ml-4">
            <div class="p-3" style="white-space:nowrap;text-overflow:ellipsis;">
              <h4 class="post-title"><a href="/blog/{{$post->id}}">{{$post->title}}</a></h4>
              <p class="post-des">
                {!!$post->description!!}
              </p>
            </div>
          </div>
          <hr class="mx-4">
          {{-- comment --}}
          <div class="comment-body">
            <div class="comments pb-2">
              <article class="post-item">
                {{-- comment form --}}
                <form action="/blog/{{$post->id}}/comments" class="pb-4" method="post">
                  @csrf
                  <div class="form-row justify-content-center">
                    <div class="col-md-9 col-9 col-lg-9 col-xl-10">
                      <input class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" type="text"
                        name="body" id="comment" placeholder="Write Comment...">
                      <input type="hidden" name="post_id" value="{{$post->id}}">
                      @if ($errors->has('comment'))
                      <div class="invalid-feedback">{{$errors->first('comment') }}</div>
                      @endif
                    </div>
                    <div class="col-2 col-md-2  col-lg-2 col-xl-1">
                      <button class="w-100 btn btn-primary" data-toggle="tooltip" data-placement="top"
                        title="Comment"><i class="fas fa-paper-plane"></i></button>
                    </div>
                  </div>
                </form>
              </article>
              @foreach($post->comments as $comment)
              <div class="commend mb-3">
                {{-- author name --}}
                <ul class="post-meta-group">
                  <li>
                    <div class="author">
                      <a href="/author/{{$comment->user->userName}}">
                        <div class="author-img">
                          <img src="{{$comment->user->img}}" alt="authorImg">
                        </div>
                        <h6 class="float-left font-weight-bold " style="color:#1d68a7;">
                          {{$comment->user->name}}
                          <span style="font-size:10px;font-weight:100;color:gray;">{{$comment->created_at}}</span>
                        </h6>
                      </a>
                    </div>
                  </li>
                  @if ($comment->user->id == Auth::user()->id)
                  <div class="float-right mr-1">
                    <li>
                      <a href="/blog/{{$post->id}}/comments/{{$comment->id}}"
                        onclick="event.preventDefault();document.getElementById('delete-comment').submit();">
                        <i class="lni-trash trash"></i>
                      </a>
                      <form id="delete-comment" action="/blog/{{$post->id}}/comments/{{$comment->id}}" method="post"
                        style="display: none;">
                        @method('DELETE')
                        @csrf
                      </form>
                    </li>
                  </div>
                  @endif
                </ul>
                <div class="comment">
                  <p class="mb-0">
                    {{$comment->body}}
                  </p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </article>
      </div>
      @endforeach
      @endif
      <nav>
        {{$posts->links()}}
      </nav>
    </div>
    {{-- @include('layouts.sidebar') --}}
  </div>
</div>
@endsection