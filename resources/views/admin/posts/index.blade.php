@extends('layouts.admin')

@section('content')
    @if(Session::has('added'))
        <div class="alert alert-success">{{ session('added') }}</div>
    @endif
    @if(Session::has('deleted'))
        <div class="alert alert-danger">{{ session('deleted') }}</div>
    @endif
    @if(Session::has('updated'))
        <div class="alert alert-info">{{ session('updated') }}</div>
    @endif

    <h1>Posts</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}">
                            <div class="photo_thumbnail_container">
                                <img src=" {{ $post->photo ? $post->photo->path : '/nophoto.jpg'}} " alt="">
                            </div>
                        </a>
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ str_limit($post->body, 7) }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop