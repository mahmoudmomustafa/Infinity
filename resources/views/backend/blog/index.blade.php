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
      <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body ">
            @if (!$posts->count())
            <div class="alert alert-danger">
              <strong>No record</strong>
            </div>
            @else
            <table class="table taable-bordered">
              <thead>
                @foreach ($posts as $post)
                <tr>
                  <td>
                    <a href="{{route('backend.edit',$post->id)}}" class="btn btn-xs btn-default">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('backend.delete',$post->id)}}" class="btn btn-xs btn-danger">
                      <i class="fa fa-times"></i>
                    </a>
                  </td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->author->name}}</td>
                  <td>{{$post->category->title}}</td>
                  <td>{{$post->created_at}}</td>
                </tr>
                @endforeach
              </thead>
            </table>
            @endif
          </div>
          <!-- /.box-body -->
          {{-- <div class="box-footer">
            <ul class="pagination">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
            </ul>
          </div>
        </div> --}}
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