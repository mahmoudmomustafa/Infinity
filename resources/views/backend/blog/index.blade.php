@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog
      <small>Display all posts</small>
    </h1>
    <ol class="breadcrumb">
      {{-- Dashboard --}}
      <li class="active">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      {{-- posts --}}
      <li class="active">
        <a href="/backend/blog">Posts</a>
      </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="container mt-2">
    <div class="row">
      <div class="col">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body ">
            @if (session('message'))
            <div class="alert alert-info">
              {{ session('message')}}
            </div>
            @endif
            @if (!$posts->count())
            <div class="alert alert-danger">
              <strong>No record</strong>
            </div>
            @else
            <table class="table taable-bordered">
              <thead>
                <tr>
                  <td>Post title</td>
                  <td width="100">Author</td>
                  <td>Likes</td>
                  <td>Comments</td>
                  <td>Category</td>
                  <td width="120">Created at</td>
                  <td width='80'>Actions</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                <tr>
                  <td>{{$post->title}}</td>
                  <td>{{$post->author->name}}</td>
                  <td>{{$post->author->id}}</td>
                  <td>{{$post->author->id}}</td>
                  <td>{{$post->category->title}}</td>
                  <td>{{$post->created_at}}</td>
                  <td style="display:flex">
                    <a href="/backend/blog/{{$post->id}}/edit" class="mr-2 btn btn-xs btn-success">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="/backend/blog/{{$post->id}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
          <!-- /.box-body -->
          <nav>
            {{$posts->links()}}
          </nav>
          <!-- /.box -->
        </div>
      </div>
      <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection