@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="content">
        <article class="post-item post-detail">

          @if ($post->image_url)
          <div class="post-item-image">
            <img src="{{$post->image_url}}" alt="{{$post->title}}">
          </div>
          @endif

          <div class="post-item-body">
            <div class="padding-10">
              <h1>{{$post->title}}</h1>

              <div class="post-meta no-border">
                <ul class="post-meta-group">
                  <li><i class="fa fa-user"></i><a href="/author/{{ $post->author->slug}}"> {{$post->author->name}}</a>
                  </li>
                  <li><i class="fa fa-clock-o"></i><time> {{$post->date}}</time></li>
                  <li><i class="fa fa-tags"></i><a href="/category/{{$post->category->slug}}">
                      {{$post->category->title}}</a></li>
                  {{-- <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li> --}}
                </ul>
              </div>

              {!! $post->body_html !!}
              @auth
              <div class="row">
                <div class="col-1">
                  <a href="/backend/blog/{{$post->id}}/edit" class="btn btn-xs btn-success">
                    <i class="fa fa-edit"></i>
                  </a>
                </div>
                <div class="col-1">
                  <form action="/backend/blog/{{$post->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                </div>
              </div>
              @endauth
            </div>
          </div>
        </article>
      </div>

      <div class="content">
        <article class="post-author padding-10">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img alt="Author 1" src="/img/author.jpg" class="media-object">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading"><a href="/author/{{ $post->author->slug}}">{{$post->author->name}}</a></h4>
              <div class="post-author-count">
                <a href="/author/{{ $post->author->slug}}">
                  <i class="fa fa-clone"></i>
                  {{$post->author->posts->count()}} Posts
                </a>
              </div>
              {!! $post->author->bio_html !!}
            </div>
          </div>
        </article>
      </div>
      {{-- comments here --}}
    </div>
    @include('layouts.sidebar')
  </div>
</div>
@endsection