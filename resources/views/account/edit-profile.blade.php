@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Perfil</div>
                    <div class="panel-body">
                        @include('partials/errors')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('account/edit-profile') }}">

                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}

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
                            <div class="form-group">
                                <label class="col-md-4 control-label">Foto de perfil</label>

                                <div class="col-md-6">
                                    <input type="file" name="foto_perfil" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Direccion</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="direccion" value="{{ old('name', $user->direccion) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripcion</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="descripcion" value="{{ old('name', $user->descripcion) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@stop