@extends('layout')
@section('css')
    {!! Html::style('css/bootstrap-datepicker.css') !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Habitaciones</div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <form role="form" method="POST" action="{{ url('updatehabitacion/'.$habitacion->id) }}" files="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Generales de las Habitaciones
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="" for="owner">ID de Usuario: {!! Auth::user()->id !!}</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="id_hotel" value="{{ $hotel->id }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Nombre Habitacion</label>
                                                <input class="form-control" type="text" placeholder="nombre" name="nombre" value="{{ $habitacion -> nombre }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="tipo_habitacion">Tipo de Habitacion</label>
                                                <select name="tipo_habitacion" id="tipo_habitacion">
                                                    <option value="{{$habitacion -> tipo_habitacion}}">{{ $habitacion -> tipo_habitacion }}</option>
                                                    <option value="sencillas">sencillas</option>
                                                    <option value="dobles">dobles</option>
                                                    <option value="triples">triples</option>
                                                    <option value="matrimoniales">matrimoniales</option>
                                                    <option value="Tipo estudio">Tipo estudio</option>
                                                    <option value="Tipo corner suite">Tipo corner suite</option>
                                                    <option value="ipo suite junior">Tipo suite junior</option>
                                                    <option value="Tipo suite doble">Tipo suite doble</option>
                                                    <option value="Tipo suite presidencial">Tipo suite presidencial</option>
                                                    <option value="caba�as">caba�as</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="maximo_personas">Maximo de personas por habitacion</label>
                                                <input class="form-control" type="text" placeholder="maximo personas" name="maximo_personas" value="{{ $habitacion -> maximo_personas }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="cant_habitaciones">Cantidad de Habitaciones disponibles</label>
                                                <input class="form-control" type="text" placeholder="cantidad de habitaciones" name="cant_habitaciones" value="{{ $habitacion -> cant_habitaciones }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="precio_estandar">Precio Estandar(rack)</label>
                                                <input class="form-control" type="text" placeholder="Precio normal manejado" name="precio_estandar" value="{{ $habitacion -> precio_estandar }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion_es">descripcion</label>
                                                <textarea class="form-control" name="descripcion_es" id="descripcion_es" cols="10" rows="5" >{{$habitacion -> descripcion_es}} </textarea>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Amenidades de la Habitacion
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <div class="form-inline">
                                                            @foreach($amenidadeshabitacion as $amenidad)
                                                                @if($amenidad->activo === 1)

                                                                    <div class="checkbox col-md-3">
                                                                        <label>
                                                                            {!!  Form::checkbox('amenidades[]', $amenidad->id, null, ['id' => 'amenidad'.$amenidad->id, 'checked'])  !!}
                                                                            {!!$amenidad->info->nombre  !!}
                                                                        </label>
                                                                    </div>
                                                                @else
                                                                    <div class="checkbox col-md-3">
                                                                        <label>
                                                                            {!!  Form::checkbox('amenidades[]', $amenidad->id, null, ['id' => 'amenidad'.$amenidad->id])  !!}
                                                                            {!!$amenidad->info->nombre  !!}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Guardar</button>
                                            </div>
                                            </a><a href="{{URL::previous()}}">Volver</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
