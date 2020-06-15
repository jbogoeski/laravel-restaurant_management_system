@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        @include('managment.inc.sidebar')
        <div class="col-md-8">
        <i class='fas fa-users'></i> User
        <a href="/managment/user/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create User</a>
        <hr>
        @if(Session()->has('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{Session()->get('status')}}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scole="col">ID</th>
                    <th scole="col">Name</th>
                    <th scole="col">Role</th>
                    <th scole="col">Email</th>
                    <th scole="col">Edit</th>
                    <th scole="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>

                        <td><a href="/managment/user/{{$user->id}}/edit" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="/managment/user/{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>


@endsection