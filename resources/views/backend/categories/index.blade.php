@extends('layouts.backend.main')
@section('title','MyBlog | Categories')
@section('content')
<div class="container-fluid p-4">
  <!-- Content Header -->
  <section class="content-header" style="overflow:auto">
    <h1 class="float-left font-weight-bold " style="color:#1d68a7;">
      <i class="lni-slack"></i> Display Tags...
    </h1>
    {{-- create tag --}}
    <div class="create float-right py-2 mr-2">
      <a href="/dashboard/tags/create">
        <button class="btn btn-primary btn-add">
          Add<i class="ml-2 lni-plus"></i>
        </button>
      </a>
    </div>
  </section>
  <!-- Main content -->
  <section class="container  mt-4">
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
            <div class="table-responsive">
              <table class="table table-striped table-dark table-hover  table-bordered">
                <thead>
                  <tr class="font-weight-bold " style="color:#1d68a7;">
                    <td scope="col">Tags</td>
                    <td scope="col" width='90'>Post Count</td>
                    <td scope="col" width="100">Actions</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->title}}</td>
                    <td style="text-align:center;">{{$category->posts->count()}}</td>
                    <td style="display:flex;">
                      <a href="/dashboard/tags/{{$category->id}}/edit" class="mr-2 btn btn-xs btn-success">
                        <i class="fa fa-edit"></i>
                      </a>
                      <form action="/dashboard/tags/{{$category->id}}" method="post">
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
        </div>
      </div>
  </section>
</div>
@endsection