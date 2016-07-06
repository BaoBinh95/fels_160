@extends('layouts.app')

@section('title')
    {{ trans('auth.users_index_title') }}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{ trans('content.users_index_heading') }}</h2>

                <table class="table table-striped">
                    <thead>
                    <td><strong>{{ trans('content.name') }}</strong></td>
                    <td><strong>{{ trans('content.email') }}</strong></td>
                    @if (Auth::check())
                        <td><strong>{{ trans('content.action') }}</strong></td>
                    @endif
                    <td></td>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ link_to_route('users.show', $user->name, $user->id) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (auth()->check())
                                        @unless ($user->isCurrent())
                                            @include('user.partials.relationships')
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $users->render() !!}

            </div>
        </div>
    </div>
@stop
