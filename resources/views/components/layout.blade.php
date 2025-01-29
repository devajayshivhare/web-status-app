{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    <style>
        .nav-link {
            color: #000;
            text-decoration: none;
        }

        .nav-link.active {
            color: #fff;
            background-color: #011224;
            border-radius: 5px;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    @auth
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                @if (Auth()->user()->can('view dashboard'))
                    <a class="navbar-brand"> CMS PORTAL</a>
                    <ul class="nav">
                        <!-- Users Link -->
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                Users
                            </a>
                        </li>

                        <!-- Permissions Link -->
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                                class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                                Permissions
                            </a>
                        </li>

                        <!-- Roles Link -->
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                Roles
                            </a>
                        </li>
                    </ul>
                @else
                    <a class="navbar-brand"> Site Monitoring Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="post">
                    {{ Auth()->user()->name }}
                    @csrf
                    <button type="submit" class="btn btn-secondary">Log out</button>
                </form>
            </div>
        </nav>
    @endauth
    @guest
        <h1 class="fs-2 text-center bg-dark-subtle">WEB STATUS APP</h1>
    @endguest

    {{ $slot }}

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.log') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'checked_at',
                        name: 'checked_at'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                ],
                buttons: [{
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
                initComplete: function() {
                    this.api().buttons().container().appendTo('#custom-buttons');
                }
            });
        });
    </script>
</body>

</html> --}}
