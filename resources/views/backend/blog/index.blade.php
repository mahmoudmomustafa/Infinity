@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')
@section('content')
<div class="container-fluid p-4">
  <!-- Content Header (Page header) -->
  <section class="content-header" style="overflow:auto">
      <h1 class="float-left font-weight-bold " style="color:#1d68a7;">
        Display All Posts...
      </h1>
      <div class="create float-right py-2">
        <button class="btn btn-primary">
          New Post
        </button>
      </div>
    </section>

  <!-- Main content -->
  <section class="container mt-4">
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
            <table class="table table-striped table-dark table-hover table-bordered ">
              <thead>
                <tr>
                  <td>Post title</td>
                  <td width="100">Author</td>
                  <td style="text-align:center;">Likes</td>
                  <td style="text-align:center;">Comments</td>
                  <td>Category</td>
                  <td width="100">Created at</td>
                  <td width='80'>Actions</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                <tr>
                  <td>{{$post->title}}</td>
                  <td>{{$post->author->name}}</td>
                  <td style="text-align:center;">{{$post->author->id}}</td>
                  <td style="text-align:center;">{{$post->author->id}}</td>
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