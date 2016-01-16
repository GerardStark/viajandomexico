@extends('layout')
@section('css')
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Galeria</div>
                    <div class="panel-body">
                        {!! Form::open(['url'=> 'updategalery/'.$galeria.'/', 'method' => 'POST', 'files'=>'true', 'id' => 'editgalery']) !!}
                                {!!$cuantos = count($imagenes) !!}
                            <table class="table  table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre de la imagen</th>
                                    <th>Principal</th>
                                    <th>Activa</th>
                                </tr>
                                {{--*/ $cont = 1 /*--}}
                            @foreach($imagenes as $imagen)
                                    <tr>
                                        <td>{{ $cont }}</td>
                                        <td> {!!   Html::image('galerias/'.$galeria.'/'.$imagen->nombre, 'a picture', array('width' => '150px', 'height' => '100px')) !!}</td>
                                        @if($imagen->principal == 1 )
                                            <td>{!!  Form::radio('principal', '1', ['checked']) !!}</td>
                                        @else
                                            <td>{!!  Form::radio('principal', '1') !!}</td>
                                        @endif
                                        @if($imagen->active == 1)
                                           <td>{!! Form::checkbox('activo_'.$imagen->id, '1', ['checked']) !!}</td>
                                        @else
                                            <td>{!! Form::checkbox('activo_'.$imagen->id, '1') !!}</td>
                                        @endif
                                    </tr>
                                    <input type="hidden" value="{!! $galeria!!}" name="galeriaid" id="galeriaid">
                                    <input type="hidden" value="{!! $imagen->id!!}" name="imagenid" id="imgenid">
                                    {{--*/ $cont++; /*--}}
                            @endforeach
                                </table>
                        <button type="submit" class="btn btn-success" id="submit">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop