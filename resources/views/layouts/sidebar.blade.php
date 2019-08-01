<div class="col-md-3 offset-md-1">
  <aside class="right-sidebar">
     {{-- popular posts --}}
    <div class="content mb-3">
      <div class="widget">
        <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
          Popular Posts..
        </h5>
        <div class="widget-body">
          <ul class="popular-posts">
            @foreach ($popularPosts as $post)
            <li>
              <div class="post-body">
                <h6><a href="/blog/{{$post->id}}">{{$post->title}}</a></h6>
                <div class="post-meta">
                  <span>{{$post->created_at}}</span>
                  <span style="float:right"><a href="/author/{{$post->author->userName}}">{{$post->author->name}}</a></span>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    {{-- categories --}}
    <div class="content mb-3">
      <div class="widget">
        <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
          Categories..
        </h5>
        <div class="widget-body">
          <ul class="categories">
            @foreach ($categories as $category)
            <span class="tag-sidebar">
                <a href="/category/{{$category->slug}}">{{$category->title}}</a>
            </span>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </aside>
</div>