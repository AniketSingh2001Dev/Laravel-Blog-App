<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>
        <link rel="stylesheet" href="{{ asset('assets/faicons/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    </head>

    <body>
        <nav class="navbar bg-dark navbar-dark">
            <div class="container">
                <span class="navbar-brand"><b class="fs-2">Laravel Blog App</b></span>
            </div>
        </nav>
        @yield('content')
        <script src="{{ asset('assets/jquery/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('CustomJS')
    </body>

</html>