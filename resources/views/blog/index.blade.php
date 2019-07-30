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
            <div class="content mb-3">
                <article class="post-item">
                    <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
                        Share Your Thought
                    </h5>
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col">
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Post Title...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <textarea class="form-control" name="text" id="text"
                                    placeholder="Write Post Description Here..." rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 offset-md-8 py-2">
                                <button class="w-100 btn btn-primary" type="submit" >Post</button>
                            </div>
                        </div>
                    </form>
                </article>
            </div>
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
                                        </h5>
                                    </a>
                                </div>
                            </li>
                            <span class="float-right">
                                <li class="tag">
                                    <a href="/category/{{$post->category->slug}}">
                                        {{$post->category->title}}</a></li>
                            </span>
                        </ul>
                    </div>
                    <div class="post-item-body ml-4">
                        <div class="p-4">
                            <h4 style="font-weight:700;
                            text-indent:30px;"><a href="/blog/{{$post->id}}">{{$post->title}}</a></h4>
                            {!!$post->excerpt_html!!}
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