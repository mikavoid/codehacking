@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

    <div class="col-sm-8">
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', ['' => 'Choose role'] + $roles, null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', ['Not Active', 'Active'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        @include('includes.form_error')
    </div>
    <div class="col-sm-4">
        <img class="img img-responsive img-rounded" style="margin-bottom: 10px;"
             src="{{ $user->photo ? $user->photo->path : '/nophoto.jpg' }}" alt="">
        <div class="form-group">
            {!! Form::label('photo', 'Image') !!}
            {!! Form::file('photo', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-10">
        <div class="form-group">
            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id], 'files' => false]) !!}
        <div class="form-group pull-right">
            {!! Form::submit('Delete user', ['class' => 'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>


@endsection
