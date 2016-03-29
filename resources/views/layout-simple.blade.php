<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
    <title>Viajando Mexico</title>

</head>
<body>
<!-- Modal -->
@yield('content')

@yield('scripts')
</body>
</html>