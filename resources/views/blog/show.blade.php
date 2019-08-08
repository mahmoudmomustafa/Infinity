@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 offset-md-1">
      <div class="content mb-3">
        <article class="post-item post-detail">
          <div class="post-item-body p-3">
            {{-- author name --}}
            <ul class="post-meta-group">
              <li>
                <div class="author">
                  <a href="/author/{{$post->author->userName}}">
                    <div class="author-img">
                      <img src="{{$post->author->img}}" alt="authorImg">
                    </div>
                    <h5 class="float-left font-weight-bold " style="color:#1d68a7;">
                      {{$post->author->name}}
                      <span style="font-size:10px;font-weight:100;color:gray;">{{$post->created_at}}</span>
                    </h5>
                  </a>
                </div>
              </li>
              <span class="float-right mr-1">
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
                @if (Auth::check() && $post->author->id == Auth::user()->id)
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
              </span>
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
            <p class="p-4">
              {!! $post->description !!}
            </p>
          </div>
          {{-- comments --}}
          <div class="comments pb-2">
            <article class="post-item">
              <h5 class="px-4 font-weight-bold " style="color:#1d68a7;padding-bottom:1rem !important;">
                Comments..
              </h5>
              @if (Auth::chcek())
              {{-- comment form --}}
              <form action="/blog/{{$post->id}}/comments" class="pb-4" method="post">
                @csrf
                <div class="form-group mx-3 mb-2">
                  <input class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" type="text" name="body"
                    id="comment" placeholder="Write Comment...">
                  <input type="hidden" name="post_id" value="{{$post->id}}">
                  @if ($errors->has('comment'))
                  <div class="invalid-feedback">{{$errors->first('comment') }}</div>
                  @endif
                </div>
                <div class="form-group mx-3">
                  <button class="btn btn-primary">Comment</button>
                </div>
              </form>
              @endif
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
                      <h5 class="float-left font-weight-bold " style="color:#1d68a7;">
                        {{$comment->user->name}}
                        <span style="font-size:10px;font-weight:100;color:gray;">{{$comment->created_at}}</span>
                      </h5>
                    </a>
                  </div>
                </li>
                @if (Auth::check() && $comment->user->id == Auth::user()->id)
                <span class="float-right mr-1">
                  <li class="dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span
                        class="caret more-icon"><i class="lni-more-alt"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                      {{-- delete form --}}
                      <a class="dropdown-item" href="/blog/{{$post->id}}/comments/{{$comment->id}}"
                        onclick="event.preventDefault();document.getElementById('delete-comment').submit();">
                        {{ __('Delete') }}
                      </a>
                      <form id="delete-comment" action="/blog/{{$post->id}}/comments/{{$comment->id}}" method="post"
                        style="display: none;">
                        @method('DELETE')
                        @csrf
                      </form>
                    </div>
                  </li>
                </span>
                @endif
              </ul>
              <div class="comment">
                <p>
                  {{$comment->body}}
                </p>
              </div>
            </div>
            @endforeach
          </div>
        </article>
      </div>
    </div>
    @include('layouts.sidebar')
  </div>
</div>
@endsection