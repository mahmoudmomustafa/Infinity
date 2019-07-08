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
                  <td>Actions</td>
                  <td>Categories</td>
                  <td>Post Count</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td width='80'>
                    <a href="/backend/categories/{{$category->id}}/edit" class="btn btn-xs btn-success">
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
                  <td>{{$category->title}}</td>
                  <td>{{$category->posts->count()}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
          <!-- /.box-body -->
          <nav>
            {{$categories->links()}}
          </nav>
          <!-- /.box -->
        </div>
      </div>
      <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection