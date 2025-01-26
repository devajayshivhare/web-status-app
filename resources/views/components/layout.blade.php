<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">

</head>
<body>
    @auth 
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">Site Monitoring Dashboard</a>
          {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-secondary">Log out</button>
        </form>
        </div>
      </nav>
    @endauth
   

    {{$slot}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
      // $(document).ready(function() {
      //     $('#example').DataTable();
      // });
//       new DataTable('#example', {
//     info: false,
//     ordering: false,
//     paging: false
// });
  </script>

<script>
  $(document).ready(function () {
      $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('users.log') }}',
          columns: [
            { data: 'id', name: 'id' },
            { data: 'checked_at', name: 'checked_at' },
            { data: 'status', name: 'status' },
              // { data: 'site_url', name: 'site_url' },
              // { data: 'phone', name: 'phone' },
              // { data: 'address', name: 'address' },
          ],
          dom: 'fBrtip', // Define where the buttons appear (B = Buttons)
          // dom: '<"row"<"col-md-6"B><"col-md-6"f>>rtip', // Define where the buttons appear (B = Buttons)
buttons: [
  {
      extend: 'excelHtml5',
      text: 'Export to Excel',
      className: 'btn btn-success'
  },
  // {
  //     extend: 'csvHtml5',
  //     text: 'Export to CSV',
  //     className: 'btn btn-primary'
  // },
  // {
  //     extend: 'print',
  //     text: 'Print',
  //     className: 'btn btn-info'
  // }
],
initComplete: function () {
        // Move the buttons to the custom div
        this.api().buttons().container().appendTo('#custom-buttons');
    }
      });
  });
</script>
</body>
</html>