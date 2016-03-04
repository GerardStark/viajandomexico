@extends('layout')
@section('css')
@stop
@section('content')
    {{--servicios turisticos--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-body ">
                        <div class="col-md-6">
                            <div class="col-md-12 col-md-offset-5">
                                <img src="{{asset('img/login/otratipa.png')}}" alt="otra tipa" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-md-offset-3 texto-tipa" id="texto-tipa">
                                <div class="col-md-11">
                                    <h2>Crear Algo</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quidem quos unde? Doloribus explicabo molestias recusandae repudiandae totam. Consequatur consequuntur delectus deleniti earum laborum minima minus nulla, obcaecati officiis!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 lista-crear col-md-pull-1">
                            <div class="col-md-12 col-md-offset-1">
                                {{--<a href="#"  id="hotel-btn">--}}
                                    {{--<li><img src="{{asset('img/login/hoteles.png')}}" alt="hoteles" class="img-responsive"></li>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('createtour')}}">--}}
                                    {{--<li><img src="{{asset('img/login/tours.png')}}" alt="Tours" class="img-responsive "></li>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('createservtur')}}">--}}
                                    {{--<li><img src="{{asset('img/login/servtur.png')}}" alt="Servicios Turisticos" class="img-responsive "></li>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('createtransport')}}">--}}
                                    {{--<li><img src="{{asset('img/login/transport.png')}}" alt="Transportes" class="img-responsive "></li>--}}
                                {{--</a>--}}
                                <div>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li id="hotel-btn" role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><img src="{{asset('img/login/hoteles.png')}}" alt="hoteles" class="img-responsive"></a></li>
                                        <li id="tour-btn" role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><img src="{{asset('img/login/tours.png')}}" alt="Tours" class="img-responsive "></a></li>
                                        <li id="restaurant-btn" role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><img src="{{asset('img/login/transport.png')}}" alt="Servicios Turisticos" class="img-responsive "></a></li>
                                        <li id="servtur-btn" role="presentation"><a href="#settings" aria-controls="messages" role="tab" data-toggle="tab"><img src="{{asset('img/login/servtur.png')}}" alt="Transportes" class="img-responsive "></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 cambia-form text-center" id="cambia">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <h2>Crear Hotel</h2>
                                        <p>da click en cualquier icono para comenzar la creacion de tu servicio.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <h2>Crear Tour</h2>
                                        <p>da click en cualquier icono para comenzar la creacion de tu servicio.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="messages">
                                        <h2>Crear Transporte</h2>
                                        <p>da click en cualquier icono para comenzar la creacion de tu servicio.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="settings">
                                        <h2>Crear Servicio Turistico</h2>
                                        <p>da click en cualquier icono para comenzar la creacion de tu servicio.</p>
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
    <script type="text/javascript">
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
        $(document).ready(function(){
            $("#hotel-btn").click(function(){
                $("#texto-tipa").empty();
                $("#texto-tipa").append("<div> <h2>Crear Hotel</h2> </div>");
            });
        });
        $(document).ready(function(){
            $("#tour-btn").click(function(){
                $("#texto-tipa").empty();
                $("#texto-tipa").append("<div> <h2>Crear Tour</h2> </div>");
            });
        });
        $(document).ready(function(){
            $("#restaurant-btn").click(function(){
                $("#texto-tipa").empty();
                $("#texto-tipa").append("<div> <h2>Crear Transporte</h2> </div>");
            });
        });
        $(document).ready(function(){
            $("#servtur-btn").click(function(){
                $("#texto-tipa").empty();
                $("#texto-tipa").append("<div> <h2>Crear Servicio Turistico</h2> </div>");
            });
        });

    </script>
@stop