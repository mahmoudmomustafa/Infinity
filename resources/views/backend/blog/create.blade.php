@extends('layouts.backend.main')
@section('title','MyBlog | Add Post')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container-fluid p-4">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="overflow:auto">
          <h1 class="float-left font-weight-bold " style="color:#1d68a7;">
              <i class="lni-write"></i> Add Post...
          </h1>
          {{-- create tag --}}
          <div class="create float-right py-2 mr-2">
            <a href="/dashboard/posts">
              <button class="btn btn-primary btn-add">
                <i class="lni-angle-double-left pr-2"></i>
                Back
              </button>
            </a>
          </div>
        </section>

  <!-- Main content -->
  <section class="container  mt-2">
    <div class="row">
      <div class="col">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body ">
            <form action="/backend/blog" method="post">
              @csrf
              <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                <label for="title">title:</label>
                <input type="text" name="title" id="title" class="form-control">
                @if ($errors->has('title'))
                <span class="help-block">{{$errors->first('title') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                <label for="slug">slug:</label>
                <input type="text" name="slug" id="slug" class="form-control">
                @if ($errors->has('slug'))
                <span class="help-block">{{$errors->first('slug') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="excerpt">excerpt:</label>
                <textarea name="excerpt" id="excerpt" cols="5" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                <label for="description">description:</label>
                <textarea name="description" id="description" cols="10" rows="10" class="form-control"></textarea>
                @if ($errors->has('description'))
                <span class="help-block">{{$errors->first('description') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
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