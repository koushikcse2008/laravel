<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel 8') }}</title>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')

    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-8">
                @yield('content')
            </div>        
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>