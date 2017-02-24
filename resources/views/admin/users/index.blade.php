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

    <h1>Users</h1>

    <table class="table table-striped users">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">
                            <div class="photo_thumbnail_container">
                            <img src=" {{ $user->photo ? $user->photo->path : '/nophoto.jpg'}} " alt="">
                            </div>
                        </a>
                    </td>
                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ ($user->is_active ? 'Active' : 'Not active') }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
