@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')
@section('content')
<div class="container-fluid p-4">
  <!-- Content Header (Page header) -->
  <section class="content-header" style="overflow:auto">
    <h1 class="float-left" style="color:#1d68a7;">
      <i class="lni-write"></i> Display Posts...
    </h1>
    {{-- create post --}}
    <div class="create float-right py-2 mr-2">
      <a href="/dashboard/posts/create">
        <button class="btn btn-primary btn-add">
          Add<i class="ml-2 lni-plus"></i>
        </button>
      </a>
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
            <div class="table-responsive">
              <table class="table table-striped table-dark table-hover table-bordered ">
                <thead>
                  <tr class="font-weight-bold " style="color:#1d68a7;">
                    <td>Post</td>
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
                    <td>{{$post->description}}</td>
                    <td>{{$post->author->name}}</td>
                    <td style="text-align:center;">{{$post->author->id}}</td>
                    <td style="text-align:center;">{{$post->comments->count()}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td style="display:flex">
                      <a href="/dashboard/posts/{{$post->id}}/edit" class="mr-2 btn btn-xs btn-success">
                        <i class="fa fa-edit"></i>
                      </a>
                      <form action="/dashboard/posts/{{$post->id}}" method="post">
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
            </div>
            @endif
          </div>
          <!-- /.box-body -->
          <nav>
            {{$posts->links()}}
          </nav>
        </div>
      </div>
  </section>
</div>
@endsection