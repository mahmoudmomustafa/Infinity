@extends('layouts.backend.main')
@section('title','MyBlog | Users')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Users
      <small>Display all Users</small>
      <b>
        <a href="/backend/users/create" class="btn btn-primary">
          Add new User
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
        <a href="/backend/users">Users</a>
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
            @if (!$users->count())
            <div class="alert alert-danger">
              <strong>No record</strong>
            </div>
            @else
            <table class="table taable-bordered">
              <thead>
                <tr>
                  <td>Actions</td>
                  <td>Name</td>
                  <td>Mail</td>
                  <td>Post Count</td>
                  <td>Role</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td width='80'>
                    <a href="/backend/users/{{$user->id}}/edit" class="btn btn-xs btn-success">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="/backend/users/{{$user->id}}" method="post">
                      @method('DELETE')
                      @csrf
                      @if($user->id == config('cms.default_user'))
                      <button type="submit" class="btn btn-xs btn-danger" disabled>
                        <i class="fa fa-times"></i>
                      </button>
                      @else
                      <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                      </button>
                      @endif
                    </form>
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->posts->count()}}</td>
                  <td>{{$user->posts->count()}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
          <!-- /.box-body -->
          <nav>
            {{-- {{$user->links()}} --}}
          </nav>
          <!-- /.box -->
        </div>
      </div>
      <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection