@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Index habitaciones</div>
                    <div class="panel-body">

                        @if(count($habitacion)>0)
                        @foreach($habitacion as $habitacion)
                            <div class="well">
                               <div class="form-group">
                                   <label for="nombre">Nombre: </label>
                                   <label for="nombre">{{$habitacion->nombre}}</label>
                               </div>
                               <div class="form-group">
                                   <label for="tipo_habitacion">Tipo de Habitacion: </label>
                                   <label for="tipo_habitacion">{{$habitacion->tipo_habitacion}}</label>
                               </div>
                               <div class="form-group">
                                   <label for="maximo_personas">Maximo de personas: </label>
                                   <label for="maximo_personas">{{$habitacion->maximo_personas}}</label>
                               </div>
                               <div class="form-group">
                                   <label for="cant_habitaciones">Cantidad de Habitaciones: </label>
                                   <label for="cant_habitaciones">{{$habitacion->cant_habitaciones}}</label>
                               </div>
                               <div class="form-group">
                                   <label for="cant_habitaciones">Tarifa Normal:</label>
                                   <label for="cant_habitaciones">${{$habitacion->precio_estandar}} MXN</label>
                               </div>
                               <div class="form-group">
                                   <label for="descripcion_es">Descripcion: </label>
                                   <label for="descripcion_es">{{$habitacion->descripcion_es}}</label>
                               </div>
                                <div class="form-group">
                                    <a href="{{url('calendariohab/'.$habitacion->id)}}">Calendario</a>
                                    <a href="{{url('editarhabitacion/'.$habitacion->id)}}">Editar Información</a>
                                    <a href="{{url('eliminar/'.$habitacion->id)}}">Eliminar</a>
                                </div>
                            </div>
                        @endforeach
                        @endif
                          <a href="{{url('createhabitacion/'.$hotel->id)}}">Registrar Habitaciones</a>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
