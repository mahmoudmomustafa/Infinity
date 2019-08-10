{{-- authors info --}}
<div class="content mb-3 content-post">
  <article class="post-item">
    @if($author->id == Auth::user()->id)
    <div class="user-edit p-4">
      <a href="/author/{{$author->userName}}/edit" class="like">
        | Edit
      </a>
    </div>
    @endif
    <div class="p-4">
      <h2 class="p-4 font-weight-bold" style="color:#28cefe">
        General Infroamtion :
      </h2>
      <ul class="w-100 post-meta-group userInfo ml-4">
        <li class="d-flex">
          <div class="pic">
            <img src="/storage/users/{{$author->img}}" width="100">
          </div>
          <div class="name p-3">
            <h4 class="font-weight-bold mt-4" style="color:#1d68a7;">{{$author->name}}</h4>
            <span>Joined: {{$author->date}}</span>
          </div>
        </li>
        <li class="d-flex inf-list m-4">
          <h5 class="font-weight-bold pt-1">User Name:</h5>
          <h4 class="font-weight-bold px-2" style="color:#1d68a7;">{{$author->userName}}</h4>
        </li>
        <li class="d-flex inf-list mx-4 mb-4">
          <h5 class="font-weight-bold pt-1">Email:</h5>
          <h4 class="font-weight-bold px-2" style="color:#1d68a7;">{{$author->email}}</h4>
        </li>
        <li class="d-flex inf-list mx-4 mb-4">
          <h5 class="font-weight-bold pt-1">Phone Number:</h5>
          <h4 class="font-weight-bold px-2" style="color:#1d68a7;">{{$author->number}}</h4>
        </li>
        <li class="d-flex inf-list mx-4 mb-4">
          <h5 class="font-weight-bold pt-1">Eductaion:</h5>
          <h4 class="font-weight-bold px-2" style="color:#1d68a7;">{{$author->education}}</h4>
        </li>
        <li class="d-flex inf-list mx-4 mb-4">
          <h5 class="font-weight-bold pt-1">BirthDay:</h5>
          <h4 class="font-weight-bold px-2" style="color:#1d68a7;">{{$author->birth}}</h4>
        </li>
      </ul>
    </div>
  </article>
</div>