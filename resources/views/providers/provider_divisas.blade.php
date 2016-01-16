@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Divisas</div>
                    <div class="panel-body">
                        <h4>Precios de los diferentes tipos de cambio</h4>
                        <label for="dolar">Dolar</label>
                        <input class="form-control" type="text" value="{{$divisas['dolar']}}">
                        <label for="dolar">Euro</label>
                        <input class="form-control" type="text" value="{{$divisas['euro']}}">
                    </div>
                    <a href="{{URL::previous()}}">
                        <li>Volver</li>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
