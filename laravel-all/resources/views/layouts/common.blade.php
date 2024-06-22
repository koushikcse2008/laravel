<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ config('app.name', 'Laravel 8') }}</title> --}}
    <title>@yield('title', 'Laravel 8 with Practical Codes')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    @include('layouts.head')
    <style>
        path { height: 25px !important; width: 25px !important; }
    </style>
    <link rel="stylesheet" href="{{ asset("frontend/css/custom.css") }}">
</head>
<body>
    @include('layouts.header')

    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-2 bg-secondary rounded">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-10 p-4 rounded bg-light" style="overflow-x: scroll;">
                @yield('content')
            </div>        
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>