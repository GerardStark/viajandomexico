@extends('layout')
@section('css')
@stop
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                @include('partials/errors')
                <div class="panel panel-default">
                    <div></div>
                    <div class="panel-body">
                        <div class="col-md-3 text-center user-nombre">
                            <div class="perfil-info">
                                <img src="http://placehold.it/150x150/" alt="" class="col-md-12 img-circle">
                                <label for="descripcion">{!! Auth::user()->name !!}</label>
                            </div>
                            <div class="notificaciones">
                                <i class="fa fa-bell"></i> Notificaciones <span>12</span>
                            </div>
                        </div>

                        <div class="col-md-9 user-desc">
                            <label for="Descripcion" class="color-verde">Descripcion:</label>
                            <p>{!! Auth::user()->descripcion !!}</p>
                        </div>
                    </div>
                    <div class="panel-body tabs-select">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Mis_Servicios" aria-controls="Mis_Servicios" role="tab" data-toggle="tab" class="color-verde">Mis Servicios</a></li>
                                <li role="presentation"><a href="#Hoteles" aria-controls="Hoteles" role="tab" data-toggle="tab"><img
                                                src="{{ asset('img/login/hoteles.png') }}" alt="hoteles icono" class="img-icono-select"></a></li>
                                <li role="presentation"><a href="#Tours" aria-controls="Tours" role="tab" data-toggle="tab"><img
                                                src="{{asset('img/login/tours.png')}}" alt="hours icono" class="img-icono-select"></a></li>
                                <li role="presentation"><a href="#Transporte" aria-controls="Transporte" role="tab" data-toggle="tab"><img
                                                src="{{asset('img/login/transport.png')}}" alt="Transport Icono" class="img-icono-select"></a></li>
                                <li role="presentation"><a href="#Servi_turs" aria-controls="Servi_turs" role="tab" data-toggle="tab"><img
                                                src="{{asset('img/login/servtur.png')}}" alt="Servicios Turisticos Icono" class="img-icono-select"></a></li>
                                <li role="presentation"><a href="{{route('createnewservice')}}" class="color-verde"><i class="fa fa-plus"></i> Nuevo Servicio</a></li>
                            </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="Mis_Servicios">
                                <h3>Mis Servicios</h3>

                                <ul>
                                    @if(count($hoteles)>0 || count($tours)>0 || count($transports)>0 ||count($restaurantes)>0 || count($bares)>0 || count($spas)>0)
                                        @foreach($hoteles as $hotel)
                                            <div class="well">
                                                <div class="form-group">
                                                    <label for="id_hotels">ID del Hotel</label>
                                                    <label for="id_hotel"> {{$hotel->id}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre_hotel">Nombre Hotel</label>
                                                    <label for="nombre">{{$hotel->name}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <ul>
                                                        <li><a href="{{url('edithotel/'.$hotel->id)}}">Editar Info</a></li>
                                                        <li><a href="{{url('creategaleria/'.$hotel->id_galeria)}}">Galeria</a></li>
                                                        <li><a href="{{url('habitacioneshotel/'.$hotel->id)}}">Habitaciones</a></li>
                                                        <li><a href="{{url('eliminarhotel/'.$hotel->id)}}">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach($tours as $tour)
                                            <div class="well">
                                                <div class="form-group">
                                                    <label for="id_tours">ID del Tour</label>
                                                    <label for="id_tour"> {{$tour->id}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre_tour">Nombre Tour</label>
                                                    <label for="nombre">{{$tour->nombre}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descripcion_tour">{{$tour->descripcion}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <ul>
                                                        <li><a href="{{url('edittour/'.$tour->id)}}">Editar Info</a></li>
                                                        <li><a href="{{url('creategaleria/'.$tour->id_galeria)}}">Editar Galeria</a></li>
                                                        <li><a href="{{url('costostour/'.$tour->id)}}">Costos</a></li>
                                                        <li><a href="{{url('eliminartour/'.$tour->id)}}">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach($transports as $transport)
                                            <div class="well">
                                                <div class="form-group">
                                                    <label for="id">ID del Transporte</label>
                                                    <label for="id"> {{$transport->id}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nombre Transporte</label>
                                                    <label for="name">{{$transport->name}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <ul>
                                                        <li><a href="{{url('edittransport/'.$transport->id)}}">Editar Info</a></li>
                                                        <li><a href="{{url('creategaleria/'.$transport->id_galeria)}}">Editar Galeria</a></li>
                                                        {{--<li><a href="{{url('costostransport/'.$transport->id)}}">Costos</a></li>--}}
                                                        <li><a href="{{url('rutastransport/'.$transport->id)}}">Rutas</a></li>
                                                        {{--<li><a href="{{url('vehiculostransport/'.$transport->id)}}">Vehiculos</a></li>--}}
                                                        <li><a href="{{url('eliminartransport/'.$transport->id)}}">Eliminar</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach($restaurantes as $restaurant)
                                            <div class="well">
                                                <div class="form-group">
                                                    <label for="id">ID del Restaurante</label>
                                                    <label for="id"> {{$restaurant->id}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre">Nombre Restaurante</label>
                                                    <label for="nombre">{{$restaurant->nombre}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo_alimento">{{$restaurant->tipo_alimento}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <ul>
                                                        <li><a href="{{url('editrestaurant/'.$restaurant->id)}}">Editar Info</a></li>
                                                        <li><a href="{{url('creategaleria/'.$restaurant->id_galeria)}}">Editar Galeria</a></li>
                                                        {{--<li><a href="{{url('costosrestaurante/'.$restaurant->id)}}">Costos</a></li>--}}
                                                        <li><a href="{{url('eliminarrestaurant/'.$restaurant->id)}}">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach($bares as $bar)
                                            <div class="well">
                                                <div class="form-group">
                                                    <label for="id">ID del bar</label>
                                                    <label for="id"> {{$bar->id}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre">Nombre Bar</label>
                                                    <label for="nombre">{{$bar->nombre}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo">{{$bar->tipo}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <ul>
                                                        <li><a href="{{url('editbar/'.$bar->id)}}">Editar Info</a></li>
                                                        <li><a href="{{url('creategaleria/'.$bar->id_galeria)}}">Editar Galeria</a></li>
                                                        {{--<li><a href="{{url('costosbar/'.$bar->id)}}">Costos</a></li>--}}
                                                        <li><a href="{{url('eliminarbar/'.$bar->id)}}">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        @foreach($spas as $spa)
                                            <div class="well">
                                                <div class="form-group">
                                                    <label for="id">ID del spa</label>
                                                    <label for="id"> {{$spa->id}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre">Nombre Spa</label>
                                                    <label for="nombre">{{$spa->nombre}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo">{{$spa->tipo}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <ul>
                                                        <li><a href="{{url('editspa/'.$spa->id)}}">Editar Info</a></li>
                                                        <li><a href="{{url('creategaleria/'.$spa->id_galeria)}}">Editar Galeria</a></li>
                                                        <li><a href="{{url('costosspa/'.$spa->id)}}">Costos</a></li>
                                                        <li><a href="{{url('eliminarspa/'.$spa->id)}}">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No Tienes ni un servicio registrado, registra uno.</p>
                                        <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                    @endif
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Hoteles">

                                <h3>Hoteles</h3>

                                @if(count($hoteles)>0)
                                    @foreach($hoteles as $hotel)
                                        <div class="well">
                                            <div class="form-group">
                                                <label for="id_hotels">ID del Hotel</label>
                                                <label for="id_hotel"> {{$hotel->id}}</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_hotel">Nombre Hotel</label>
                                                <label for="nombre">{{$hotel->name}}</label>
                                            </div>
                                            <div class="form-group">
                                                <ul>
                                                    <li><a href="{{url('edithotel/'.$hotel->id)}}">Editar Info</a></li>
                                                    <li><a href="{{url('creategaleria/'.$hotel->id_galeria)}}">Galeria</a></li>
                                                    <li><a href="{{url('habitacioneshotel/'.$hotel->id)}}">Habitaciones</a></li>
                                                    <li><a href="{{url('eliminarhotel/'.$hotel->id)}}">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No tienes un Hotel registrado, registra uno.</p>
                                    <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Tours">

                                <h3>Tours</h3>

                                @if(count($tours)>0)
                                    @foreach($tours as $tour)
                                    <div class="well">
                                        <div class="form-group">
                                            <label for="id_tours">ID del Tour</label>
                                            <label for="id_tour"> {{$tour->id}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre_tour">Nombre Tour</label>
                                            <label for="nombre">{{$tour->nombre}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion_tour">{{$tour->descripcion}}</label>
                                        </div>
                                        <div class="form-group">
                                            <ul>
                                                <li><a href="{{url('edittour/'.$tour->id)}}">Editar Info</a></li>
                                                <li><a href="{{url('creategaleria/'.$tour->id_galeria)}}">Editar Galeria</a></li>
                                                <li><a href="{{url('costostour/'.$tour->id)}}">Costos</a></li>
                                                <li><a href="{{url('eliminartour/'.$tour->id)}}">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    <p>No tienes un Tour registrado, registra uno.</p>
                                    <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                @endif
                            </div>

                            <div role="tabpanel" class="tab-pane" id="Transporte">

                                <h3>Transporte</h3>

                                @if(count($transports)>0)
                                    @foreach($transports as $transport)
                                        <div class="well">
                                            <div class="form-group">
                                                <label for="id">ID del Transporte</label>
                                                <label for="id"> {{$transport->id}}</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nombre Transporte</label>
                                                <label for="name">{{$transport->name}}</label>
                                            </div>
                                            <div class="form-group">
                                                <ul>
                                                    <li><a href="{{url('edittransport/'.$transport->id)}}">Editar Info</a></li>
                                                    <li><a href="{{url('creategaleria/'.$transport->id_galeria)}}">Editar Galeria</a></li>
                                                    {{--<li><a href="{{url('costostransport/'.$transport->id)}}">Costos</a></li>--}}
                                                    <li><a href="{{url('rutastransport/'.$transport->id)}}">Rutas</a></li>
                                                    {{--<li><a href="{{url('vehiculostransport/'.$transport->id)}}">Vehiculos</a></li>--}}
                                                    <li><a href="{{url('eliminartransport/'.$transport->id)}}">Eliminar</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No tienes un Transporte registrado, registra uno.</p>
                                    <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                @endif
                            </div>

                            <div role="tabpanel" class="tab-pane" id="Servi_turs">


                                <h3>Servicios Turisticos</h3>

                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" class="active"><a href="#Servtur" aria-controls="Servtur" role="button" data-toggle="tab">Servicios Turisticos</a></li>
                                    <li role="presentation"><a href="#Restaurante" aria-controls="Restaurante" role="button" data-toggle="tab">Restaurantes</a></li>
                                    <li role="presentation"><a href="#Bar" aria-controls="Bar" role="button" data-toggle="tab">Bares</a></li>
                                    <li role="presentation"><a href="#Spa" aria-controls="Spa" role="button" data-toggle="tab">Spas</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="Servtur">


                                        @if(count($restaurantes)>0 || count($bares)>0 || count($spas)>0)
                                            @foreach($restaurantes as $restaurant)
                                                <div class="well">
                                                    <div class="form-group">
                                                        <label for="id">ID del Restaurante</label>
                                                        <label for="id"> {{$restaurant->id}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre Restaurante</label>
                                                        <label for="nombre">{{$restaurant->nombre}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo_alimento">{{$restaurant->tipo_alimento}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <ul>
                                                            <li><a href="{{url('editrestaurant/'.$restaurant->id)}}">Editar Info</a></li>
                                                            <li><a href="{{url('creategaleria/'.$restaurant->id_galeria)}}">Editar Galeria</a></li>
                                                            {{--<li><a href="{{url('costosrestaurante/'.$restaurant->id)}}">Costos</a></li>--}}
                                                            <li><a href="{{url('eliminarrestaurant/'.$restaurant->id)}}">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach($bares as $bar)
                                                <div class="well">
                                                    <div class="form-group">
                                                        <label for="id">ID del bar</label>
                                                        <label for="id"> {{$bar->id}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre Bar</label>
                                                        <label for="nombre">{{$bar->nombre}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo">{{$bar->tipo}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <ul>
                                                            <li><a href="{{url('editbar/'.$bar->id)}}">Editar Info</a></li>
                                                            <li><a href="{{url('creategaleria/'.$bar->id_galeria)}}">Editar Galeria</a></li>
                                                            {{--<li><a href="{{url('costosbar/'.$bar->id)}}">Costos</a></li>--}}
                                                            <li><a href="{{url('eliminarbar/'.$bar->id)}}">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach($spas as $spa)
                                                <div class="well">
                                                    <div class="form-group">
                                                        <label for="id">ID del spa</label>
                                                        <label for="id"> {{$spa->id}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre Spa</label>
                                                        <label for="nombre">{{$spa->nombre}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo">{{$spa->tipo}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <ul>
                                                            <li><a href="{{url('editspa/'.$spa->id)}}">Editar Info</a></li>
                                                            <li><a href="{{url('creategaleria/'.$spa->id_galeria)}}">Editar Galeria</a></li>
                                                            <li><a href="{{url('costosspa/'.$spa->id)}}">Costos</a></li>
                                                            <li><a href="{{url('eliminarspa/'.$spa->id)}}">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No Tienes un Servicio Turistico registrado, registra uno.</p>
                                            <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                        @endif
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="Restaurante">
                                        @if(count($restaurantes)>0)
                                            @foreach($restaurantes as $restaurant)
                                                <div class="well">
                                                    <div class="form-group">
                                                        <label for="id">ID del Restaurante</label>
                                                        <label for="id"> {{$restaurant->id}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre Restaurante</label>
                                                        <label for="nombre">{{$restaurant->nombre}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo_alimento">{{$restaurant->tipo_alimento}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <ul>
                                                            <li><a href="{{url('editrestaurant/'.$restaurant->id)}}">Editar Info</a></li>
                                                            <li><a href="{{url('creategaleria/'.$restaurant->id_galeria)}}">Editar Galeria</a></li>
                                                            {{--<li><a href="{{url('costosrestaurante/'.$restaurant->id)}}">Costos</a></li>--}}
                                                            <li><a href="{{url('eliminarrestaurant/'.$restaurant->id)}}">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No tienes un Restaurante registrado, registra uno.</p>
                                            <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                        @endif
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="Bar">

                                        @if(count($bares)>0)
                                            @foreach($bares as $bar)
                                                <div class="well">
                                                    <div class="form-group">
                                                        <label for="id">ID del bar</label>
                                                        <label for="id"> {{$bar->id}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre Bar</label>
                                                        <label for="nombre">{{$bar->nombre}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo">{{$bar->tipo}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <ul>
                                                            <li><a href="{{url('editbar/'.$bar->id)}}">Editar Info</a></li>
                                                            <li><a href="{{url('creategaleria/'.$bar->id_galeria)}}">Editar Galeria</a></li>
                                                            {{--<li><a href="{{url('costosbar/'.$bar->id)}}">Costos</a></li>--}}
                                                            <li><a href="{{url('eliminarbar/'.$bar->id)}}">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No tienes un Bar registrado, registra uno.</p>
                                            <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                        @endif
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="Spa">

                                        @if(count($bares)>0)
                                            @foreach($spas as $spa)
                                                <div class="well">
                                                    <div class="form-group">
                                                        <label for="id">ID del spa</label>
                                                        <label for="id"> {{$spa->id}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre Spa</label>
                                                        <label for="nombre">{{$spa->nombre}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo">{{$spa->tipo}}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <ul>
                                                            <li><a href="{{url('editspa/'.$spa->id)}}">Editar Info</a></li>
                                                            <li><a href="{{url('creategaleria/'.$spa->id_galeria)}}">Editar Galeria</a></li>
                                                            <li><a href="{{url('costosspa/'.$spa->id)}}">Costos</a></li>
                                                            <li><a href="{{url('eliminarspa/'.$spa->id)}}">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No Tienes un Spa registrado, registra uno.</p>
                                            <a href="{{route('createnewservice')}}">Crear Servicio </a>
                                        @endif
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