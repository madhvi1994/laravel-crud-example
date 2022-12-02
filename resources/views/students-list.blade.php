<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Students Data</title>
  </head>
  <body>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 


<div class="containor">
<table class="table">
  <thead>
    <tr>
      <th scope="col">sr no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">language</th>
      <th scope="col">Operation</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($students_data as $keys=>$value)
    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->mobile}}</td>
      <td>{{$value->address}}</td>
      <td>{{$value->gender}}</td>
      <!-- <td><img src="/uploads/{{$value->image}}" height="100" width="100"></td> -->
      <td><img src="{{asset('/uploads/'.$value->image)}}" height="100" width="100"></td>
       <td>{{$value->status}}</td>
       <td>{{$value->language}}</td>

      <td><a href="{{url('edit')}}/{{$value->id}}" class="btn btn-success">Update</a></td>

      <td><a href="{{url('delete')}}/{{$value->id}}" class="btn btn-danger">Delete</a></td>
    </tr>
   @endforeach

   <a href="{{url('/form')}}" class="btn btn-primary">Add Students</a>
   
  </tbody>
</table>


</div>

<style>

.containor
{
    margin-top:50px;
    width:40px;
    margin-left:150px;
   
 
   
}

</style>

</body>
</html>