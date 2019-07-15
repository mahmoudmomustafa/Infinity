@extends('layouts.backend.main')
@section('title','MyBlog | Edit User')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User
      <small>Edit User</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <a href="/home">Dashboard</a>
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
            <form action="/backend/users/{{$user->id}}" method="POST">
              @method('patch')
              @csrf
              <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                @if ($errors->has('name'))
                <span class="help-block">{{$errors->first('name') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                @if ($errors->has('email'))
                <span class="help-block">{{$errors->first('email') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                <label for="password">email:</label>
                <input type="password" name="password" id="password" class="form-control" value="{{$user->password}}">
                @if ($errors->has('password'))
                <span class="help-block">{{$errors->first('password') }}</span>
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