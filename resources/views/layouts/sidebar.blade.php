<div class="col-md-3 offset-md-1">
  <aside class="right-sidebar">
    {{-- add post --}}
    @auth
    <div class="content">
      <div class="btn">
        {{-- new post --}}
        <a class="btn btn-primary" href="/backend/blog/create">{{ __('New Post') }}</a>
        {{-- see post --}}
        <a class="btn btn-primary" href="/author/{{Auth::user()->slug}}">{{ __('See Posts') }}</a>
      </div>
    </div>
    @endauth
    <div class="content">
      <div class="widget">
        <div class="widget-heading">
          <h5>Categories</h5>
        </div>
        <div class="widget-body">
          <ul class="categories">

            @foreach ($categories as $category)
            <li>
              <a href="/category/{{$category->slug}}"><i class="fa fa-angle-right"></i> {{ $category->title}}</a>
              <span class="badge pull-right"> {{ $category->posts->count()}}</span>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="widget">
        <div class="widget-heading">
          <h5>Popular Posts</h5>
        </div>
        <div class="widget-body">
          <ul class="popular-posts">

            @foreach ($popularPosts as $post)
            <li>
              <div class="post-body">
                <h6><a href="/blog/{{$post->id}}">{{$post->title}}</a></h6>
                <div class="post-meta">
                  <span>{{$post->created_at}}</span>
                  <span style="float:right"><a href="/author/{{$post->author->slug}}">{{$post->author->name}}</a></span>
                </div>
              </div>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </aside>
</div>