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
        <img class="img img-responsive img-rounded" style="margin-bottom: 10px;" src="{{ $user->photo ? $user->photo->path : '/nophoto.jpg' }}" alt="">
        <div class="form-group">
            {!! Form::label('photo', 'Image') !!}
            {!! Form::file('photo', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::submit('create', ['class' => 'btn btn-primary']) !!}
        </div>

    </div>


    {!! Form::close() !!}

@endsection
