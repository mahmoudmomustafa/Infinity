@extends('layouts.backend.main')
@section('title','MyBlog | Add Post')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Categories
      <small>Add new Category</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <a href="/home">Dashboard</a>
      </li>
      {{-- posts --}}
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
            <form action="/backend/categories" method="post">
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
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/backend/categories" class="btn btn-info">Cancel</a>
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