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
            <form action="/backend/users" method="post">
              @csrf
              <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
                @if ($errors->has('name'))
                <span class="help-block">{{$errors->first('name') }}</span>
                @endif
              </div>
              <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" class="form-control">
                @if ($errors->has('email'))
                <span class="help-block">{{$errors->first('email') }}</span>
                @endif
              </div>
              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                  <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/backend/users" class="btn btn-info">Cancel</a>
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