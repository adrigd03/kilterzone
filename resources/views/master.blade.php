<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('partials.styles')
    @include('partials.scripts')
    @yield('styles')
    @yield('scripts')
</head>

<body>
    @include('partials.header')
        @yield('content')
    

</html>