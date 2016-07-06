@extends('layouts.app')

@section('title')
    {{ trans('category.list_category') }}
@stop

@section('content')
<div class="container">
    <table class="table table-bordered" id="dataTables-example">
    @include('layouts.partials.success')
        <thead>
            <tr align="center">
                <th>{{ trans('category.id_category') }}</th>
                <th>{{ trans('category.name_category') }}</th>
                <th>{{ trans('category.delete_category') }}</th>
                <th>{{ trans('category.edit_category') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td class="center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $item['id']]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                <td class="center">
                    {!! Form::open(['method' => 'GET', 'route' => ['category.edit', $item['id']]]) !!}
                    {!! Form::submit(trans('category.edit'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- end table -->

    <!-- pagination -->
    <div class="pagination pull-right">
        {!! $categories->appends(Request::except('page'))->links() !!}
    </div>
    <!-- end pagination -->
</div>
@stop
