@extends('layout-simple')
@section('content')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
    </div>
    <div class="modal-body">
        @include('partials/errors')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('account/edit-profile') }}">

            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input type="hidden" name="path" id="path" value="/profiles/{{$user->id}}/">

            <div class="form-group">
                <label class="col-md-4 control-label">Nombre</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Apellidos</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="apellido" value="{{ old('name', $user->name) }}">
                </div>
            </div>
            {{--<div class="form-group">--}}
            {{--<label class="col-md-4 control-label">Foto de perfil</label>--}}

            {{--<div class="col-md-6">--}}
            {{--<input type="file" name="foto_perfil" id="foto_perfil">--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="form-group">
                <label class="col-md-4 control-label">Dirección</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="direccion" value="{{ old('name', $user->direccion) }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Descripción</label>

                <div class="col-md-6">
                    <textarea name="descripcion" id="descripcion" cols="5" rows="5" class="form-control">{{ old('descripcion', $user->descripcion) }}</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        Update profile
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection
@stop