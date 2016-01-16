@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/success')
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.welcome')</div>
                    <div class="panel-body">
                        <h1>Viajando México</h1>
                        <p>@lang('auth.welcome_two')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection