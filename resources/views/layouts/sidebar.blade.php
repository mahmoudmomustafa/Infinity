<div class="col-md-3 offset-md-1">
  <aside class="right-sidebar">
    {{-- popular posts --}}
    @if ($popularPosts->count())
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
                <h6 style="overflow:auto">
                  <a href="/blog/{{$post->id}}">{{$post->title}}</a>
                  <div class="float-right">
                    <div class="">
                      <small> <span>{{$post->view_count}}</span><i class="ml-2 lni-eye"></i></small>
                    </div>
                  </div>
                </h6>
                <div class="post-meta">
                  <span>{{$post->created_at}}</span>
                  <span style="float:right"><a
                      href="/author/{{$post->author->userName}}">{{$post->author->name}}</a></span>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    @endif
    {{-- categories --}}
    @if ($categories->count())
    <div class="content mb-3">
      <div class="widget">
        <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
          Tags..
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
    @endif
  </aside>
</div>