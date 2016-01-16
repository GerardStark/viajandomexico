@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials.success')
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Servicio Turistico</div>
                    <div class="panel-body">
                        </a><a href="{{route('createrestaurant')}}">
                        <li>Crear Restaurante</li>
                        </a>
                        </a><a href="{{route('createbar')}}">
                            <li>Crear Bar</li>
                        </a>
                        </a><a href="{{route('createspa')}}">
                            <li>Crear Spa</li>
                        </a>
                        <a href="{{URL::previous()}}">
                            <li>Volver</li>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
