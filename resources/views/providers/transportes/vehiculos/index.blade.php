@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Rutas del Transporte {{$transporte->name}}</div>
                    <div class="panel-body">
                        @if(count($rutas)>0)
                            @foreach($rutas as $ruta)
                                {{$ruta->nombre}}
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <p>No tienes rutas registradas.</p>
                                <p><a href="{{url('crearruta/'.$transporte->id)}}">Crear Ruta</a></p>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection