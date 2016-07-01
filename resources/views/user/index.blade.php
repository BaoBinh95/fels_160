@extends('layouts.app')

@section('title')
    {{ trans('auth.show_profile_title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row">

                @include('layouts.partials.errors')
                @include('layouts.partials.success')

                <div class="col-md-4">

                    {{ Html::image($user->avatar, $user->name . ' Profile Avatar', ['class' => 'img-responsive']) }}

                    <br>

                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td><i class="fa fa-user"></i> {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><i class="fa fa-envelope"></i> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Warning</h4>
                        Name, email address and profile picture are fake.
                    </div>

                    @can('update-info', $user->id)
                        <h3>Change Your Information</h3>

                        {!! Form::model($user, ['url' => '/user/' . $user->id, 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}

                        {!! Form::label('name', trans('auth.name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        {!! Form::label('email', trans('auth.email_address')) !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}

                        {!! Form::label('avatar', trans('auth.avatar')) !!}
                        {!! Form::file('avatar') !!}

                        <br>

                        {!! Form::button('<i class="fa fa-pencil-square"></i> ' . trans("auth.update"), ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}
                    @endcan

                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>Activities: </h2>
                        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
                        <p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid.
                            3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod.
                        </p>
                    </div>

                    @can('update-info', $user->id)
                        <div class="form-group col-md-8">
                            <h3>Change Your Password</h3>
                            <br/>

                            {!! Form::open(['url' => '/user/password', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                            {!! Form::label('old_password', trans('passwords.old_password')) !!}
                            {!! Form::password('old_password', ['class' => 'form-control']) !!}

                            {!! Form::label('password', trans('passwords.new_password')) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}

                            {!! Form::label('password_confirmation', trans('passwords.password_confirm_label')) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                            <br>

                            {!! Form::button('<i class="fa fa-pencil-square"></i> ' . trans("passwords.change_password_button"), ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}

                        </div>
                    @endcan

                </div>

            </div>
        </section>
    </div>
@stop
