@extends('layouts.head_admin')
@section('content')
<div class="container">

    <form id="save-content-form"

    method="POST" 
    action={{route('category.update',[$category->id])}}
   
      enctype="multipart/form-data">
        @csrf
      @if (isset($category))
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
            <label for="title" class="form-label">Name</label>
            <input value="{{$category->name ?? ''}}" type="title" class="form-control" id="title" name="name" placeholder=" Post Title ">
          </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="Slug" class="form-label">Slug</label>
            <input value="{{$category->slug ?? ''}}" type="slug"  class="form-control" id="Slug" name="slug" placeholder="/something">
          </div>
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
  