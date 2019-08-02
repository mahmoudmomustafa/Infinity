@extends('layouts.backend.main')
@section('title','MyBlog | Add Post')
@section('content')
<div class="container-fluid p-4">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="overflow:auto">
        <h1 class="float-left font-weight-bold " style="color:#1d68a7;">
            <i class="lni-slack"></i> Add  Tag...
        </h1>
        {{-- create tag --}}
        <div class="create float-right py-2 mr-2">
          <a href="/dashboard/tags">
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