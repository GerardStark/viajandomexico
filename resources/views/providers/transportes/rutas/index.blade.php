@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Rutas del Transporte {{$transporte->name}}</div>
                    <div class="panel-body">
                        <p><a href="{{url('crearruta/'.$transporte->id)}}">Crear Ruta</a></p>
                        @foreach($rutas as $ruta)
                            <div class="well">
                                <div class="form-group">
                                    <label for="id_hotels">ID de la Ruta</label>
                                    <label for="id_hotel"> {{$ruta->id}}</label>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_hotel">Nombre de la Ruta</label>
                                    <label for="nombre">{{$ruta->nombre}}</label>
                                </div>
                                <div class="form-group">
                                    <ul>
                                        <li><a href="{{url('editarruta/'.$ruta->id)}}">Editar Info</a></li>
                                        <li><a href="{{url('costosruta/'.$ruta->id)}}">Costos</a></li>
                                        <li><a href="{{url('eliminarruta/'.$ruta->id)}}">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection