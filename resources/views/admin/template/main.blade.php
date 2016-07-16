<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Default') | Panel de Administracion</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/navbar.css') }}">
</head>
<body>
    <div class="container">
        @include('admin.template.partials.nav')
        <div class="panel panel-default">
            <div class="panel-heading">@yield('title','Default')</div>
            <div class="panel-body">
                @include('flash::message')
                @yield('content')
            </div>
        </div>

        @include('admin.template.partials.footer')
    </div>
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
