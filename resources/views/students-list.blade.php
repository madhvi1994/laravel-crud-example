<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <title>Students Data</title>
</head>

<body>
   

    <div class="container">
        <a href="{{ url('/form') }}" class="btn btn-primary mt-4 mb-4">Add Students</a>
        <table class="table" id="table_listing">
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
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($students_data as $keys => $value)
                    <tr>
                        <th scope="row">{{ $keys + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->mobile }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->gender }}</td>
                        <!-- <td><img src="/uploads/{{ $value->image }}" height="100" width="100"></td> -->
                        <td><img src="{{ asset('/uploads/' . $value->image) }}" height="100" width="100"></td>
                        <td>{{ $value->status }}</td>
                        <td>{{ $value->language }}</td>

                        <td><a href="{{ url('edit') }}/{{ $value->id }}" class="btn btn-success">Update</a></td>

                        <td>
                            <a class="btn btn-danger" onclick="return myFunction();"
                                href="{{ url('delete', $value->id) }}"><i class="fa fa-trash">Delete</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <div class="d-flex justify-content-center">
      {!! $students_data->links() !!}
  </div>

    <style>
        .containor {
            margin-top: 10px;
            width: 40px;
            margin-left: 150px;
        }

        .form-control {

            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 8px;
            background-color: transparent;
            margin-left: 1100px;
            margin-top: 60px;
            width: 300px;

        }
    </style>

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- datatable js -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        function myFunction() {
            if (!confirm("Are You Sure to Delete this item"))
                event.preventDefault();
        }

        $(document).ready(function() {
            $('#table_listing').DataTable();
        });
    </script>
</body>

</html>
