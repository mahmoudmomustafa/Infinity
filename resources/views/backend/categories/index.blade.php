@extends('layouts.backend.main')
@section('title','MyBlog | Categories')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Categories
      <small>Display all Categories</small>
      <b>
        <a href="/backend/categories/create" class="btn btn-primary">
          Add new Category
        </a>
      </b>
    </h1>
    <ol class="breadcrumb">
      {{-- Dashboard --}}
      <li class="active">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      {{-- posts --}}
      <li class="active">
        <a href="/backend/categories">Categories</a>
      </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="container  mt-2">
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
            @if (!$categories->count())
            <div class="alert alert-danger">
              <strong>No record</strong>
            </div>
            @else
            <table class="table taable-bordered">
              <thead>
                <tr>
                  <td>Categories</td>
                  <td width='100'>Post Count</td>
                  <td width="100">Actions</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td>{{$category->title}}</td>
                  <td>{{$category->posts->count()}}</td>
                  <td style="display:flex;">
                    <a href="/backend/categories/{{$category->id}}/edit" class="mr-2 btn btn-xs btn-success">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="/backend/categories/{{$category->id}}" method="post">
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
        </div>
      </div>
  </section>
</div>
@endsection