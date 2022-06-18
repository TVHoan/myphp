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
    method="POST"
    action={{route('post.store')}}
   
      enctype="multipart/form-data">
        @csrf
     
  <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input  type="title" class="form-control" id="title" name="title" placeholder=" Post Title ">
          </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="Slug" class="form-label">Slug</label>
            <input type="slug"  class="form-control" id="Slug" name="slug" placeholder="/something">
          </div>
    </div>
    <div class="col">
        <div class="mb-3">
           
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image"/>

          </div>
    </div>
  
</div>
<div class="row" style="overflow: auto">
    <div class="col">
        <div class="mb-3">
            <label for="sumary" class="form-label">Sumary</label>
            <input  type="text" class="form-control" id="sumary" name="sumary" placeholder="Sumary">
          </div>
    </div>
    
</div>
<div class="row">
    <div class="col">
        <div class="mb-3">
            <select name="category_id" class="form-select"  aria-label="Category">
              
                <option selected>chose A Category</option>
              
                  @foreach($category as $cate)
                  <option value="{{$cate->id}}" >{{$cate->name}}</option>
                  @endforeach
              
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




  @endsection
  