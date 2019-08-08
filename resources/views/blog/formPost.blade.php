@auth
{{-- form post --}}
<div class="content mb-3">
  <article class="post-item">
    <h5 class="p-4 font-weight-bold " style="color:#1d68a7;padding-bottom:.5rem !important;">
      Share Your Thought..
    </h5>
    <form action="/" method="post">
      @csrf
      {{-- post title --}}
      <div class="form-group">
        <div class="col">
          <input class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" type="text" name="title"
            placeholder="Post Title...">
          @if ($errors->has('title'))
          <div class="invalid-feedback">{{$errors->first('title') }}</div>
          @endif
        </div>
      </div>
      {{-- post description --}}
      <div class="form-group">
        <div class="col">
          <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" name="description"
            placeholder="Write Post Description Here..." rows="2"></textarea>
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