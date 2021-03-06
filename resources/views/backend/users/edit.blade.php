@extends('layouts.backend.main')
@section('title','MyBlog | Edit User')
@section('content')
<div class="container-fluid p-4">
  <!-- Content Header (Page header) -->
  <section class="content-header" style="overflow:auto">
    <h1 class="float-left font-weight-bold " style="color:#1d68a7;">
      <i class="lni-user"></i> Edit User...
    </h1>
    {{-- create tag --}}
    <div class="create float-right py-2 mr-2">
      <a href="/dashboard/users">
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
          <!-- /.box-header -->
          <div class="box-body mt-5">
            <form method="POST" class="mt-2" action="/dashboard/users/{{$user->id}}">
              @csrf
              @method('PATCH')
              <div class="form-group row mb-4">
                <div class="col-md-6 m-auto">
                  <input id="name" type="text" class="form-control back-create @error('name') is-invalid @enderror"
                    name="name" value="{{ $user->name }}" required autocomplete="name" placeholder="Full Name.."
                    autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <div class="col-md-6 m-auto">
                  <input id="userName" type="text"
                    class="form-control back-create @error('userName') is-invalid @enderror" name="userName"
                    value="{{ $user->userName }}" placeholder="User Name.." required autocomplete="userName">
                  @if ($errors->has('userName'))
                  <span class="help-block">{{$errors->first('userName') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row mb-4">
                <div class="col-md-6 m-auto">
                  <input id="email" type="email" class="form-control back-create @error('email') is-invalid @enderror"
                    name="email" value="{{ $user->email }}" placeholder="Email Address.." required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <div class="col-md-6 m-auto">
                  <input id="password" type="password"
                    class="form-control back-create @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" placeholder="New Password..">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <div class="col-md-6 m-auto">
                  <input id="password-confirm" type="password" class="form-control back-create"
                    name="password_confirmation" placeholder="Confirm Password.." required autocomplete="new-password">
                </div>
              </div>
              <div class="form-group row mb-4">
                <div class="col-md-6 m-auto">
                  <select name="role_id" id="role_id"
                    class="form-control back-create {{$errors->has('role_id') ? 'has-error' : ''}}">
                    <option disabled selected>Choose Role</option>
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('role_id'))
                  <span class="help-block">{{$errors->first('role_id') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-4 m-auto offset-md-6">
                  <button type="submit" class="w-100 btn btn-success">
                    {{ __('Update') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
  </section>
</div>
@endsection