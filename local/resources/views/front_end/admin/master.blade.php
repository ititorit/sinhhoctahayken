<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/metisMenu.min.css">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link rel="stylesheet" href="css/morris.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu:hover {
            display: block;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 75%;
            margin-top: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid black;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container-modify {
            padding: 20px;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div id="wrapper">
            <div class="row">
            <!-- Nagivation -->
            @include ('front_end.admin.nav')
            <!-- /.Nagivation -->
            </div>
        </div>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header clearfix">
                        <span class="fa fa-wrench"></span> @yield('header-admin-home')
                    </h1>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/morris-data.js"></script>
    <script src="js/sb-admin-2.js"></script>
    @yield('script')
</body>
</html>