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
            <input type="hidden" name="path" id="path" value="/perfiles/{{$user->id}}/" >
            <div class="form-group">
                @if(is_null($user->foto_perfil))
                   <img id="blah" src="#" alt="your image" class="col-md-6  col-md-offset-3"/>
                @else
                    <img id="blah" src="{{asset('perfiles/'.$user->id.'/'.$user->foto_perfil)}}" alt="your image" class="col-md-6  col-md-offset-3"/>
                @endif
                <input type='file' id="foto_perfil" name="foto_perfil" class="col-md-6 col-md-offset-3"/>
            </div>
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
@section('scripts')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#foto_perfil").change(function(){
            readURL(this);
        });
    </script>
@endsection
@stop