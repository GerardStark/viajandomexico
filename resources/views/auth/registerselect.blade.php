@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome!</div>
                    <div class="panel-body">
                        <h1>Panel de Registro</h1>
                        <p>Registrar Como:</p>
                       <ul class="list-inline">
                           <li><a href="{{route('registerprovider')}}">Proveedor</a></li>
                           <li><a href="{{route('registeruser')}}">Usuario</a></li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection