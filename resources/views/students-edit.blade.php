<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
        .div1 {
            margin-top: 80px;
            width: 800px;
            margin-left: 200px;
        }
    </style>

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

 <div class="form">
  <h4>Students Edit Form</h4>
    <form action="{{ url('/update') }}/{{ $students_data->id }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
       <div class="col-md-6 mb-3">
      <label for="validationDefault01">Name</label>
        <input type="text" name="name" class="form-control" id="name"
          value="{{ $students_data->name }}" required aria-describedby="emailHelp"
          placeholder="Enter name" checked required onkeypress="return onlyCharacterKey(event)"
            autocomplete="name" autofocus>
      @if ($errors->has('name'))
          <span class="alert alert-danger" role="alert">
           {{ $errors->first('name') }}
      </span>
       @endif
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Email</label>
         <input type="email" name="email" class="form-control" value="{{ $students_data->email }}"
            id="email" placeholder=" Enter email">
          @if ($errors->has('email'))
            <span class="alert alert-danger" role="alert">
           {{ $errors->first('email') }}
            </span>
         @endif
          </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationDefaultUsername">Mobile no</label>
                        <div class="input-group">
                            <input type="number" name="mobile" class="form-control" id="mobile"
                                placeholder="Enter mobile no" value="{{ $students_data->mobile }}">
                                @if ($errors->has('mobile'))
                                <span class="alert alert-danger" role="alert">
                                  {{ $errors->first('mobile') }}
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Status</label>
                        <select id="inputState" name="status" class="form-control">
                            <option selected>select Status</option>
                            <option value="Active" {{ $students_data->status == 'Active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="INActive" {{ $students_data->status == 'INActive' ? 'selected' : '' }}>
                                INActive</option>
                            @if ($errors->has('status'))
                                <span class="alert alert-danger" role="alert">
                                    {{ $errors->first('status') }}
                                </span>
                            @endif
                        </select>
                    </div>
                    

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault03">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address" value="{{ old('address') }}"
                                placeholder="Enter address">{{ $students_data->address }}</textarea>
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
                           <input type="radio" name="gender" value="male"
                                {{ $students_data->gender == 'Male' ? 'checked' : '' }}> 
                     <label class="form-check-label" for="inlineRadio1">Male</label>     
                         </div>    
                         <div class="form-check form-check-inline">
                            <input type="radio" name="gender" value="female"
                                {{ $students_data->gender == 'female' ? 'checked' : '' }} checked> 
                                <label class="form-check-label" for="inlineRadio1">Female</label>
                            @if ($errors->has('gender'))
                                <span class="alert alert-danger" role="alert">
                                    {{ $errors->first('gender') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    @php
                        $items = json_decode($students_data->language);
                    @endphp

                    <div class="col-md-6 mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" name="language[]" id="CakePHP"
                                    value="CakePHP"
                                    {{ isset($items) && !empty($items) && in_array('CakePHP', $items) ? 'checked' : '' }}
                                    @if (old('CakePHP', false)) checked @endif aria-label="...">
                                <label class="form-check-label" for="inlineCheckbox1">CakePHP</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" name="language[]" id="Laravel"
                                    value="Laravel"
                                    {{ isset($items) && !empty($items) && in_array('Laravel', $items) ? 'checked' : '' }}
                                    @if (old('Laravel', false)) checked @endif aria-label="...">
                                <label class="form-check-label" for="inlineCheckbox1">Laravel</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <input class="form-check-input" type="checkbox" name="language[]" id="Codeignatior"
                                value="Codeignatior"
                                {{ isset($items) && !empty($items) && in_array('Codeignatior', $items) ? 'checked' : '' }}
                                @if (old('Codeignatior', false)) checked @endif aria-label="...">
                            <label class="form-check-label" for="inlineCheckbox1">Codeignatior</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3" class="form-check form-check-inline">
                    <label for="formFile" class="form-label">Default file input example</label>
                        <img src="{{ asset('/uploads/' . $students_data->image) }}" width="100" height="100">
                        <input type="file" name="image">

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
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ url('/index') }}" class="btn btn-primary" type="submit">Back</a>
            </form>
        </div>
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
