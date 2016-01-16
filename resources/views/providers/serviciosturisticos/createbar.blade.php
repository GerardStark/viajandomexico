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
                    <div class="panel-heading">Crear Bar</div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <form role="form" method="POST" action="{{ route('registerbar') }}" files="true">
                                <div class="panel panel-default">

                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Generales del Bar
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
                                            <a id="cargarmapa" onclick="cargarmapa()" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Localizacion
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="form-group col-md-12">
                                            <label for="">Pais:</label>
                                            <div class="">
                                                <select name="pais" id="pais" class="form-control">
                                                    <option value="0">Seleccione..</option>
                                                    @foreach($paises as $pais)
                                                        <option value="{!! $pais->id !!}">{!!  $pais->nombre !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class=""><label for="">Estado:</label></div>
                                            <div class="">
                                                <select name="estado" id="estado" class="form-control">
                                                    <option value="0">Seleccione..</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class=""><label for="">Ciudad:</label></div>

                                            <select name="ciudad" id="ciudad" class="form-control">
                                                <option value="0">Seleccione..</option>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="">{!!  Form::label('codigo_postal', 'Codigo Postal:') !!}</div>
                                            <div class="">{!! Form::text('codigo_postal',null,['class' => 'form-control']) !!}</div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="">{!!   Form::label('direccion', 'Dirección:') !!}</div>
                                            <div class="">{!!  Form::text('direccion','Playa del Carmen',null,['class' => 'form-control']) !!}
                                                <input type="button" value="Ubicar en Mapa" onclick="codeAddress()" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class=""><label>Direccion: </label></div>
                                            <div class="">
                                                <div class="mapa">
                                                    <div class="lat-long">
                                                        <div>
                                                            {!!  Form::label('latitud', 'Latitud') !!}
                                                            {!!  Form::text('latitud', '20.644217120001013',null,['class' => 'form-control']) !!}
                                                        </div>
                                                        <div>
                                                            {!!  Form::label('longitud', 'Longitud') !!}
                                                            {!! Form::text('longitud', '-87.07094038085938',null,['class' => 'form-control']) !!}
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
    {!! HTML::script('js/lugares.js') !!}
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
            latLng = new google.maps.LatLng('20.6295586' , '-87.07388509999998');
            map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom:13,
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // CREACION DEL MARCADOR
            marker = new google.maps.Marker({
                position: latLng,
                title: 'Arrastra el marcador si quieres moverlo',
                map: map,
                draggable: true
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


        // Permito la gesti¢n de los eventos DOM
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
