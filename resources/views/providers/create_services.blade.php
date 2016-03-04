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
                            <div class="col-md-8 col-md-offset-3 texto-tipa">
                                <div class="col-md-11">
                                    <h2>Crear Algo</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quidem quos unde? Doloribus explicabo molestias recusandae repudiandae totam. Consequatur consequuntur delectus deleniti earum laborum minima minus nulla, obcaecati officiis!</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 lista-crear col-md-pull-1">
                            <div class="col-md-12 col-md-offset-1">
                                <a href="{{route('createhotel')}}">
                                    <li><img src="{{asset('img/login/hoteles.png')}}" alt="hoteles" class="img-responsive "></li>
                                </a>
                                <a href="{{route('createtour')}}">
                                    <li><img src="{{asset('img/login/tours.png')}}" alt="Tours" class="img-responsive "></li>
                                </a>
                                <a href="{{route('createservtur')}}">
                                    <li><img src="{{asset('img/login/servtur.png')}}" alt="Servicios Turisticos" class="img-responsive "></li>
                                </a>
                                <a href="{{route('createtransport')}}">
                                    <li><img src="{{asset('img/login/transport.png')}}" alt="Transportes" class="img-responsive "></li>
                                </a>
                            </div>
                            <div class="col-md-12 cambia-form text-center">
                                <h2>Crear Algo</h2>
                                <p>da click en cualquier icono para comenzar la creacion de tu servicio.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi dolore incidunt itaque, maiores voluptate? Asperiores dolorum, illum impedit ipsum nihil omnis porro provident quae saepe soluta sunt ullam?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi dolore incidunt itaque, maiores voluptate? Asperiores dolorum, illum impedit ipsum nihil omnis porro provident quae saepe soluta sunt ullam?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi dolore incidunt itaque, maiores voluptate? Asperiores dolorum, illum impedit ipsum nihil omnis porro provident quae saepe soluta sunt ullam?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi dolore incidunt itaque, maiores voluptate? Asperiores dolorum, illum impedit ipsum nihil omnis porro provident quae saepe soluta sunt ullam?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi dolore incidunt itaque, maiores voluptate? Asperiores dolorum, illum impedit ipsum nihil omnis porro provident quae saepe soluta sunt ullam?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi dolore incidunt itaque, maiores voluptate? Asperiores dolorum, illum impedit ipsum nihil omnis porro provident quae saepe soluta sunt ullam?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop