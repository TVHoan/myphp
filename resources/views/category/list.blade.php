@extends('layouts.head_admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <button type="button" onclick="location.href='{{route('category.create')}}'" class="btn btn-primary">New Category</button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($category as $item)
                        <tr onclick="location.href='{{route('category.show',[$item->id])}}'">
                            <th>{{$item->name}}</th>
                            <th>{{$item->slug}}</th>
                            <th> <button onclick="location.href='{{route('category.edit',[$item->id])}}'" class="btn btn-primary" type="submit">Edit</button></th>
                            <th> <form method="POST" action="{{route('category.destroy',[$item->id])}}">
                                @csrf
                                <button   class="btn btn-primary" type="submit">Delete</button>@method('delete')</form></th>
                        </tr>
                        @endforeach
   
                    </tfoot>
                   
                </table>
                {{ $category->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</div>

<script>$(document).ready(function(){
    $("#delete").click(function(){
        
      $(".modal").show();
      var value = $this.val();
      $('#form_delete').attr('action', value);

    });
  });
  $(document).ready(function(){
    $("#close").click(function(){
      $("#modaldelete").hide();
    });
  });
   </script>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form  action="" method="POST">
        @csrf
        @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
            
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-primary">delete</button>
          <button type="button" id="close" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  
   
    
@endsection