@extends('layout')
@section('css')
    {!! Html::style('dopbcp/assets/gui/css/jquery.dop.Select.css') !!}
    {!! Html::style('dopbcp/assets/gui/css/jquery.dop.BackendBookingCalendarPRO.css') !!}
    {!! Html::style('dopbcp/templates/default/css/jquery.dop.FrontendBookingCalendarPRO.css') !!}

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">Calendario de Habitaciones</div>
                    <div class="panel-body">
                        <div id="backend"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    {!! Html::script('dopbcp/assets/js/jquery.dop.Select.js') !!}
    {!! Html::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js') !!}
    {!! Html::script('dopbcp/assets/js/dop-prototypes.js') !!}
    {!! Html::script('dopbcp/assets/js/jquery.dop.BackendBookingCalendarPRO.js') !!}
    {!! Html::script('dopbcp/assets/js/jquery.dop.FrontendBookingCalendarPRO.js') !!}
    <script>$('#backend').DOPBackendBookingCalendarPRO({
            'ID': '{{$habitacion->id}}',
            'loadURL': 'dopbcp/php-file/load.php',
            'saveURL': 'dopbcp/php-file/save.php'
        });
    </script>
@stop
