@extends('layouts.backend.main')
@section('title','MyBlog | Edit Post')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog
      <small>Edit Post</small>
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
            <form action="/backend/blog/{{$post->id}}" method="POST">
              @method('patch')
              @csrf
              <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                <label for="title">title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                @if ($errors->has('title'))
                <span class="help-block">{{$errors->first('title') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                <label for="slug">slug:</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ $post->slug }}">
                @if ($errors->has('slug'))
                <span class="help-block">{{$errors->first('slug') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="excerpt">excerpt:</label>
                <textarea name="excerpt" id="excerpt" cols="5" rows="5"
                  class="form-control">{{ $post->excerpt }}</textarea>
              </div>
              <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                <label for="description">description:</label>
                <textarea name="description" id="description" cols="10" rows="10"
                  class="form-control">{{ $post->description }}</textarea>
                @if ($errors->has('description'))
                <span class="help-block">{{$errors->first('description') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('published_at') ? 'has-error' : ''}}">
                <label for="published_at">Published Date:</label>
                <input type="text" name="published_at" id="published_at" class="form-control" placeholder="Y-m-d H:i:s"
                  value="{{ $post->date }}">
                @if ($errors->has('published_at'))
                <span class="help-block">{{$errors->first('published_at') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control" value="{{ $post->category_id }}">
                  <option disabled selected>Choose Category</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
                </select>
                @if ($errors->has('category_id'))
                <span class="help-block">{{$errors->first('category_id') }}</span>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
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