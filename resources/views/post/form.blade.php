@extends('layouts.head_admin')
@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form id="save-content-form"
    @if (isset($post))
    method="POST" 
    action={{route('post.update',[$post->id])}}
   
     
    @else
    method="POST"
    action={{route('post.store')}}
    @endif
      enctype="multipart/form-data">
        @csrf
      @if (isset($post))
       @method('PUT')
       @endif
  <div class="row">
    <div class="col">
        <div class="mb-3">@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <label for="title" class="form-label">title</label>
            <input value="{{$post->title ?? ''}}" type="title" class="form-control" id="title" name="title" placeholder=" Post Title ">
          </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="Slug" class="form-label">Slug</label>
            <input value="{{$post->slug ?? ''}}" type="slug"  class="form-control" id="Slug" name="slug" placeholder="/something">
          </div>
    </div>
    <div class="col">
        <div class="mb-3">
            @if (isset($post->image))
                <img id="image_show" src="{{asset('storage/'.$post->image)}}" style="max-height:200px; width:auto;"/>
                <input class="form-control" type="file" id="image" name="image"  value="{{asset('storage/'.$post->image)}}"/>
            @else
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image"/>
            @endif

          </div>
    </div>
  
</div>
<div class="row" style="overflow: auto">
    <div class="col">
        <div class="mb-3">
            <label for="sumary" class="form-label">Sumary</label>
            <input value="{{$post->slug ?? ''}}" type="text" class="form-control" id="sumary" name="sumary" placeholder="Sumary">
          </div>
    </div>
    
</div>
<div class="row">
    <div class="col">
        <div class="mb-3">
            <select name="category_id" class="form-select"  aria-label="Category">
              @if(isset($post))
                <option value="{{$post->category->id}}" selected>{{$post->category->name}}</option>
                @foreach($category as $cate)
                @if($cate->id==$post->category->id)
                @continue
                @endif
                <option value="{{$cate->id}}" >{{$cate->name}}</option>
                @endforeach
              @else
                <option selected>chose A Category</option>
                @foreach($category as $cate)
                <option value="{{$cate->id}}" >{{$cate->name}}</option>
                @endforeach
              @endif
              </select>
          </div>
    </div>   
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">content</label>
    <textarea  class="form-control" id="content" name="content" rows="3">{{$post->content ?? ''}}</textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
    </form>
</div>
<script>var file_browser = document.querySelector('#image');
  var img_preview2 = document.querySelector('#image_show');
  file_browser.addEventListener('change',()=>{
    var reader = new FileReader();
    reader.onload = function(e) {
      img_preview2.src = e.target.result
    }
    reader.readAsDataURL(document.querySelector('#image').files[0]);
  })</script>

<script>
  tinymce.init({
    selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>

  @endsection
  