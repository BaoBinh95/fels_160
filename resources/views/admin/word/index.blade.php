@extends('layouts.app')

@section('title')
    {{ trans('word.word_list') }}
@stop

@section('content')
<div class="container">
    <table class="table table-bordered" id="dataTables-example">
    @include('layouts.partials.success')
        <thead>
            <tr align="center">
                <th>{{ trans('word.word_id') }}</th>
                <th>{{ trans('category.name_category') }}</th>
                <th>{{ trans('word.content_word') }}</th>
                <th>{{ trans('word.word_delete') }}</th>
                <th>{{ trans('word.word_edit') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($words as $item)
            <tr>
                <td>{{ $item->id}}</td>
                <td>{{ $item->category->name}}</td>
                <td>{{ $item->content }}</td>
                <td class="center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['word.destroy', $item['id']]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                <td class="center">
                    {!! Form::open(['method' => 'GET', 'route' => ['word.edit', $item['id']]]) !!}
                    {!! Form::submit(trans('word.word_edit'), ['class' =>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- end table -->

    <!-- pagination -->
    <div class="pagination pull-right">
        {!! $words->appends(Request::except('page'))->links() !!}
    </div>
    <!-- end pagination -->
</div>
@stop
