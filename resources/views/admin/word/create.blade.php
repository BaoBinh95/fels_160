@extends('layouts.app')

@section('title')
    {{ trans('word.create_word_title') }}
@stop

@section('content')
    <div class="container">
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-group">
                    @include('layouts.partials.errors')
                    {!! Form::open(['url' => '/word', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    {{ Form::label('categoryname', trans('category.name_category')) }}
                    <!-- Choose category name -->
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) !!}
                </div>

                <!-- word content  -->
                <div class="form-group">
                    {{ Form::label('content', trans('word.content_word')) }}
                    {!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => trans('word.enter_content_word')]) !!}
                </div>
            </div>

            <div class="form-group">
                {{ Form::button('<i class="fa fa-plus-circle"></i> ' . trans('word.word_add'), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                {{ Form::button('<i class="fa fa-refresh"></i> ' . trans('word.word_reset'), ['type' => 'reset', 'class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

