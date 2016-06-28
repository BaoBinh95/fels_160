@extends('layouts.app')

@section('title')
    {{ trans('content.welcome_title') }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('content.welcome') }}</div>

                <div class="panel-body">
                    {{ trans('content.welcome_message') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
