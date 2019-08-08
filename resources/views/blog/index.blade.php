@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-1">
            {{-- session message --}}
            @if (session('message'))
            <div class="content">
                <div class="alert alert-info">
                    {{ session('message')}}
                </div>
            </div>
            @endif
            {{-- include post form --}}
            @include('blog.formPost')
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
                    <div class="post-meta p-3" style="padding-bottom: 0 !important;">
                        {{-- author name --}}
                        <ul class="post-meta-group">
                            <li>
                                <div class="author">
                                    <a href="/author/{{$post->author->userName}}">
                                        <div class="author-img">
                                            <img src="{{$post->author->img}}" alt="authorImg">
                                        </div>
                                        <h5 class="float-left font-weight-bold" style="color:#1d68a7;">
                                            {{$post->author->name}}
                                            <span
                                                style="font-size:10px;font-weight:100;color:gray;">{{$post->created_at}}</span>
                                        </h5>
                                    </a>
                                </div>
                            </li>
                            <div class="float-right mr-1">
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
                                <li class="tag">
                                    <a href="/category/{{$post->category->slug}}">{{$post->category->title}}</a>
                                </li>
                                @if($post->author->id == Auth::user()->id)
                                <li class="dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span
                                            class="caret more-icon"><i class="lni-more-alt"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                        {{-- edit form --}}
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#editForm" style="cursor:pointer">
                                            Edit
                                        </button>
                                        {{-- delete form --}}
                                        <a class="dropdown-item" href="/blog/{{$post->id}}" onclick="event.preventDefault();
                                                             document.getElementById('delete-form').submit();">
                                            {{ __('Delete') }}
                                        </a>
                                        <form id="delete-form" action="/blog/{{$post->id}}" method="POST"
                                            style="display: none;">
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
                                    <h5 class="modal-title p-4 font-weight-bold"
                                        style="color:#1d68a7;padding-bottom:.5rem !important;">Edit Post
                                    </h5>
                                    <div class="modal-body">
                                        <form action="/blog/{{$post->id}}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                                <div class="col">
                                                    <input class="form-control" value="{{$post->title}}" type="text"
                                                        name="title" id="title" placeholder="Post Title...">
                                                </div>
                                                @if ($errors->has('title'))
                                                <span class="help-block">{{$errors->first('title') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                                                <div class="col">
                                                    <textarea class="form-control" name="description" id="description"
                                                        placeholder="Write Post Description Here..."
                                                        rows="2">{{$post->description}}</textarea>
                                                </div>
                                                @if ($errors->has('description'))
                                                <span class="help-block">{{$errors->first('description') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                                                <div class="col">
                                                    <select name="category_id" id="category_id"
                                                        value="{{$post->category_id}}" class="form-control">
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
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
                    @include('blog.comment')
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