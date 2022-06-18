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
    action={{route('category.store')}}
      enctype="multipart/form-data">
        @csrf
  <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input  type="title" class="form-control" id="title" name="name" placeholder=" Post Title ">
          </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="Slug" class="form-label">Slug</label>
            <input  type="slug"  class="form-control" id="Slug" name="slug" placeholder="/something">
          </div>
    </div>



  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
    </form>
</div>



  @endsection
  