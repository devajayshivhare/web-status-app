<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css"> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

    {{-- @vite(['resources/css/app.css'])   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
         /* body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
        } */

        footer{
            position:absolute;
            bottom: 0;
            width: 100%;
        }
        /* Navbar Styling */
        .navbar {
            background-color: #0B3D91; /* Dark Blue */
            padding: 15px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: white;
            font-size: 16px;
            margin: 0 10px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #FFC107; /* Gold Hover Effect */
        }

        /* Logout Button Styling */
        .logout-btn {
            background-color: #DC3545; /* Red */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 8px 15px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #B02A37; /* Darker Red on Hover */
        }

        /* Mobile-Friendly */
        @media (max-width: 991px) {
            .navbar-nav {
                text-align: center;
            }
            .logout-btn {
                display: block;
                width: 100%;
                margin-top: 10px;
            }
        }

        .new-site-btn {
            background-color: #1A56D0; /* Matching Blue */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 8px 15px;
            transition: 0.3s;
            border: none;
        }

        .new-site-btn:hover {
            background-color: #0A3D7A; /* Darker Blue on Hover */
        }
    </style>
</head>
<body>
    <header>
         <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Left Side - Logo -->
                <a class="navbar-brand" href="#">CMS</a>
        
                <!-- Navbar Toggler for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Center Navigation Items -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        @if (Auth()->user()->role !== 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{url('/users')}}">Role</a></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown">
                                Services
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Service 1</a></li>
                                <li><a class="dropdown-item" href="#">Service 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                </div>
        <div class="d-flex" style="">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn logout-btn" style="position: absolute; right: 20px; top: 25px;">
                        <i class="fas fa-power-off"></i>
                    </button>
                </form>
                <p class="fs-2 mb-1 text-white">
                    {{Auth()->user()->name}}({{Auth()->user()->role}})
                    <i class="bi bi-person-circle"></i>
                </p>
            </div>
        </div>

        </nav>
    </header>