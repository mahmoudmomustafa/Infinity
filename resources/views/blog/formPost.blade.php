@auth
{{-- form post --}}
<div class="content mb-3">
  <article class="post-item">
    <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
      Share Your Thought..
    </h5>
    <form action="/" method="post" class="form-post" enctype="multipart/form-data">
      @csrf
      {{-- if there is img select --}}
      {{-- <div class="img mb-2">
        <img src="/img/board.jpg" class="img-thumbnail">
      </div> --}}
      {{-- post description --}}
      <div class="form-group">
        <div class="col">
          {{-- post img --}}
          <div class="post-img">
            <label for="img-post" data-toggle="tooltip" data-placement="right" title="Upload Img"><img src="/img/image.svg" width="30"></label>
            <input type="file" name="image" id="img-post" style="display:none">
          </div>
          <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" name="description"
            placeholder="Write Post Description Here..." rows="2" style="min-height:100px;"></textarea>
          @if ($errors->has('description'))
          <span class="invalid-feedback">{{$errors->first('description') }}</span>
          @endif
        </div>
      </div>
      {{-- post category --}}
      <div class="form-group">
        <div class="col">
          <select name="category_id" id="category_id"
            class="form-control {{$errors->has('category_id') ? 'is-invalid' : ''}}">
            <option disabled selected>Choose Category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
          </select>
          @if ($errors->has('category_id'))
          <span class="invalid-feedback">{{$errors->first('category_id') }}</span>
          @endif
        </div>
      </div>
      <div class="tag-sidebar tags ml-3"></div>
      <div class="form-group">
        <div class="col-md-4 offset-md-8 py-2">
          <button class="w-100 shadow btn btn-primary" type="submit">Post</button>
        </div>
      </div>
    </form>
  </article>
</div>
@endauth