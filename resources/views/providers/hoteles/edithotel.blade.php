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
                    <div class="panel-heading">Crear Hotel</div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <form role="form" method="POST" action="{{ url('updatehotel/'.$hotel->id) }}" files="true">
                                <div class="panel panel-default">

                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Generales del Hotel
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="" for="owner">ID de Usuario: {!! Auth::user()->id !!}</label>
                                                <label for="">{{count($servicioshotel)}}</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="owner" value="{!! Auth::user()->id !!}">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre_hotel">Nombre Hotel</label>
                                                <input class="form-control" type="text" placeholder="nombre del hotel" name="name" value="{{ $hotel->name }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="estrellas">Estrellas</label>
                                                <div class="radio">
                                                    @if($hotel->estrellas == 1)
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="1" checked>
                                                            1
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="1" >
                                                            1
                                                        </label>
                                                    @endif
                                                    @if($hotel->estrellas == 2)
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="2" checked>
                                                            2
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="2" >
                                                            2
                                                        </label>
                                                    @endif
                                                    @if($hotel->estrellas == 3)
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="3" checked>
                                                            3
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="3" >
                                                            3
                                                        </label>
                                                    @endif
                                                    @if($hotel->estrellas == 4)
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="4" checked>
                                                            4
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="4" >
                                                            4
                                                        </label>
                                                    @endif
                                                    @if($hotel->estrellas == 5)
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="5" checked>
                                                            5
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="radio" name="estrellas" id="optionsRadios1" value="5" >
                                                            5
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion</label>
                                                <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5" >{{ $hotel->descripcion}} </textarea>
                                            </div>

                                            <div class="form-group">
                                                @if($hotel->otro_plan == 1)
                                                <label for="">
                                                    Europeo
                                                    <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="noCheck" value="1" checked>
                                                </label>
                                                @else
                                                    <label for="">
                                                        Europeo
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="noCheck" value="1">
                                                    </label>
                                                @endif
                                                @if($hotel->otro_plan == 2)
                                                    <label for="">
                                                        Todo Incluido
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="noCheck" value="2" checked>
                                                    </label>
                                                @else
                                                    <label for="">
                                                        Todo Incluido
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="noCheck" value="2">
                                                    </label>
                                                @endif
                                                @if($hotel->otro_plan != 1 && $hotel->otro_plan != 2)
                                                    <label for="">
                                                        Otro
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="yesCheck" value="3" checked>
                                                    </label>
                                                    <div id="ifYes" style="display:block">
                                                        Otro tipo de plan: <input type='text' id='yes' name='otro_plan' value="{{$hotel->otro_plan}}">
                                                    </div>
                                                @else
                                                    <label for="">
                                                        Otro
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="otro_plan" id="yesCheck" value="3">
                                                    </label>
                                                    <div id="ifYes" style="display:none">
                                                        Otro tipo de plan: <input type='text' id='yes' name='test'>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--END AREA 1--}}
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Servicios Del Hotel
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="form-inline">
                                                @foreach($servicioshotel as $servicio)
                                                    @if($servicio->activo === 1)
                                                        <div class="checkbox col-md-3">
                                                            <label>
                                                                {!!  Form::checkbox('servicios[]', $servicio->id_servicio, null, ['id' => 'servicio'.$servicio->id_servicio, 'checked'])  !!}
                                                                {!!$servicio->info->nombre  !!}
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="checkbox col-md-3">
                                                            <label>
                                                                {!!  Form::checkbox('servicios[]', $servicio->id_servicio, null, ['id' => 'servicio'.$servicio->id_servicio])  !!}
                                                                {!!$servicio->info->nombre  !!}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="otros">Otros</label>
                                                <textarea class="form-control" name="otros_serv" id="otros_serv" cols="10" rows="5">{{ $hotel->otros_serv}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--END AREA 2--}}
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Necesidades Espesificas
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="form-inline">
                                                @foreach($especialeshotel as $especial)
                                                    @if($especial->activo === 1)
                                                        <div class="checkbox col-md-3">
                                                            <label>
                                                                {!!  Form::checkbox('necesidades[]', $especial->id_necesidad, null, ['id' => 'necesidad'.$especial->id_necesidad, 'checked'])  !!}
                                                                {!!$especial->info->nombre  !!}
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="checkbox col-md-3">
                                                            <label>
                                                                {!!  Form::checkbox('necesidades[]', $especial->id_necesidad, null, ['id' => 'necesidad'.$especial->id_necesidad])  !!}
                                                                {!!$especial->info->nombre  !!}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="otros">Otros</label>
                                                <textarea class="form-control" name="otras_nececidades" id="otras_nececidades" cols="10" rows="5">{{ $hotel->otras_nec}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--END AREA 3 --}}
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a id="cargarmapa" onclick="cargarmapa()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Localizacion
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="form-group col-md-12">
                                            <label for="">Estado:</label>
                                            <div class="">
                                                <select name="pais" id="pais" class="form-control">
                                                    <option value="{!! $hotel->estado!!}">{!! $hotel->nomstate->nombre!!}</option>
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
                                                    <option value="{!! $hotel->municipio!!}">{!! $hotel->nommunicipio->nombre!!}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class=""><label for="">Localidad:</label></div>

                                            <select name="ciudad" id="ciudad" class="form-control">
                                                <option value="{!! $hotel->localidad!!}">{!! $hotel->nomlocalidad->nombre!!}</option>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-12">
                                            {!!  Form::label('codigo_postal', 'Codigo Postal:') !!}
                                            {!! Form::text('codigo_postal',$hotel->cp,['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group col-md-12">
                                            {!!   Form::label('direccion', 'Dirección:') !!}
                                            {!!  Form::text('direccion',$hotel->direccion,['class' => 'form-control']) !!}
                                            <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">

                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class=""><label>Direccion: </label></div>
                                            <div class="">
                                                <div class="mapa">
                                                    <div class="lat-long">
                                                        <div>
                                                            {!!  Form::label('latitud', 'Latitud') !!}
                                                            {!!  Form::text('latitud', $hotel->latitud,['class' => 'form-control']) !!}
                                                        </div>
                                                        <div>
                                                            {!!  Form::label('longitud', 'Longitud') !!}
                                                            {!! Form::text('longitud',$hotel->longitud,['class' => 'form-control']) !!}
                                                            <input type="button" value="Ubicar en mapa" class="btn btn-info" onclick="codeLatLon()">
                                                        </div>
                                                    </div>
                                                    <div id="mapCanvas" style="width:100%;height:350px;"></div>
                                                    <span id="err" style="color:red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--END AREA 4--}}
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
    {!! HTML::script('js/lugares.js') !!}
    <script type="text/javascript">

        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('ifYes').style.display = 'block';
                document.getElementById('yes').name = 'otro_plan';
            }
            else document.getElementById('ifYes').style.display = 'none';
        }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <script type="text/javascript">
        // VARIABLES GLOBALES JAVASCRIPT
        var geocoder;
        var marker;
        var latLng;
        var latLng2;
        var map;

        // INICiALIZACION DE MAPA
        function initialize() {
            geocoder = new google.maps.Geocoder();
            latLng = new google.maps.LatLng('{{$hotel->latitud}}' , '{{$hotel->longitud}}');
            map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom:13,
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // CREACION DEL MARCADOR
            marker = new google.maps.Marker({
                position: latLng,
                title: 'Da click en cualquier parte del mapa para reubicar el marcador',
                map: map,
                draggable: false
            });
            // Escucho el CLICK sobre el mapa y si se produce actualizo la posicion del marcador
            google.maps.event.addListener(map, 'click', function(event) {
                updateMarker(event.latLng);
            });

            // Inicializo los datos del marcador
            //    updateMarkerPosition(latLng);
            geocodePosition(latLng);

            // Permito los eventos drag/drop sobre el marcador
            google.maps.event.addListener(marker, 'dragstart', function() {
                updateMarkerAddress('Arrastrando...');
            });

            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerStatus('Arrastrando...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                updateMarkerStatus('Arrastre finalizado');
                geocodePosition(marker.getPosition());
            });
        }


        // Permito la gesti�n de los eventos DOM
        //google.maps.event.addDomListener(window, 'load', initialize);
        /*function cargarmapa (){
         initialize()
         }*/
        function cargarmapa(){
            initialize();
            document.getElementById("cargarmapa").removeAttribute("onclick");
        }
        /*$('#cargarmapa').click(function(){
         initialize();
         });*/

        // ESTA FUNCION OBTIENE LA DIRECCION A PARTIR DE LAS COORDENADAS POS
        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('No puedo encontrar esta direccion.');
                }
            });
        }

        // OBTIENE LA DIRECCION A PARTIR DEL LAT y LON DEL FORMULARIO
        function codeLatLon() {
            /*str= document.form_mapa.longitud.value+" , "+document.form_mapa.latitud.value;*/
            str= document.getElementById('longitud').value+" , "+document.getElementById('latitud').value;
            latLng2 = new google.maps.LatLng(document.getElementById('latitud').value ,document.getElementById('longitud').value);
            marker.setPosition(latLng2);
            map.setCenter(latLng2);
            geocodePosition (latLng2);
            // document.form_mapa.direccion.value = str+" OK";
        }

        // OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
        function codeAddress() {
            var address = document.getElementById('direccion').value;
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    updateMarkerPosition(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    map.setCenter(results[0].geometry.location);
                }
                else {
                    alert('ERROR : ' + status);
                }
            });
        }

        // OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
        function codeAddress2 (address) {
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    updateMarkerPosition(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    map.setCenter(results[0].geometry.location);
                    document.form_mapa.direccion.value = address;
                } else {
                    alert('ERROR : ' + status);
                }
            });
        }

        function updateMarkerStatus(str) {
            document.form_mapa.direccion.value = str;
        }

        // RECUPERO LOS DATOS LON LAT Y DIRECCION Y LOS PONGO EN EL FORMULARIO
        function updateMarkerPosition (latLng) {
            document.getElementById('longitud').value =latLng.lng();
            document.getElementById('latitud').value = latLng.lat();
        }

        function updateMarkerAddress(str) {
            document.getElementById('direccion').value = str;
        }

        // ACTUALIZO LA POSICION DEL MARCADOR
        function updateMarker(location) {
            marker.setPosition(location);
            updateMarkerPosition(location);
            geocodePosition(location);
        }
    </script>

@stop
