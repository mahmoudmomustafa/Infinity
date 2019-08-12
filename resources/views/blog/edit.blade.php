@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="content mb-3 content-post">
        <article class="post-item">
          <div class="user-edit p-4">
            <a href="/author/{{$author->userName}}" class="like">
              | Back
            </a>
          </div>
          <div class="p-4">
            <h2 class="p-4 font-weight-bold" style="color:#28cefe">
              Edit Profile :
            </h2>
            <ul class="w-100 post-meta-group userInfo ml-2">
              {{-- profile img --}}
              <li class="d-flex inf-list m-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">Profile Pic</h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post" enctype="multipart/form-data">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="file" class="form-control-file w-auto {{$errors->has('img') ? 'has-error' : ''}}"
                  name="img" placeholder="Profile Pic" value="{{$author->img}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('img'))
                  <span class="help-block">{{$errors->first('img') }}</span>
                  @endif
                </form>
              </li>
              {{-- Name --}}
              <li class="d-flex inf-list mx-4 mb-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">Full Name</h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="form-control {{$errors->has('name') ? 'has-error' : ''}}" name="name"
                      placeholder="Full Name" value="{{$author->name}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('name'))
                  <span class="help-block">{{$errors->first('name') }}</span>
                  @endif
                </form>
              </li>
              {{-- user --}}
              <li class="d-flex inf-list mx-4 mb-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">User Name </h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="form-control {{$errors->has('userName') ? 'has-error' : ''}}"
                      name="userName" placeholder="User Name" value="{{$author->userName}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('userName'))
                  <span class="help-block">{{$errors->first('userName') }}</span>
                  @endif
                </form>
              </li>
              {{-- email --}}
              <li class="d-flex inf-list mx-4 mb-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">Email </h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="email" class="form-control {{$errors->has('email') ? 'has-error' : ''}}" name="email"
                      placeholder="Email Address" value="{{$author->email}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('email'))
                  <span class="help-block">{{$errors->first('email') }}</span>
                  @endif
                </form>
              </li>
              {{-- Phone --}}
              <li class="d-flex inf-list mx-4 mb-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">Phone Number </h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="number" class="form-control {{$errors->has('number') ? 'has-error' : ''}}" name="number"
                      placeholder="Phone Number" value="{{$author->number}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('number'))
                  <span class="help-block">{{$errors->first('number') }}</span>
                  @endif
                </form>
              </li>
              {{-- edu --}}
              <li class="d-flex inf-list mx-4 mb-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">Eductaion </h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="form-control {{$errors->has('education') ? 'has-error' : ''}}"
                      name="education" placeholder="Education" value="{{$author->education}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('education'))
                  <span class="help-block">{{$errors->first('education') }}</span>
                  @endif
                </form>
              </li>
              {{-- brith --}}
              <li class="d-flex inf-list mx-4 mb-4">
                <h5 class="font-weight-bold pt-1 mr-2" style="width:100px;">BirthDay </h5>
                <form action="/author/{{$author->userName}}" class="w-100" method="post">
                  <div class="input-group mb-3">
                    @csrf
                    @method('PATCH')
                    <input type="date" class="form-control {{$errors->has('birth') ? 'has-error' : ''}}" name="birth"
                      placeholder="Birth Date" value="{{$author->birth}}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success">Update</button>
                    </div>
                  </div>
                  @if ($errors->has('birth'))
                  <span class="help-block">{{$errors->first('birth') }}</span>
                  @endif
                </form>
              </li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
@endsection