<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<div class="form">
<h4>Students Form</h4>
<form action="{{url('/update')}}/{{$students_data->id}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$students_data->name}}" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Edit name">
    @if ($errors->has('name'))
    <span class="invalid feedback" role="alert">
      <strong>{{ $errors->first('name') }}.</strong>
    </span>
    @endif
  </div>
  <div class="form-group">
    <label">Email</label>
      <input type="email" name="email" value="{{$students_data->email}}" class="form-control" id="email" placeholder=" Edit email">
      @if ($errors->has('email'))
      <span class="invalid feedback" role="alert">
        <strong>{{ $errors->first('email') }}.</strong>
      </span>
      @endif
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="number" name="mobile" value="{{$students_data->mobile}}" class="form-control" id="mobile" placeholder=" Edit mobile">
    @if ($errors->has('mobile'))
    <span class="invalid feedback" role="alert">
      <strong>{{ $errors->first('mobile') }}.</strong>
    </span>
    @endif
  </div>

  <div class="form-group">
    <label>Address</label>
    <textarea class="form-control" id="address" value="{{$students_data->address}}" rows="3" name="address">{{$students_data->address}}</textarea>
    @if ($errors->has('address'))
    <span class="invalid feedback" role="alert">
      <strong>{{ $errors->first('address') }}.</strong>
    </span>
    @endif
  </div>
   
   <div class="form-group">
    <label>Gender</label>
    <input type="radio" name="gender" value="male" {{ $students_data->gender == 'Male' ? 'checked' : ''}}> Male
    <input type="radio" name="gender" value="female" {{ $students_data->gender == 'female' ? 'checked' : ''}}> Female
    @if ($errors->has('gender'))
    <span class="invalid feedback" role="alert">
      <strong>{{ $errors->first('gender') }}.</strong>
    </span>
    @endif
  </div>
  </lable>
  
  <div class="form-group">
  <label>Image</label>
  <img src="{{asset('/uploads/'.$students_data->image)}}" width="100" height="100">
    <input type="file" name="image">
   
</lable>
  </div>
<br>
  <div class="form-group">
    <label>Status</label>
    <select name="status" id="status">
      <option value="">Select Stundet Status</option>
      <option value="Active" {{ $students_data->status == 'Active' ? 'selected' : '' }}>Active</option>
      <option value="INActive"{{ $students_data->status == 'INActive' ? 'selected' : '' }}>INActive</option>
  </select>
   </div>

<br>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <br>
  <button type="submit" value="submit" class="btn btn-primary">Update</button>
</form>

<style>
  .form{
     width:350px;
     margin-left:200px;
     margin-top:50px;
  }
</style>

</body>

</html>