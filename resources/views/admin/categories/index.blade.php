@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @if ($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id  }}</td>
                        <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        {!! Form::open(['action' => 'AdminCategoriesController@store', 'files' => false]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create category', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
    </div>
@stop