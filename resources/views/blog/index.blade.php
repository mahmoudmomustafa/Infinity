@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-1">
            @if (session('message'))
            <div class="content">
                <div class="alert alert-info">
                    {{ session('message')}}
                </div>
            </div>
            @endif
            @auth
            {{-- form post --}}
            <div class="content mb-3">
                <article class="post-item">
                    <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
                        Share Your Thought..
                    </h5>
                    <form action="/" method="post">
                        @csrf
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <div class="col">
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Post Title...">
                            </div>
                            @if ($errors->has('title'))
                            <span class="help-block">{{$errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                            <div class="col">
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="Write Post Description Here..." rows="2"></textarea>
                            </div>
                            @if ($errors->has('description'))
                            <span class="help-block">{{$errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                            <div class="col">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option disabled selected>Choose Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                <span class="help-block">{{$errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 offset-md-8 py-2">
                                <button class="w-100 shadow btn btn-primary" type="submit">Post</button>
                            </div>
                        </div>
                    </form>
                </article>
            </div>
            @endauth
            @if (!$posts->count())
            <div class="contnet">
                <div class="alert alert-warning">
                    <p>Nothing Found</p>
                </div>
            </div>
            @else
            @foreach ($posts as $post)
            <div class="content mb-3">
                <article class="post-item">
                    <div class="post-meta p-3" style="padding-bottom: 0 !important;">
                        <ul class="post-meta-group">
                            <li>
                                <div class="author">
                                    <a href="/author/{{ $post->author->slug}}">
                                        <div class="author-img">
                                            <img src="/img/user.svg" alt="authorImg">
                                        </div>
                                        <h5 class="float-left font-weight-bold " style="color:#1d68a7;">
                                            {{$post->author->name}}
                                            <span
                                                style="font-size:10px;font-weight:100;color:gray;">{{$post->created_at}}</span>
                                        </h5>
                                    </a>
                                </div>
                            </li>
                            <span class="float-right">
                                <li class="tag">
                                    <a href="/category/{{$post->category->slug}}">{{$post->category->title}}</a>
                                </li>
                                {{-- jkjk --}}
                                <li class="dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/blog/{{$post->id}}" onclick="event.preventDefault();
                                                             document.getElementById('delete-form').submit();">
                                                {{ __('Delete') }}
                                            </a>
            
                                            <form id="delete-form" action="post" method="POST"
                                                style="display: none;">
                                                @method('DELETE')
                                    @csrf
                                            </form>
                                        </div>
                                    </li>
                                {{-- jkj --}}
                                {{-- <form action="/blog/{{$post->id}}" method="post">
                                    
                                    <button type="submit" class="btn btn-danger">
                                      Delete
                                    </button>
                                  </form> --}}
                            </span>
                        </ul>
                    </div>
                    <div class="post-item-body ml-4">
                        <div class="p-4" style="white-space:nowrap;text-overflow:ellipsis;">
                            <h4 class="post-title"><a href="/blog/{{$post->id}}">{{$post->title}}</a></h4>
                            <p class="post-des">
                                {!!$post->description!!}
                            </p>
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
        @include('layouts.sidebar')
    </div>
</div>
@endsection