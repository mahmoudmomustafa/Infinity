<div class="comment-body">
  <div class="comments pb-2">
    <article class="post-item">
      {{-- comment form --}}
      <form action="/blog/{{$post->id}}/comments" class="pb-4" method="post">
        @csrf
        <div class="form-row justify-content-center">
          <div class="col-md-9 col-9 col-lg-9 col-xl-10">
            <input class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" type="text" name="body"
              id="comment" placeholder="Write Comment...">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            @if ($errors->has('comment'))
            <div class="invalid-feedback">{{$errors->first('comment') }}</div>
            @endif
          </div>
          <div class="col-2 col-md-2  col-lg-2 col-xl-1">
            <button class="w-100 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Comment"><i
                class="fas fa-paper-plane"></i></button>
          </div>
        </div>
      </form>
    </article>
    @foreach($post->comments as $comment)
    <div class="commend mb-3">
      {{-- author name --}}
      <ul class="post-meta-group">
        <li>
          <div class="author">
            <a href="/author/{{$comment->user->userName}}">
              <div class="author-img">
                <img src="{{$comment->user->img}}" alt="authorImg">
              </div>
              <h6 class="float-left font-weight-bold " style="color:#1d68a7;">
                {{$comment->user->name}}
                <span style="font-size:10px;font-weight:100;color:gray;">{{$comment->created_at}}</span>
              </h6>
            </a>
          </div>
        </li>
        @if ($comment->user->id == Auth::user()->id)
        <div class="float-right mr-1">
          <li>
            <a href="/blog/{{$post->id}}/comments/{{$comment->id}}"
              onclick="event.preventDefault();document.getElementById('delete-comment').submit();">
              <i class="lni-trash trash"></i>
            </a>
            <form id="delete-comment" action="/blog/{{$post->id}}/comments/{{$comment->id}}" method="post"
              style="display: none;">
              @method('DELETE')
              @csrf
            </form>
          </li>
        </div>
        @endif
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