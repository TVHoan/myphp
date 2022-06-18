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
    action={{route('profile.store')}}
   
      enctype="multipart/form-data">
        @csrf
     
  <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="Fullname" class="form-label">Fullname</label>
            <input  type="text" class="form-control" id="Fullname" name="fullname" placeholder=" Post Title ">
          </div>
    </div>
    <div class="col-md-6">
      <div class=" mb-3">
        <label for="dob" class="form-label">Birthday</label>
        <input type="text" id="dob" class="datepicker form-control" placeholder="18-12-1997" name="dob">

     </div>
  </div>
  <script>
    $(document).ready(function(){

$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    toggleActive: true
});

});
  </script>

  
</div>
<div class="row">
    <div class="col-md-3">
        <div class="mb-3">
            <label for="job" class="form-label">Job</label>
            <input  type="text" class="form-control" id="job" name="job" placeholder="job">
          </div>
    </div>
    

    <div class="col-md-3">
        <div class="mb-3">
          <label for="Country" class="form-label">Country</label>
            <select name="country_id" id="Country" class="form-select"  aria-label="Country">
              
                <option selected>chose A Country</option>
                @if(isset($countries))
                  @foreach($countries as $country)
                  <option value="{{$country->id}}" >{{$country->name}}</option>
                  @endforeach
                @endif
              </select>
          </div>
    </div>
    <div class="col-md-3">
          <div class="mb-3">
            <label for="School" class="form-label">School</label>
            <input  type="text" class="form-control" id="School" name="school" placeholder="School">
          </div>
    </div>
    <div class="col">
          <div class="mb-3">
            <label for="Contacts" class="form-label">Contacts</label>
            <input  type="text" class="form-control" id="Contacts" name="contact" placeholder="Contact">
          </div>
    </div>
         </div>   
<div class="row">
<div class="mb-3">
    <label for="Desciption" class="form-label">Desciption</label>
    <textarea  class="form-control" id="Desciption" name="des" rows="3"></textarea>
  </div>
</div>
  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
    </form>
</div>




@endsection
  