<!DOCTYPE html>
<html>
<head>
<title>How to upload a file using jQuery AJAX in Laravel 8</title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style type="text/css">
.displaynone{
display: none;
}
</style>
</head>
<body>

<div class="container mt-5">
    <canvas id="myChart"></canvas>

    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Sobrenamoe</th>
                <th>Email</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

  <!-- Script -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
  var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

  $(document).ready(function(){
    $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('page.index) }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'gender', name: 'gender'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
  });
  </script>

</body>

</html>