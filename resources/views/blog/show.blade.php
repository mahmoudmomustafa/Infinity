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
                      <span style="font-size:10px;font-weight:100;color:gray;">{{$post->created_at}}</span>
                    </h5>
                  </a>
                </div>
              </li>
              <span class="float-right">
                <li class="tag">
                  <a href="/category/{{$post->category->slug}}">{{$post->category->title}}</a>
                </li>
                <li class="dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre><span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                    {{-- edit form --}}
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editForm"
                      style="cursor:pointer">
                      Edit
                    </button>
                    {{-- delete form --}}
                    <a class="dropdown-item" href="/blog/{{$post->id}}" onclick="event.preventDefault();
                                                   document.getElementById('delete-form').submit();">
                      {{ __('Delete') }}
                    </a>
                    <form id="delete-form" action="/blog/{{$post->id}}" method="POST" style="display: none;">
                      @method('DELETE')
                      @csrf
                    </form>
                  </div>
                </li>
              </span>
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
                                {{-- <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
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
                                </div> --}}
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