@extends('layout')
@section('css')
@stop
@section('content')
    {{--servicios turisticos--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('partials/success')
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-body ">
                        <div class="col-md-6">
                            <div class="col-md-12 col-md-offset-5">
                                <img src="{{asset('img/login/otratipa.png')}}" alt="otra tipa" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-md-offset-4 texto-tipa" id="texto-tipa">
                                <div class="col-md-9">
                                    <h2>Crear Algo</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quidem quos unde? Doloribus explicabo molestias recusandae repudiandae totam. Consequatur consequuntur delectus deleniti earum laborum minima minus nulla, obcaecati officiis!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 lista-crear col-md-pull-1">
                            <div class="col-md-12">
                                <div>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li id="hotel-btn" role="presentation"><a href="#hoteles" aria-controls="hoteles" role="tab" data-toggle="tab"><img src="{{asset('img/login/hoteles.png')}}" alt="hoteles" class="img-responsive img-select-efecto"></a></li>
                                        <li id="tour-btn" role="presentation"><a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"><img src="{{asset('img/login/tours.png')}}" alt="Tours" class="img-responsive img-select-efecto "></a></li>
                                        <li id="transport-btn" role="presentation"><a href="#transportes" aria-controls="transportes" role="tab" data-toggle="tab"><img src="{{asset('img/login/transport.png')}}" alt="Servicios Turisticos" class="img-responsive img-select-efecto "></a></li>
                                        <li id="" class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{asset('img/login/servtur.png')}}" alt="Transportes" class="img-responsive img-select-efecto "></a>
                                            <ul class="dropdown-menu">
                                                <li id="restaurant-btn" role="presentation"><a href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab"><img src="{{asset('img/login/restaurante.png')}}" alt="hoteles" class="img-responsive img-chica-redonda"></a></li>
                                                <li id="bar-btn" role="presentation"><a href="#bares" aria-controls="bares" role="tab" data-toggle="tab"><img src="{{asset('img/login/bar.png')}}" alt="hoteles" class="img-responsive img-chica-redonda"></a></li>
                                                <li id="spa-btn" role="presentation"><a href="#spas" aria-controls="spas" role="tab" data-toggle="tab"><img src="{{asset('img/login/spa.png')}}" alt="hoteles" class="img-responsive img-chica-redonda"></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 cambia-form text-center" id="cambia">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="hoteles">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="panel-body">
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <form role="form" method="POST" action="{{ route('registerhotel') }}" files="true">
                                                                    <div class="panel panel-default">

                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    Datos Generales del Hotel
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <label class="" for="owner">ID de Usuario: {!! Auth::user()->id !!}</label>
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <input type="hidden" name="owner" value="{!! Auth::user()->id !!}" readonly>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="nombre_hotel">Nombre Hotel</label>
                                                                                    <input class="form-control" type="text" placeholder="nombre del hotel" name="name" value="{{ old('username') }}">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="estrellas">Estrellas</label>
                                                                                    <div class="radio">
                                                                                        <label>
                                                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="1" >
                                                                                            1
                                                                                        </label>
                                                                                        <label>
                                                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="2" >
                                                                                            2
                                                                                        </label>
                                                                                        <label>
                                                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="3" >
                                                                                            3
                                                                                        </label>
                                                                                        <label>
                                                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="4" >
                                                                                            4
                                                                                        </label>
                                                                                        <label>
                                                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="5" >
                                                                                            5
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="descripcion">Descripcion</label>
                                                                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ old('descripcion')}} </textarea>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="">
                                                                                        Europeo
                                                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="noCheck" value="Europeo">
                                                                                    </label>
                                                                                    <label for="">
                                                                                        Todo Incluido
                                                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="noCheck" value="Todo Incluido">
                                                                                    </label>
                                                                                    <label for="">
                                                                                        Otro
                                                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="yesCheck" value="3">
                                                                                    </label>
                                                                                    <div id="ifYes" style="display:none">
                                                                                        Otro tipo de plan: <input type='text' id='yes' name='test'>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 1--}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                    Servicios Del Hotel
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                                                            <div class="panel-body">
                                                                                <div class="form-inline">
                                                                                    @foreach($servicios as $servicio)
                                                                                        <div class="checkbox col-md-6">
                                                                                            <label>
                                                                                                {!!  Form::checkbox('servicios[]', $servicio->id, null, ['id' => 'servicio'.$servicio->id])  !!}
                                                                                                {!!$servicio->nombre  !!}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="otros">Otros</label>
                                                                                    <textarea class="form-control" name="otros_serv" id="otros_serv" cols="10" rows="5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 2--}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingThree">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                                    Necesidades Especificas
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                                                            <div class="panel-body">
                                                                                <div class="form-inline">
                                                                                    @foreach($especiales as $especial)
                                                                                        <div class="checkbox col-md-6">
                                                                                            <label>
                                                                                                {!!  Form::checkbox('necesidades[]', $especial->id, null, ['id' => 'necesidad'.$especial->id])  !!}
                                                                                                {!!$especial->nombre  !!}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="otros">Otros</label>
                                                                                    <textarea class="form-control" name="otras_nececidades" id="otras_nececidades" cols="10" rows="5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 3 --}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingFour">
                                                                            <h4 class="panel-title">
                                                                                <a id="cargarmapaHotel" onclick="cargarmapahotel()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                                    Localizacion
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="">Estado:</label>
                                                                                <div class="">
                                                                                    <select name="pais" id="pais" class="form-control">
                                                                                        <option value="0">Seleccione..</option>
                                                                                        @foreach($estados as $estado)
                                                                                            <option value="{!! $estado->id !!}">{!!  $estado->nombre !!}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label for="">Municipio:</label></div>
                                                                                <div class="">
                                                                                    <select name="estado" id="estado" class="form-control">
                                                                                        <option value="0">Seleccione..</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label for="">Localidad:</label></div>

                                                                                <select name="ciudad" id="ciudad" class="form-control">
                                                                                    <option value="0">Seleccione..</option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                                                                {!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                {!!   Form::label('direccion', 'Dirección:') !!}
                                                                                {!!  Form::text('direccion','Playa del Carmen',['class' => 'form-control']) !!}
                                                                                <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label>Direccion: </label></div>
                                                                                <div class="">
                                                                                    <div class="mapa">
                                                                                        <div class="lat-long">
                                                                                            <div>
                                                                                                {!!  Form::label('latitud', 'Latitud') !!}
                                                                                                {!!  Form::text('latitud', '20.644217120001013',['class' => 'form-control']) !!}
                                                                                            </div>
                                                                                            <div>
                                                                                                {!!  Form::label('longitud', 'Longitud') !!}
                                                                                                {!! Form::text('longitud', '-87.07094038085938',['class' => 'form-control']) !!}
                                                                                                <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="mapCanvasHotel" class="mapCanvas" style="width:100%;height:350px;"></div>
                                                                                        <span id="err" style="color:red"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-default">Guardar</button>
                                                                    </div>
                                                                    {{--END AREA 4--}}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tours">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="panel-body">
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <form role="form" method="POST" action="{{ route('registertour') }}" files="true">
                                                                    <div class="panel panel-default">

                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                            <h4 class="panel-title">
                                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOneTour" aria-expanded="true" aria-controls="collapseOneTour">
                                                                                    Datos Generales del Tour
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOneTour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneTour">
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <label class="" for="owner">{{Auth::user()->id}}</label>
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <input type="hidden" name="owner" value="{!! Auth::user()->id !!}">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="nombre_tour">Nombre del Tour</label>
                                                                                    <input class="form-control" type="text" placeholder="nombre del Tour" name="nombre_tour">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="descripcion">descripcion</label>
                                                                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ old('descripcion')}} </textarea>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="max_pax">Max Pax</label>
                                                                                    <input type="number" class="form-control" placeholder="Max Pax" name="max_pax">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="min_pax">Min Pax</label>
                                                                                    <input type="number" class="form-control" placeholder="Min Pax" name="min_pax">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="categoria">Categoria</label>
                                                                                    <select name="categoria" id="categoria">
                                                                                        <option value="vacio">Seleccione...</option>
                                                                                        <option value="Aventura">Aventura</option>
                                                                                        <option value="Actividades acuáticas">Actividades acuáticas</option>
                                                                                        <option value="Sitios arqueológicos">Sitios arqueológicos</option>
                                                                                        <option value="Parque de diversiones">Parque de diversiones</option>
                                                                                        <option value="Eco tour">Eco tour</option>
                                                                                        <option value="Recorrido">Recorrido</option>
                                                                                        <option value="Interacción animal">Interacción animal</option>
                                                                                        <option value="Tour marino">Tour marino</option>
                                                                                        <option value="Eventos y shows">Eventos y shows</option>
                                                                                        <option value="Tour nocturno">Tour nocturno</option>
                                                                                        <option value="Tour citadino">Tour citadino</option>
                                                                                        <option value="Tour en barco">Tour en barco</option>
                                                                                        <option value="Actividades acuáticas">Actividades acuáticas</option>
                                                                                        <option value="Actividad física ">Actividad física </option>
                                                                                        <option value="Tour de buceo">Tour de buceo</option>
                                                                                        <option value="Tour de cavernas">Tour de cavernas</option>
                                                                                        <option value="otra_categoria">Otra Categoria...</option>
                                                                                    </select>

                                                                                    <div id="otra_categoria" style="display:none;">
                                                                                        <label for="specify">Otra Categoria</label>
                                                                                        <input type="text" name="otra_categoria" placeholder="Espesificar nueva categoria" class="form-control"/>
                                                                                    </div>
                                                                                </div>

                                                                                {{--<div class="form-group">--}}
                                                                                {{--<label for="horario_inicio">Horario de apertura</label>--}}
                                                                                {{--<input type="time" class="form-control" placeholder="Horario de inicio" name="horario_inicio">--}}
                                                                                {{--</div>--}}

                                                                                <div class="form-group">
                                                                                    <label for="horario_fin">Duracion</label>
                                                                                    <input type="number" class="form-control" placeholder="Duracion del Tour" name="duracion_tour">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 1--}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoTour" aria-expanded="true" aria-controls="collapseTwoTour">
                                                                                    Horarios
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseTwoTour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwoTour">
                                                                            <div class="panel-body form-inline">
                                                                                <div class="form-group">
                                                                                    <input type="button" value="Agregar+" onClick="addInput('dynamicInput');">
                                                                                    <div id="dynamicInput" class="">
                                                                                        <div class="form-group">
                                                                                            <label for="Horario Inicio">Horario Inicio 1</label>
                                                                                            <input type="time" class="form-control" id="exampleInputName2" name="horarios_inicio[]">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="Horario Termina">Horario Termina 1</label>
                                                                                            <input type="time" class="form-control" id="exampleInputEmail2" name="horarios_fin[]">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 2--}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeTour" aria-expanded="true" aria-controls="collapseThreeTour">
                                                                                    Incluye
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseThreeTour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreeTour">
                                                                            <div class="panel-body">
                                                                                <div class="form-inline">
                                                                                    @foreach($incluye as $include)
                                                                                        <div class="checkbox col-md-6">
                                                                                            <label>
                                                                                                {!!  Form::checkbox('incluye[]', $include->id, null, ['id' => 'incluye'.$include->id])  !!}
                                                                                                {!!$include->nombre  !!}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="otros">Otros</label>
                                                                                    <textarea class="form-control" name="otros" id="otros" cols="10" rows="5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 3--}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingThree">
                                                                            <h4 class="panel-title">
                                                                                <a id="cargarmapaTour" onclick="cargarmapatour()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFourTour" aria-expanded="false" aria-controls="collapseFourTour">
                                                                                    Localizacion
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseFourTour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourTour">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="">Estado:</label>
                                                                                <div class="">
                                                                                    <select name="pais" id="pais" class="form-control">
                                                                                        <option value="0">Seleccione..</option>
                                                                                        @foreach($estados as $estado)
                                                                                            <option value="{!! $estado->id !!}">{!!  $estado->nombre !!}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label for="">Municipio:</label></div>
                                                                                <div class="">
                                                                                    <select name="estado" id="estado" class="form-control">
                                                                                        <option value="0">Seleccione..</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label for="">Localidad:</label></div>

                                                                                <select name="ciudad" id="ciudad" class="form-control">
                                                                                    <option value="0">Seleccione..</option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                                                                {!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                {!!   Form::label('direccion', 'Dirección:') !!}
                                                                                {!!  Form::text('direccion','Playa del Carmen',['class' => 'form-control']) !!}
                                                                                <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label>Direccion: </label></div>
                                                                                <div class="">
                                                                                    <div class="mapa">
                                                                                        <div class="lat-long">
                                                                                            <div>
                                                                                                {!!  Form::label('latitud', 'Latitud') !!}
                                                                                                {!!  Form::text('latitud', '20.644217120001013',['class' => 'form-control']) !!}
                                                                                            </div>
                                                                                            <div>
                                                                                                {!!  Form::label('longitud', 'Longitud') !!}
                                                                                                {!! Form::text('longitud', '-87.07094038085938',['class' => 'form-control']) !!}
                                                                                                <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="mapCanvasTour" class="mapCanvas" style="width:100%;height:350px;"></div>
                                                                                        <span id="err" style="color:red"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-default">Guardar</button>
                                                                    </div>
                                                                    {{--END AREA 4--}}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="transportes">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="panel-body">
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <form role="form" method="POST" action="{{ route('registertransport') }}" files="true">
                                                                    <div class="panel panel-default">

                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                            <h4 class="panel-title">
                                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOneTransport" aria-expanded="true" aria-controls="collapseOneTransport">
                                                                                    Datos Generales del Transporte
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOneTransport" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneTransport">
                                                                            <div class="panel-body">

                                                                                <label class="" for="owner">{{Auth::user()->id}}</label>
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <input type="hidden" name="owner" value="{!! Auth::user()->id !!}">

                                                                                <div class="form-group">
                                                                                    <label for="name">Nombre</label>
                                                                                    <input class="form-control" type="text" name="name" placeholder="Nombre del transporte o empresa de transporte">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="tipo_servicio">tipo  de servicio</label>
                                                                                    <select name="tipo_servicio" id="tipo_servicio">
                                                                                        <option value="vacio">Seleccione...</option>
                                                                                        <option value="transporte publico">transporte publico</option>
                                                                                        <option value="transporte privado">transporte privado</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="descripcion">Descripcion:</label>
                                                                                    <textarea name="descripcion" id="descripcion" cols="5" rows="5" class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--END AREA 2--}}
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingThree">
                                                                            <h4 class="panel-title">
                                                                                <a id="cargarmapa" onclick="cargarmapa()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeTransport" aria-expanded="true" aria-controls="collapseThreeTransport">
                                                                                    Localizacion
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseThreeTransport" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeTransport">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="">Estado:</label>
                                                                                <div class="">
                                                                                    <select name="pais" id="pais" class="form-control">
                                                                                        <option value="0">Seleccione..</option>
                                                                                        @foreach($estados as $estado)
                                                                                            <option value="{!! $estado->id !!}">{!!  $estado->nombre !!}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label for="">Municipio:</label></div>
                                                                                <div class="">
                                                                                    <select name="estado" id="estado" class="form-control">
                                                                                        <option value="0">Seleccione..</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label for="">Localidad:</label></div>

                                                                                <select name="ciudad" id="ciudad" class="form-control">
                                                                                    <option value="0">Seleccione..</option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                                                                {!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                {!!   Form::label('direccion', 'Dirección:') !!}
                                                                                {!!  Form::text('direccion','Playa del Carmen',['class' => 'form-control']) !!}
                                                                                <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class=""><label>Direccion: </label></div>
                                                                                <div class="">
                                                                                    <div class="mapa">
                                                                                        <div class="lat-long">
                                                                                            <div>
                                                                                                {!!  Form::label('latitud', 'Latitud') !!}
                                                                                                {!!  Form::text('latitud', '20.644217120001013',['class' => 'form-control']) !!}
                                                                                            </div>
                                                                                            <div>
                                                                                                {!!  Form::label('longitud', 'Longitud') !!}
                                                                                                {!! Form::text('longitud', '-87.07094038085938',['class' => 'form-control']) !!}
                                                                                                <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="mapCanvasTransport" class="mapCanvas" style="width:100%;height:350px;"></div>
                                                                                        <span id="err" style="color:red"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-default">Guardar</button>
                                                                    </div>
                                                                    {{--END AREA 3--}}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="restaurantes">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="">
                                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                        <form role="form" method="POST" action="{{ route('registerrestaurant') }}" files="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab" id="headingOne">
                                                                                    <h4 class="panel-title">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOneRestaurant" aria-expanded="true" aria-controls="collapseOneRestaurant">
                                                                                            Datos Generales del Restaurante
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseOneRestaurant" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneRestaurant">
                                                                                    <div class="panel-body">
                                                                                        <label class="" for="owner">{{Auth::user()->id}}</label>
                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                        <input type="hidden" name="owner" value="{!! Auth::user()->id !!}">

                                                                                        <div class="form-group">
                                                                                            <label for="nombre">Nombre</label>
                                                                                            <input class="form-control" type="text" name="nombre" placeholder="nombre del restaurante">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="tipo_alimento">Tipo de Cocina</label>
                                                                                            <select name="tipo_alimento" id="tipo_alimento">
                                                                                                <option value="vacio">Seleccione...</option>
                                                                                                <option value="Asiática">Asiática</option>
                                                                                                <option value="Árabe">Árabe</option>
                                                                                                <option value="Carnes">Carnes</option>
                                                                                                <option value="China">China</option>
                                                                                                <option value="Fusión">Fusión</option>
                                                                                                <option value="Hindú">Hindú</option>
                                                                                                <option value="Internacional">Internacional</option>
                                                                                                <option value="Italiana">Italiana</option>
                                                                                                <option value="Mariscos SPA">Mariscos</option>
                                                                                                <option value="Mediterránea">Mediterránea</option>
                                                                                                <option value="Mexicana">Mexicana</option>
                                                                                                <option value="Rápida">Rápida</option>
                                                                                                <option value="Vegetariana">Vegetariana</option>
                                                                                            </select>                                            </div>

                                                                                        <div class="form-group">
                                                                                            <label for="descripcion">Descripcion</label>
                                                                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ old('descripcion')}} </textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{--END AREA 1--}}
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab" id="headingThree">
                                                                                    <h4 class="panel-title">
                                                                                        <a id="cargarmapa" onclick="cargarmapa()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeRestaurant" aria-expanded="true" aria-controls="collapseThreeRestaurant">
                                                                                            Localizacion
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseThreeRestaurant" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeRestaurant">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="">Estado:</label>
                                                                                        <div class="">
                                                                                            <select name="pais" id="pais" class="form-control">
                                                                                                <option value="0">Seleccione..</option>
                                                                                                @foreach($estados as $estado)
                                                                                                    <option value="{!! $estado->id !!}">{!!  $estado->nombre !!}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label for="">Municipio:</label></div>
                                                                                        <div class="">
                                                                                            <select name="estado" id="estado" class="form-control">
                                                                                                <option value="0">Seleccione..</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label for="">Localidad:</label></div>

                                                                                        <select name="ciudad" id="ciudad" class="form-control">
                                                                                            <option value="0">Seleccione..</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                                                                        {!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        {!!   Form::label('direccion', 'Dirección:') !!}
                                                                                        {!!  Form::text('direccion','Playa del Carmen',['class' => 'form-control']) !!}
                                                                                        <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label>Direccion: </label></div>
                                                                                        <div class="">
                                                                                            <div class="mapa">
                                                                                                <div class="lat-long">
                                                                                                    <div>
                                                                                                        {!!  Form::label('latitud', 'Latitud') !!}
                                                                                                        {!!  Form::text('latitud', '20.644217120001013',['class' => 'form-control']) !!}
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        {!!  Form::label('longitud', 'Longitud') !!}
                                                                                                        {!! Form::text('longitud', '-87.07094038085938',['class' => 'form-control']) !!}
                                                                                                        <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div id="mapCanvasRestaurant" class="mapCanvas" style="width:100%;height:350px;"></div>
                                                                                                <span id="err" style="color:red"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-default">Guardar</button>
                                                                            </div>
                                                                        </form>

                                                                        {{--END AREA 3--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="bares">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="">
                                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                        <form role="form" method="POST" action="{{ route('registerbar') }}" files="true">
                                                                            <div class="panel panel-default">

                                                                                <div class="panel-heading" role="tab" id="headingOneBar">
                                                                                    <h4 class="panel-title">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOneBar" aria-expanded="true" aria-controls="collapseOneBar">
                                                                                            Datos Generales del Bar
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseOneBar" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneBar">
                                                                                    <div class="panel-body">
                                                                                        <div class="form-group">
                                                                                            <label class="" for="owner">ID de Usuario: {!! Auth::user()->id !!}</label>
                                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                            <input type="hidden" name="owner" value="{!! Auth::user()->id !!}" readonly>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="name">Nombre</label>
                                                                                            <input class="form-control" type="text" name="nombre" placeholder="nombre del bar">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="tipo">Tipo de centro</label>
                                                                                            <select name="tipo" id="tipo_bar">
                                                                                                <option value="vacio">Seleccione...</option>
                                                                                                <option value="ladies-bar">ladies-bar</option>
                                                                                                <option value="piano-bar">piano-bar</option>
                                                                                                <option value="lobby-bar">lobby-bar</option>
                                                                                                <option value="terraza-bar">terraza-bar</option>
                                                                                                <option value="piscina-bar">piscina-bar</option>
                                                                                                <option value="teatro-bar">teatro-bar</option>
                                                                                                <option value="pulqueria">pulqueria</option>
                                                                                                <option value="salon de te">salon de te</option>
                                                                                                <option value="Night club">Night club</option>
                                                                                                <option value="Dancing saloon">Dancing saloon</option>
                                                                                                <option value="Discotheque">Discotheque</option>
                                                                                                <option value="Pub">Pub</option>
                                                                                                <option value="Taberna">Taberna española</option>
                                                                                                <option value="carnotzet">carnotzet</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        {{--<div class="form-group">--}}
                                                                                        {{--<label for="name">Nombre</label>--}}
                                                                                        {{--<input class="form-control" type="text" name="horario" placeholder="Horario de apertura y cierre">--}}
                                                                                        {{--</div>--}}

                                                                                        <div class="form-group">
                                                                                            <label for="descripcion">descripcion</label>
                                                                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ old('descripcion')}} </textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{--END AREA 1--}}
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab" id="headingThree">
                                                                                    <h4 class="panel-title">
                                                                                        <a id="cargarmapa" onclick="cargarmapa()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeBar" aria-expanded="true" aria-controls="collapseThree">
                                                                                            Localizacion
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseThreeBar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeBar">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="">Estado:</label>
                                                                                        <div class="">
                                                                                            <select name="pais" id="pais" class="form-control">
                                                                                                <option value="0">Seleccione..</option>
                                                                                                @foreach($estados as $estado)
                                                                                                    <option value="{!! $estado->id !!}">{!!  $estado->nombre !!}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label for="">Municipio:</label></div>
                                                                                        <div class="">
                                                                                            <select name="estado" id="estado" class="form-control">
                                                                                                <option value="0">Seleccione..</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label for="">Localidad:</label></div>

                                                                                        <select name="ciudad" id="ciudad" class="form-control">
                                                                                            <option value="0">Seleccione..</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                                                                        {!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        {!!   Form::label('direccion', 'Dirección:') !!}
                                                                                        {!!  Form::text('direccion','Playa del Carmen',['class' => 'form-control']) !!}
                                                                                        <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label>Direccion: </label></div>
                                                                                        <div class="">
                                                                                            <div class="mapa">
                                                                                                <div class="lat-long">
                                                                                                    <div>
                                                                                                        {!!  Form::label('latitud', 'Latitud') !!}
                                                                                                        {!!  Form::text('latitud', '20.644217120001013',['class' => 'form-control']) !!}
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        {!!  Form::label('longitud', 'Longitud') !!}
                                                                                                        {!! Form::text('longitud', '-87.07094038085938',['class' => 'form-control']) !!}
                                                                                                        <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div id="mapCanvasBar" class="mapCanvas" style="width:100%;height:350px;"></div>
                                                                                                <span id="err" style="color:red"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-default">Guardar</button>
                                                                            </div>
                                                                        </form>
                                                                        {{--END AREA 3--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="spas">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="">
                                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                        <form role="form" method="POST" action="{{ route('registerspa') }}" files="true">
                                                                            <div class="panel panel-default">

                                                                                <div class="panel-heading" role="tab" id="headingOne">
                                                                                    <h4 class="panel-title">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOneSpa" aria-expanded="true" aria-controls="collapseOneSpa">
                                                                                            Datos Generales del Spa
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseOneSpa" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneSpa">
                                                                                    <div class="panel-body">
                                                                                        <div class="form-group">
                                                                                            <label class="" for="owner">ID de Usuario: {!! Auth::user()->id !!}</label>
                                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                            <input type="hidden" name="owner" value="{!! Auth::user()->id !!}" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="nombre">Nombre</label>
                                                                                            <input class="form-control" type="text" name="nombre" placeholder="nombre del spa">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="tipo">Tipo de Spa</label>
                                                                                            <select name="tipo" id="tipo">
                                                                                                <option value="vacio">Seleccione...</option>
                                                                                                <option value="SPA Urbano">SPA Urbano</option>
                                                                                                <option value="SPA Destino">SPA Destino</option>
                                                                                                <option value="SPA Fitness">SPA Fitness</option>
                                                                                                <option value="SPA Hotel">SPA Hotel</option>
                                                                                                <option value="Terapeutico Medico">Terapeutico Médicos</option>
                                                                                                <option value="Terapeutico Fisio">Terapeutico Fisio</option>
                                                                                                <option value="Beauty SPA">Beauty SPA</option>
                                                                                                <option value="Hotel SPA">Hotel SPA</option>
                                                                                                <option value="Fitness SPA">Fitness SPA</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="descripcion">descripcion</label>
                                                                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ old('descripcion')}} </textarea>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{--END AREA 1--}}
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab" id="headingThreeSpa">
                                                                                    <h4 class="panel-title">
                                                                                        <a id="cargarmapa" onclick="cargarmapa()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeSpa" aria-expanded="true" aria-controls="collapseThreeSpa">
                                                                                            Localizacion
                                                                                        </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseThreeSpa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeSpa">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="">Estado:</label>
                                                                                        <div class="">
                                                                                            <select name="pais" id="pais" class="form-control">
                                                                                                <option value="0">Seleccione..</option>
                                                                                                @foreach($estados as $estado)
                                                                                                    <option value="{!! $estado->id !!}">{!!  $estado->nombre !!}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label for="">Municipio:</label></div>
                                                                                        <div class="">
                                                                                            <select name="estado" id="estado" class="form-control">
                                                                                                <option value="0">Seleccione..</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label for="">Localidad:</label></div>

                                                                                        <select name="ciudad" id="ciudad" class="form-control">
                                                                                            <option value="0">Seleccione..</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                                                                        {!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        {!!   Form::label('direccion', 'Dirección:') !!}
                                                                                        {!!  Form::text('direccion','Playa del Carmen',['class' => 'form-control']) !!}
                                                                                        <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <div class=""><label>Direccion: </label></div>
                                                                                        <div class="">
                                                                                            <div class="mapa">
                                                                                                <div class="lat-long">
                                                                                                    <div>
                                                                                                        {!!  Form::label('latitud', 'Latitud') !!}
                                                                                                        {!!  Form::text('latitud', '20.644217120001013',['class' => 'form-control']) !!}
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        {!!  Form::label('longitud', 'Longitud') !!}
                                                                                                        {!! Form::text('longitud', '-87.07094038085938',['class' => 'form-control']) !!}
                                                                                                        <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div id="mapCanvasSpa" class="mapCanvas" style="width:100%;height:350px;"></div>
                                                                                                <span id="err" style="color:red"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-default">Guardar</button>
                                                                            </div>
                                                                        </form>
                                                                        {{--END AREA 3--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    {!! Html::script('js/lugares.js') !!}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
@stop