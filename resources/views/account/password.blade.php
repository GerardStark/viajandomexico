@extends('layout-simple')

@section('content')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
    </div>
    <div class="modal-body">

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
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
@endsection