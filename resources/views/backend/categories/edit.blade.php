@extends('layouts.backend.main')
@section('title','MyBlog | Edit category')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog
      <small>Edit category</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <a href="/home">Dashboard</a>
      </li>
      {{-- categorys --}}
      <li class="active">
        <a href="/backend/categories">Categories</a>
      </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body ">
            <form action="/backend/blog/{{$category->id}}" method="post">
              @method('patch')
              @csrf
              <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                <label for="title">title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$category->title}}">
                @if ($errors->has('title'))
                <span class="help-block">{{$errors->first('title') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                <label for="slug">slug:</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
                @if ($errors->has('slug'))
                <span class="help-block">{{$errors->first('slug') }}</span>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection