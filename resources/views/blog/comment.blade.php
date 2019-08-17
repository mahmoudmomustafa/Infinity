<div class="comment-body">
  <div class="comments pb-2">
    <article class="post-item pb-4">
      <div class="form-row">
        <div class="col-1 likes ml-4">
          <div class="like d-flex">
            <form id="likable" action="/blog/{{$post->id}}/likes" method="POST">
              @csrf
              <button class="like" data-toggle="tooltip" data-placement="left" title="{{$post->likes->count()}} Likes">
                <i class="lni-heart-filled {{$post->checkUser()}}"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="col">
          {{-- comment form --}}
          <form action="/blog/{{$post->id}}/comments" method="post">
            @csrf
            <div class="form-row justify-content-start mx-0 ml-2">
              <div class="col-md-9 col-9 col-lg-9 col-xl-10" style="position:relative">
                <input class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" type="text" name="body"
                  id="comment_{{$post->id}}" placeholder="Write Comment...">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                @if ($errors->has('comment'))
                <div class="invalid-feedback">{{$errors->first('comment') }}</div>
                @endif
                <div class="count tag">
                  <small><span>{{$post->comments->count()}} Comments</span></small>
                </div>
              </div>
              <div class="col-2 col-md-2  col-lg-2 col-xl-1 p-0">
                <button class="w-100 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Comment"><i
                    class="fas fa-paper-plane"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </article>
    @foreach (Request::is('/') ? $post->comments->take(1) : $post->comments as $comment)
    <div class="commend mb-2">
      {{-- author name --}}
      <ul class="post-meta-group">
        <li>
          <div class="author">
            <a href="/author/{{$comment->user->userName}}">
              <div class="author-img" style="width:40px;height:40px">
                <img src="/storage/users/{{$comment->user->img}}">
              </div>
              <h6 class="float-left font-weight-bold p-2">
                {{$comment->user->name}}
                <span style="font-size:10px;font-weight:100;color:gray;"> | {{$comment->date}}</span>
              </h6>
            </a>
          </div>
        </li>
        @can('delete', $comment)
        <div class="float-right mr-1">
          <li>
            <a href="/blog/{{$post->id}}/comments/{{$comment->id}}"
              onclick="event.preventDefault();document.getElementById('delete-comment_{{$comment->id}}').submit();">
              <i class="lni-trash trash"></i>
            </a>
            <form id="delete-comment_{{$comment->id}}" action="/blog/{{$post->id}}/comments/{{$comment->id}}"
              method="post" style="display: none;">
              @method('DELETE')
              @csrf
            </form>
          </li>
        </div>
        @endcan
      </ul>
      <div class="comment">
        <p class="mb-0">
          {{$comment->body}}
        </p>
      </div>
    </div>
    @endforeach
  </div>
</div>