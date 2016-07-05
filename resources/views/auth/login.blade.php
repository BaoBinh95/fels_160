@extends('layouts.app')

@section('title')
    {{ trans('auth.login_title') }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('auth.login') }}</div>
                <div class="panel-body">

                    @include('layouts.partials.errors')

                    {!! Form::open(['url' => '/login', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {{ Form::label('email', trans('auth.email_address'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {!! Form::text('email', null, ['class' => 'form-control', 'value' => old('email')]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', trans('auth.password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('remember', null) }} {{ trans('auth.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::button('<i class="fa fa-btn fa-sign-in"></i> ' . trans("auth.login"), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ trans('auth.forgot_password') }}</a>
                                <p>
                                    <a class="btn btn-link" href="redirect/facebook">
                                        <span class="fa fa-facebook"></span> {{ trans('auth.facebook_login') }}
                                    </a>

                                    <a class="btn btn-link" href="redirect/twitter">
                                        <span class="fa fa-twitter"></span> {{ trans('auth.twitter_login') }}
                                    </a>
                                    <a class="btn btn-link" href="redirect/google">
                                        <span class="fa fa-google"></span> {{ trans('auth.google_login') }}
                                    </a>
                                </p>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
