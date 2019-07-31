@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 offset-md-1">
      <div class="content mb-3">
        <article class="post-item post-detail">
          <div class="post-item-body p-3">
              {{-- author name --}}
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
                      <li class="dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span
                                  class="caret"></span>
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
                  </span>
              </ul>
              <p class="p-4">
                {!! $post->description !!}
              </p>
          </div>
          {{-- comments --}}
          <div class="comments">
              <article class="post-item">
                  <h5 class="px-4 font-weight-bold " style="color:#1d68a7;padding-bottom:1rem !important;">
                      Comments..
                  </h5>
                  {{-- comment form --}}
                <form action="/blog" class="pb-4" method="post">
                  <div class="form-group">
                      <div class="col-md-10 offset-md-1">
                          <input class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" type="text"
                              name="cmment" id="comment" placeholder="Write Comment...">
                          @if ($errors->has('comment'))
                          <div class="invalid-feedback">{{$errors->first('comment') }}</div>
                          @endif
                      </div>
                  </div>
                </form>
              </article>
          </div>
        </article>
      </div>
    </div>
    @include('layouts.sidebar')
  </div>
</div>
@endsection