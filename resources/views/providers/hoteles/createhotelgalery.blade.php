@extends('layout')
@section('css')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('partials/success')
            <div class="panel panel-primary">

                <div class="panel-heading">
                    Galeria
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=> 'storeimage', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                    <input type="hidden" name="path" id="path" value="/galerias/{{$galeria}}/">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="owner" value="{!! Auth::user()->id !!}" readonly>
                    <input type="hidden" name="hotel_id" id="hotel_id" value="{{$hotelid}}">

                    <div class="dz-message" style="height:200px;">
                        Arrastra tus archivos Aqui
                    </div>
                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Subir</button>
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="panel-body">
                {!! Form::open(['url'=> 'updategaleria/'.$galeria.'/', 'method' => 'POST', 'files'=>'true', 'id' => 'editgalery']) !!}
                <table class="table  table-hover">
                    <tr>
                        <th>#</th>
                        <th>Nombre de la imagen</th>
                        <th>Principal</th>
                        <th>Activa</th>
                        <th></th>
                    {{--*/ $cont = 1 /*--}}
                    @foreach($imagenes as $imagen)
                        <tr>
                            <td>{{ $cont }}</td>
                            <td> {!!   Html::image('galerias/'.$galeria.'/'.$imagen->nombre, 'a picture', array('width' => '150px', 'height' => '100px')) !!}</td>
                            @if($imagen->principal == 1 )
                                <td>{!!  Form::radio('principal', $imagen->nombre, ['checked']) !!}</td>
                            @else
                                <td>{!!  Form::radio('principal', $imagen->nombre) !!}</td>
                            @endif
                            @if($imagen->active == 1)
                                <td>{!! Form::checkbox('activo_'.$imagen->id, '1', ['id' => $imagen->id,'checked']) !!}</td>
                            @else
                                <td>{!! Form::checkbox('activo_'.$imagen->id, '1', ['id' => $imagen->id]) !!}</td>
                            @endif
                            <td><a href="{{url('eliminarimagen/'.$imagen->id)}}">Eliminar Imagen</a></td>
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

@endsection
@section('scripts')
    {!! Html::script('js/dropzone.js')!!}
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            dictRemoveFile: 'Quitar',
            dictFileTooBig: 'La imagen es muy pesada (MAX: 2MB)',
            maxFilezise: 2,
            maxFiles: 10,


            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {

                });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                    location.reload();
                });

                this.on("success",
                        myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection