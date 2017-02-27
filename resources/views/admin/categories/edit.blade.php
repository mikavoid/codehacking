@extends('layouts.admin')

@section('content')
    <h1>Edit Category</h1>

    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id], 'files' => false]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>


    <div class="col-sm-10">
        <div class="form-group">
            {!! Form::submit('Edit category', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id], 'files' => false]) !!}
        <div class="form-group pull-right">
            {!! Form::submit('Delete category', ['class' => 'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    {!! Form::close() !!}
@stop