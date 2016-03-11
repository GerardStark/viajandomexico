@extends('layout-simple')

@section('content')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
    </div>
    <div class="modal-body">
        @include('partials/errors')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('account/verify') }}">

            {!! method_field('PUT') !!}
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="col-md-4 control-label">Correo: {{$user->email}}</label>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Reenviar Validación
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