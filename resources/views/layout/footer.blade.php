@auth
<x-bot></x-bot>

    <footer class="bg-dark text-light py-4 footer">
        <div class="container">
            <div class="row">
                {{-- <!-- About Section -->
          <div class="col-md-4">
              <h5 class="text-uppercase fw-bold">About Us</h5>
              <p>
                  We provide cutting-edge solutions for your web and software needs, empowering your business with modern technology.
              </p>
          </div>

          <!-- Quick Links -->
          <div class="col-md-4">
              <h5 class="text-uppercase fw-bold">Quick Links</h5>
              <ul class="list-unstyled">
                  <li><a href="{{ url('/') }}" class="text-light text-decoration-none">Home</a></li>
                  <li><a href="{{ url('/about') }}" class="text-light text-decoration-none">About Us</a></li>
                  <li><a href="{{ url('/services') }}" class="text-light text-decoration-none">Services</a></li>
                  <li><a href="{{ url('/contact') }}" class="text-light text-decoration-none">Contact</a></li>
              </ul>
          </div>

          <!-- Contact Information -->
          <div class="col-md-4">
              <h5 class="text-uppercase fw-bold">Contact</h5>
              <ul class="list-unstyled">
                  <li><i class="bi bi-geo-alt-fill"></i> 123 Street, City, Country</li>
                  <li><i class="bi bi-telephone-fill"></i> +1 (123) 456-7890</li>
                  <li><i class="bi bi-envelope-fill"></i> info@example.com</li>
              </ul>
              <!-- Social Icons -->
              <div class="mt-3">
                  <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="text-light"><i class="bi bi-instagram"></i></a>
              </div>
          </div>
      </div> --}}

                <!-- Copyright Section -->
                <div class="text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} CMS. All Rights Reserved.</p>
                </div>
            </div>
    </footer>

@endauth
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
{{-- @vite(['resources/js/app.js'])   --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    // new DataTable('#example');
    // $(document).ready(function () {
    //       $('#example').DataTable({
    //           processing: true,
            //   serverSide: true,
            //   ajax: '{{ route('users.log') }}',
            //   columns: [
            //     { data: 'id', name: 'id' },
            //     { data: 'site_url', name: 'site_url' },
            //     { data: 'task_frequency', name: 'task_frequency' },
            //     { data: 'status', name: 'status', orderable: false, searchable: false },
            //     { data: 'checked_at', name: 'checked_at', orderable: false, searchable: false },
            // ],
    // buttons: [
    //   {
    //       extend: 'excelHtml5',
    //       text: 'Export to Excel',
    //       className: 'btn btn-success'
    //   },
    //   // {
    //   //     extend: 'csvHtml5',
    //   //     text: 'Export to CSV',
    //   //     className: 'btn btn-primary'
    //   // },
    //   // {
    //   //     extend: 'print',
    //   //     text: 'Print',
    //   //     className: 'btn btn-info'
    //   // }
    // ],
    // initComplete: function () {
    //         this.api().buttons().container().appendTo('#custom-buttons');
    //     }
        //   });
    //   });


</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    
        $('#exportExcel').click(function () {
            let table = document.getElementById('example');
            let data = [];
    
            for (let i = 0; i < table.rows.length; i++) {
                let row = [];
                for (let j = 0; j < table.rows[i].cells.length; j++) {
                    row.push(table.rows[i].cells[j].innerText);
                }
                data.push(row);
            }
    
            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet(data);
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    
            XLSX.writeFile(wb, "table_data.xlsx");
        });
    });
    </script>
</body>

</html>
