@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 offset-md-1">
      {{-- session message --}}
      @if (session('message'))
      <div class="alert alert-info" role="alert">
        {{ session('message')}}
      </div>
      @endif
      {{-- authors --}}
      @forelse ($users as $user)
      <div class="content mb-3 content-post">
        <article class="post-item">
          <div class="post-meta p-3" style="padding-bottom: 0 !important;">
            {{-- author name --}}
            <ul class="post-meta-group">
              <li>
                <div class="author">
                  <a href="/author/{{$user->userName}}">
                    <div class="author-img">
                      <img src="/storage/users/{{$user->img}}">
                    </div>
                    <h5 class="float-left font-weight-bold">
                      {{$user->name}}
                    </h5>
                  </a>
                </div>
              </li>
            </ul>
          </div>
          <hr class="mx-4">
        </article>
      </div>
      @empty
      <div class="alert alert-warning" role="alert">
        No Found..
      </div>
      @endforelse
      <nav>
        {{-- {{$posts->links()}} --}}
      </nav>
    </div>
    @include('layouts.sidebar')
  </div>
</div>
@endsection