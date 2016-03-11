<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Viajando Mexico</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/overwritecss.css') }}" type="text/css">
    @yield('css')
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img src="{{asset('img/login/logogris.png')}}" alt="Viajando Mexico Logotipo" class="img-responsive"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li><a href="{{route('controlpanel')}}">Home</a></li>--}}
                @if (Auth::check())
                    @if(Auth::guest())
                    @elseif(Auth::user()->role == 'provider')

                        {{--<li><a href="{{route('createnewservice')}}">Nuevo Servicio</a></li>--}}

                    @elseif(Auth::user()->role == 'admin')
                        <li><a href="{{route('mis_servicios')}}">Asdasd</a></li>
                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right user-options">
                @if (Auth::guest())
                    {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                    {{--<li><a href="{{ route('registernew') }}">Register</a></li>--}}
                @else
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="http://placehold.it/50x50/" alt="">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('mis_servicios')}}">Mis servicios</a></li>
                            <li><a href="{{ url('account/edit-profile') }}" data-toggle="modal" data-target="#myModal">Editar Perfil</a></li>
                            <li><a href="{{ url('account/password') }}" data-toggle="modal" data-target="#myModal">Cambiar Contraseña</a></li>
                            <li><a href="{{ url('account/verify/') }}" data-toggle="modal" data-target="#myModal">Verificar Cuenta</a></li>
                            <li><a href="{{ url('account/paymentmethods/') }}" data-toggle="modal" data-target="#myModal">Metodos de Pago/Cobro</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')

@yield('scripts')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
<script>
    $('body').on('hidden.bs.modal', '#myModal', function () {
        $(this).removeData('bs.modal');
    });
</script>
</body>
</html>