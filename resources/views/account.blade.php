@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi Cuenta</div>
                    <div class="panel-body">
                        @include('partials/success')
                        <ul>
                            <li><a href="{{ url('account/edit-profile') }}">Editar Perfil</a></li>
                            <li><a href="{{ url('account/password') }}">Cambiar Contraseña</a></li>
                            <li><a href="{{ url('account/verify/') }}">Verificar Cuenta</a></li>
                            <li><a href="{{ url('account/paymentmethods/') }}">Metodos de Pago/Cobro</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection