@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <div class="row">
    {{-- user info --}}
    <div class="col-md-4">
      <div class="content mb-3 content-post">
        <article class="post-item">
          <div class="author-meta p-3">
            {{-- author name --}}
            <ul class="w-100 post-meta-group userInfo">
              <li class="mb-4">
                <div class="author">
                  <a href="/author/{{$author->userName}}">
                    <div class="author-img">
                      <img src="/storage/users/{{$author->img}}" class="img-fluid" alt="Responsive image">
                    </div>
                  </a>
                  <h3 class="font-weight-bold mt-4" style="color:#1d68a7;">
                    {{$author->name}}
                    <small>{ {{$author->userName}} }</small>
                  </h3>
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
              {{-- posts --}}
              <li class="info mx-4 font-weight-bold active post">
                See Posts
              </li>
              {{-- General info --}}
              <li class="info mx-4 font-weight-bold inf">
                General Info
              </li>
            </ul>
          </div>
        </article>
      </div>
    </div>
    {{-- posts- --}}
    <div class="col-md-6 offset-md-1 posts">
      {{-- include form post --}}
      @if($author->id == Auth::user()->id)
      @include('blog.formPost')
      @endif
      {{-- session message --}}
      @if (session('message'))
      <div class="alert alert-info" role="alert">
        {{ session('message')}}
      </div>
      @endif
      {{-- authors posts --}}
      @forelse ($posts as $post)
      <div class="content mb-3 content-post">
        <article class="post-item">
          <div class="post-meta p-3">
            {{-- author name --}}
            <ul class="post-meta-group">
              <li>
                <div class="author">
                  <a href="/author/{{$post->author->userName}}">
                    <div class="author-img">
                      <img src="/storage/users/{{$author->img}}" alt="">
                    </div>
                    <h5 class="float-left font-weight-bold " style="color:#1d68a7;">
                      {{$post->author->name}}
                      <span style="font-size:10px;font-weight:100;color:gray;">{{$post->date}}</span>
                    </h5>
                  </a>
                </div>
              </li>
              <div class="float-right mr-1">
                <li class="tag mt-1">
                  <a href="/category/{{$post->category->slug}}">{{$post->category->title}}</a>
                </li>
                @canany(['update', 'delete'], $post)
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
                    <a class="dropdown-item" href="/blog/{{$post->id}}"
                      onclick="event.preventDefault();
                                                             document.getElementById('delete-form-{{$post->id}}').submit();">
                      {{ __('Delete') }}
                    </a>
                    <form id="delete-form-{{$post->id}}" action="/blog/{{$post->id}}" method="POST"
                      style="display: none;">
                      @method('DELETE')
                      @csrf
                    </form>
                  </div>
                </li>
                @endcanany
              </div>
            </ul>
            @can('update', $post)
            <!-- Edit Modal -->
            <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-hidden="true">
              <div class=" modal-dialog content" role="document">
                <div class="modal-content" style="border:none">
                  <h5 class="modal-title p-4 font-weight-bold" style="color:#1d68a7;padding-bottom:.5rem !important;">
                    Edit Post
                  </h5>
                  <div class="modal-body">
                    <form action="/blog/{{$post->id}}" method="post" files=TRUE>
                      @method('patch')
                      @csrf
                      {{-- description --}}
                      <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                        <div class="col">
                          <textarea class="form-control" name="description" placeholder="Write Post Description Here..."
                            rows="2">{{$post->description}}</textarea>
                        </div>
                        @if ($errors->has('description'))
                        <span class="help-block">{{$errors->first('description') }}</span>
                        @endif
                      </div>
                      {{-- category --}}
                      <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                        <div class="col">
                          <select name="category_id" value="{{$post->category_id}}" class="form-control">
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
            @endcan
          </div>
          {{-- author post --}}
          <div class="post-item-body">
            <a href="/blog/{{$post->id}}">
              @if (!is_null($post->image))
              <div class="img mt-2">
                <img src="/storage/posts/{{ $post->image }}" class="img-thumbnail">
              </div>
              @endif
              <div class="p-3" style="white-space:nowrap;text-overflow:ellipsis;">
                <p class="post-des">
                  {!!$post->description!!}
                </p>
              </div>
            </a>
          </div>
          <hr class="mx-4">
          {{-- comment --}}
          @include('blog.comment')
        </article>
      </div>
      @empty
      <div class="alert alert-warning" role="alert">
        NO Posts Yet..
      </div>
      @endforelse
      <nav>
        {{$posts->links()}}
      </nav>
    </div>
    {{--Info--}}
    <div class="col-md-6 offset-md-1 information">
      @include('blog.authorInf')
    </div>
  </div>
</div>
@endsection