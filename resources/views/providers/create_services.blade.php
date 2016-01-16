@extends('layout')
@section('css')
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Servicio</div>
                    <div class="panel-body">
                        <ul>
                            <a href="{{route('createhotel')}}">
                                <li>Crear Hotel</li>
                            </a><a href="{{route('createtour')}}">
                                <li>Crear Tour</li>
                            </a><a href="{{route('createtransport')}}">
                                <li>Crear transporte</li>
                            </a><a href="{{route('createservtur')}}">
                                <li>Crear Servicio Turistico</li>
                                <a href="{{URL::previous()}}">
                                    <li>Volver</li>
                                </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop