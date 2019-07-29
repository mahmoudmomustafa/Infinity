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
            @if (!$posts->count())
            <div class="contnet">
                <div class="alert alert-warning">
                    <p>Nothing Found</p>
                </div>
            </div>
            @else

            @foreach ($posts as $post)
            <div class="content mb-2">
                <article class="post-item">
                    <div class="post-meta p-3">
                        <ul class="post-meta-group">
                            <li>
                                <h5 class="float-left font-weight-bold text-primary">
                                    <div class="author-img">
                                        <img src="/" alt="authorImg">
                                    </div>
                                    <a href="/author/{{ $post->author->slug}}">{{$post->author->name}}</a>
                                </h5>
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
                            <h2><a href="/blog/{{$post->id}}">{{$post->title}}</a></h2>
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