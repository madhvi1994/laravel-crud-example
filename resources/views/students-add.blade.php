<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Students Module</title>

  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
      .div1
      {
        margin-top:80px;
        width:800px;
        margin-left:200px;
      }
      
  
  </style>
    
</head>

<body>

  
  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  


  <div class="div1">
  <form action="{{url('/insert')}}" method="post" enctype="multipart/form-data">
  @csrf

  <h4>Students Head Form</h4>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Name</label>
      <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}"required aria-describedby="emailHelp" placeholder="Enter name" checked required onkeypress="return onlyCharacterKey(event)" autocomplete="name" autofocus>
      @if ($errors->has('name'))
     <span class="alert alert-danger" role="alert">
       {{ $errors->first('name') }}
     </span>
     @endif
    </div>

    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Email</label>
     <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" placeholder=" Enter email">
     @if ($errors->has('email'))
       <span class="alert alert-danger" role="alert">
         {{ $errors->first('email') }}
       </span>
       @endif
    </div>

    

    <div class="col-md-6 mb-3">
      <label for="validationDefaultUsername">Mobile no</label>
      <div class="input-group">
        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile no" value="{{old('mobile')}}">
       </div>
      @if ($errors->has('mobile'))
      <span class="alert alert-danger" role="alert">
        {{ $errors->first('mobile') }}
      </span>
      @endif
    </div>

    <div class="form-group col-md-4">
      <label for="validationDefaultUsername">Status</label>
      <select id="inputState" name="status" class="form-control">
        <option >select Status</option>
        <option value="Active"  {{ (old('status') == 'Active') ? 'selected' : '' }}>Active</option>
     <option value="INActive" {{ (old('status') == 'INActive') ? 'selected' : '' }}>INActive</option>
    </select>
    @if ($errors->has('status'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('status') }}</strong>
    </span>
  @endif
    </div>

     <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Address</label>
      <textarea class="form-control" id="address" rows="3" name="address"  placeholder="Enter address">{{old('address')}}</textarea>
      @if ($errors->has('address'))
     <span class="alert alert-danger" role="alert">
       {{ $errors->first('address') }}
     </span>
     @endif
    </div>
    
   
    
    <div class="form-check form-check-inline">
     <label class="form-check-label" for="inlineRadio2">Gender</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="Male"  {{ (old('gender') == 'Male') ? 'checked' : '' }} >
      <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="Female" {{ (old('gender') == 'Female') ? 'checked' : '' }} checked>
      <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    
   
     </div>

     

  @php
  $old = old();
  //dd('123456',$old);
  @endphp
    
    <div class="form-row">
    <div class="col-md-6 mb-3">
    <div class="col-md-4 mb-3">
      <div class="form-group">
     <input class="form-check-input" type="checkbox" name="language[]" id="CakePHP" value="CakePHP" aria-label="..."   {{ isset($old['language']) && !empty($old) && in_array('CakePHP', $old['language']) ? 'checked' : '' }} >
    <label class="form-check-label" for="inlineCheckbox1">CakePHP</label>
    </div>
    </div>
     <div class="col-md-4 mb-3">
    <div class="form-group">
    <input class="form-check-input" type="checkbox" name="language[]" id="Laravel" value="Laravel" aria-label="..."  {{ isset($old['language']) && !empty($old) && in_array('Laravel', $old['language']) ? 'checked' : '' }} >
    <label class="form-check-label" for="inlineCheckbox1">Laravel</label>
    </div>
    </div>

    <div class="col-md-4 mb-3">
   <input class="form-check-input" type="checkbox" name="language[]" id="Codeignatior" value="Codeignatior" aria-label="..."  {{ isset($old['language']) && !empty($old) && in_array('Codeignatior', $old['language']) ? 'checked' : '' }}>
   <label class="form-check-label" for="inlineCheckbox1">Codeignatior</label>
    </div>
   </div>


   <div class="col-md-6 mb-3" class="form-check form-check-inline">
    <label for="formFile" class="form-label">Default file input example</label>
    <input class="form-control" name="image" type="file" id="formFile">
  </div>
  
 </div>
  </div>

  <div class="form-group">
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>

  <a href="{{ url('/index') }}" class="btn btn-primary" type="submit">Back</a>
</form>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<script type="text/javascript">
$(document).ready(function() {
     $('select').language();
 });
 


 function onlyCharacterKey(event) {
   var ch = String.fromCharCode(event.keyCode);
   var filter = /[a-zA-Z ]/;
   if (!filter.test(ch)) {
     event.returnValue = false;
   }
 };

 

</script>
</body>

</html>