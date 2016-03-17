@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 img-tipa">
                <img src="{{ asset('img/login/tipa.png') }}" alt="tipa" class="img-responsive">
            </div>
            <div class="col-md-5 login-form">

                <div class="panel panel-default">
                    <div class="pull-right">
                        <img src="{{ asset('/img/login/logogris.png') }}" alt="logo" class="img-responsive">
                    </div>
                    <div class="panel-body login-box">
                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-1 control-label"><i class="fa fa-user icono"></i></label>

                                <div class="col-md-11">
                                    <input name="email" type="email" value="{{ old('email') }}" class="form-control formulario">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label"><i class="fa fa-lock icono"></i></label>

                                <div class="col-md-11">
                                    <input name="password" type="password" class="form-control formulario">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">@lang('auth.remember')
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12  col-md-offset-1">
                                <a href="/password/email">@lang('auth.forgot_link')</a>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 botones">
                                    <button type="submit" class="btn btn-primary col-md-6 boton">
                                        @lang('auth.login_button')
                                    </button>
                                    <button class="btn btn-primary col-md-6 boton">
                                        <a href="{{ route('registernew') }}" data-toggle="modal" data-target="#myModal">Regristrate</a>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">

                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection