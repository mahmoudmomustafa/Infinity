@extends('layouts.backend.main')
@section('title','MyBlog | Edit Post')
@section('content')
<div class="container-fluid p-4">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="overflow:auto">
      <h1 class="float-left font-weight-bold " style="color:#1d68a7;">
        <i class="lni-write"></i> Edit Post...
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
    <section class="container  mt-4">
      <div class="row">
        <div class="col">
          <div class="box">
            <div class="box-body ">
            <form action="/dashboard/posts/{{$post->id}}" class="mt-2"method="post">
                @csrf
                @method('patch')
                <div class="form-group row">
                  <div class="col-md-6 m-auto">
                    <input type="text" name="title" id="title"
                      class="form-control back-create {{$errors->has('title') ? 'has-error' : ''}}"
                  placeholder="Post Title" value="{{$post->title}}">
                    @if ($errors->has('title'))
                    <span class="help-block">{{$errors->first('title') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 m-auto">
                    <input name="description" id="description" placeholder="Post Description"
                      class="form-control back-create {{$errors->has('description') ? 'has-error' : ''}}" value="{{$post->description}}">
                    @if ($errors->has('description'))
                    <span class="help-block">{{$errors->first('description') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 m-auto">
                    <select name="category_id" id="category_id" value="{{$post->category->id}}"
                      class="form-control back-create {{$errors->has('category_id') ? 'has-error' : ''}}">
                      <option disabled selected>Choose Category</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <span class="help-block">{{$errors->first('category_id') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-4 m-auto offset-md-6">
                    <button type="submit" class="w-100 btn btn-success">
                      {{ __('Post') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>
  </div>
@endsection