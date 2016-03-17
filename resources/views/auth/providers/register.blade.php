@extends('layout-simple')

@section('content')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrate</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('registerprovider') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label">Nombre de Usuario</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">E-mail</label>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Confirmar E-mail</label>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Confirmar contraseña</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Registrarse
        </button>
    </div>
@endsection