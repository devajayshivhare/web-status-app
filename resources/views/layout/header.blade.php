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
        body{
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;

        }

        /* .wrapper {
            flex: 1;
        } */

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }

        /* //// */
        .active>.page-link{
            background-color: #0B3D91
        }
        /* //// */

        /* Navbar Styling */
        .navbar {
            background-color: #0B3D91;
            /* Dark Blue */
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
            color: #FFC107;
            /* Gold Hover Effect */
        }

        /* Logout Button Styling */
        .logout-btn {
            background-color: #DC3545;
            /* Red */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 8px 15px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #B02A37;
            /* Darker Red on Hover */
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
            background-color: #1A56D0;
            /* Matching Blue */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 8px 15px;
            transition: 0.3s;
            border: none;
        }
        .excel-btn {
            /* background-color: #1A56D0; */
            /* Matching Blue */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 8px 15px;
            transition: 0.3s;
            border: none;
        }

        .new-site-btn:hover {
            background-color: #0A3D7A;
            /* Darker Blue on Hover */
        }
    </style>
</head>

<body>
    @auth
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">CMS</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @if (Auth()->user() && Auth()->user()->role === 'admin')
                                <li class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Role</a></li>
                            @endif

                        </ul>
                    </div>
                    <div class="d-flex" style="">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn logout-btn"
                                style="position: absolute; right: 20px; top: 25px;">
                                <i class="fas fa-power-off"></i>
                            </button>
                        </form>
                        @auth
                            <p class="fs-2 mb-1 text-white">
                                {{-- @dd(Auth()->user() && Auth()->user()->name) --}}
                                {{ Auth()->user()->name }}({{ Auth()->user()->role }})
                                <i class="bi bi-person-circle"></i>
                            </p>
                        @endauth
                    </div>
                </div>

            </nav>
        </header>

    @endauth
