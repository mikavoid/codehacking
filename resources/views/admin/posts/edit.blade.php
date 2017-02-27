@extends('layouts.admin')

@section('content')
    <h1>Edit post</h1>
    <div class="row">

        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
        <div class="col-sm-6">

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', ['' => 'Choose category'] + $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        </div>
        <div class="col-sm-6">
            <div class="big_img_container">
                <img class="img img-responsive img-rounded" style="margin-bottom: 10px;"
                     src="{{ $post->photo ? $post->photo->path : '/nophoto.jpg' }}" alt="">
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-10">
            <div class="form-group">
                {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-2">
            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id], 'files' => false]) !!}
            <div class="form-group pull-right">
                {!! Form::submit('Delete post', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop