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
                    <div class="panel-heading">Crear Ruta</div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <form role="form" method="POST" action="{{ route('registerruta') }}" files="true">
                                <div class="panel panel-default">

                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Generales de la Ruta
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="" for="owner">{{ Auth::user()->id}}</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="owner" value="{!! Auth::user()->id !!}">
                                                <input type="hidden" name="id_transporte" value="{!! $transporte->id !!}">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre_ruta">Nombre de la Ruta</label>
                                                <input class="form-control" type="text" placeholder="nombre de la Ruta" name="nombre_ruta">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion">descripcion</label>
                                                <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ old('descripcion')}} </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="duracion">Duracion del recorrido</label>
                                                <input type="number" class="form-control" placeholder="duracion" name="duracion">
                                            </div>

                                            <div class="form-group">
                                                <label for="hora_inicio">Horario de Inicio</label>
                                                <input type="time" class="form-control" placeholder="horario inicio" name="horario_inicio">
                                            </div>

                                            <div class="form-group">
                                                <label for="min_pax">Horario de Finalizacion</label>
                                                <input type="time" class="form-control" placeholder="Horario de Finalizacion" name="horario_finaliza">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="precio_standard">Precio Rack</label>
                                                <input type="number" class="form-control" name="precio_standard" placeholder="Precio Rack">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Vehiculo
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="descripcion_vehiculo">Descripcion del Vehiculo</label>
                                                <textarea class="form-control" name="descripcion_vehiculo" id="descripcion_vehiculo" cols="10" rows="5" >{{ old('descripcion_vehiculo')}} </textarea>
                                            </div>
                                            <div class="form group">
                                                <label for="Tipo de Vehiculo">Tipo de vehiculo</label>
                                                <input type="text" class="form-control" placeholder="ej: camioneta, auto compacto, motocicleta, etc." name="tipo_vehiculo">
                                            </div>
                                            <div class="form group">
                                                <label for="capacidad">Capacidad Maxima de personas:</label>
                                                <input type="number" class="form-control" placeholder="Capacidad Maxima de personas" name="capacidad">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{--END AREA 1--}}
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Servicios que incluye
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="form-inline">
                                                @foreach($servicios as $servicio)
                                                    <div class="checkbox col-md-3">
                                                        <label>
                                                            {!!  Form::checkbox('servicios[]', $servicio->id, null, ['id' => 'servicios'.$servicio->id])  !!}
                                                            {!!$servicio->nombre  !!}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="servicios_cargo">servicios con cargo extra</label>
                                                <textarea class="form-control" name="servicios_cargo" id="servicios_cargo" cols="10" rows="5"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="servicios">Otros</label>
                                                <textarea class="form-control" name="servicios_sin" id="servicios_sin" cols="10" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--END AREA 3--}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Guardar</button>
                        </div>
                        </a><a href="{{URL::previous()}}">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
@section('scripts')

@stop
