@extends('layouts.app')

@section('title')
    {{ trans('category.user_list_category') }}
@stop

@section('content')
<div class="container">
    <table class="table table-bordered" id="dataTables-example">
        <thead align="center"> <h1>{{ trans('category.list_category') }}</h1></thead>
        <thead>
            <tr align="center">
                <th>{{ trans('category.id_category') }}</th>
                <th>{{ trans('category.name_category') }}</th>
                <th>{{ trans('category.total_word') }}</th>
                <th>{{ trans('lesson.start_lesson') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ link_to_action('LessonsController@getAllWordInCategory', $item['name'], ['id' => $item['id']]) }}</td>
                <!-- Total Word in Category -->
                <td>{{ $item->getCountWords() }}</td>
                <td><a href="{{ route('user.lessons', $item['id']) }}"><button type="button" class="btn btn-primary">{{ trans('lesson.start_lesson') }}</button></a></td>
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
