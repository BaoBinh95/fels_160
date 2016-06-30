@extends('layouts.app')

@section('title')
    {{ trans('content.home_title') }}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center;">
                         <h1>{{ trans('content.welcome') }}</h1>
                    </div>

                    <div class="panel-body">
                        {{ trans('content.login_message') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
