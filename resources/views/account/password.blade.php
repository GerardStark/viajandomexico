@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cambiar Contraseña</div>
                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/success')

                        <form class="form-horizontal" method="POST" action="{{ url('account/password') }}">

                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="current_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nueva Contraseña</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="password">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirmar Contraseña</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="password_confirmation">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        Reestablecer Contraseña
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