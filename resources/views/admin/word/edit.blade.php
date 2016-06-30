@extends('layouts.app')

@section('title')
    {{ trans('word.edit_word') }}
@stop

@section('content')
    <div class="container">
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-group">
                    @include('layouts.partials.success')
                    @include('layouts.partials.errors')
                    {!! Form::model($word, ['method' => 'PATCH', 'route' => ['word.update', $word->id]]) !!}
                    {{ Form::label('name', trans('category.name_category')) }}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) !!}

                </div>

                <!-- word content  -->
                <div class="form-group">
                    {{ Form::label('content', trans('word.content_word')) }}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
            </div>


            <div class="form-group">
                {{ Form::button('<i class="fa fa-plus-circle"></i> ' . trans('word.edit_word'), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                {{ Form::button('<i class="fa fa-refresh"></i> ' . trans('word.word_reset'), ['type' => 'reset', 'class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

