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

                    @if ($currentUser)
                        @unless ($user->isCurrent())
                            @if ($user->isFollowedBy($currentUser))
                                @include ('user.partials.follow-form', [
                                    'method' => 'DELETE',
                                    'route' => 'follows.destroy',
                                    'buttonText' => '<i class="fa fa-user-times"></i> ' . trans('content.unfollow') . ' ' . $user->name,
                                    'class' => 'btn btn-danger '])
                            @else
                                @include ('user.partials.follow-form', [
                                    'method' => 'POST',
                                    'route' => 'follows.store',
                                    'buttonText' => '<i class="fa fa-user-plus"></i> ' . trans('content.follow') . ' ' . $user->name,
                                    'class' => 'btn btn-primary'])
                            @endif
                        @else
                            <button type="button" class="btn btn-primary follows_button" data-toggle="collapse"
                                    data-target="#followings"><i class="fa fa-user-plus"></i> {{ trans('content.following') }}
                            </button>
                            <div id="followings" class="collapse">
                                @foreach ($user->followings as $u)
                                    <li>{{ link_to_route('user_info', $u->name, $u->id) }}</li>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary follows_button" data-toggle="collapse"
                                    data-target="#followers"><i class="fa fa-users"></i> {{ trans('content.followers') }}
                            </button>
                            <div id="followers" class="collapse">
                                @foreach ($user->followers as $u)
                                    <li>{{ link_to_route('user_info', $u->name, $u->id) }}</li>
                                @endforeach
                            </div>
                        @endif
                    @endif

                    <table class="table table-striped table-info">
                        <tbody>
                        <tr>
                            <td><strong>{{ trans('content.name') }}:</strong></td>
                            <td><i class="fa fa-user"></i> {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>{{ trans('content.email') }}:</strong></td>
                            <td><i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-warning">
                        <h4 class="alert-heading">{{ trans('content.warning') }}</h4>
                        {{ trans('content.warning_content') }}
                    </div>

                    @can('update-info', $user->id)
                        <h3>{{ trans('content.change-info') }}</h3>
                        @include('user.partials.update-info-form')
                    @endcan

                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>{{ trans('content.activities') }}</h2>
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
                            <h3>{{ trans('passwords.change_password_title') }}</h3>
                            <br/>
                            @include('user.partials.update-password-form')
                        </div>
                    @endcan

                </div>

            </div>
        </section>
    </div>
@stop
