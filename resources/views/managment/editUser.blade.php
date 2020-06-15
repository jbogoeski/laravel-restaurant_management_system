@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        @include('managment.inc.sidebar')
        <div class="col-md-8">
            <i class='fas fa-user'></i> Edit a User
        <hr>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>            
            </div>
        @endif
        <form action="/managment/user/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="menuName" class="">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Name...">
            </div>
            <div class="form-group">
                <label for="emal" class="">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email...">
            </div>
            <div class="form-group">
                <label for="password" class="">Password</label>
                <input type="password" value="{{$user->password}}" name="password" class="form-control" placeholder="Password...">
            </div>
           
            <div class="form-group">
                <label for="role" class="">Role</label>
                    <select name="role" id="form-control">
                        <option value="admin" {{$user->role === 'admin' ? 'selected' : ''}}>Admin</option>
                        <option value="cashier" {{$user->role === 'cashier' ? 'selected' : ''}}>Cashier</option>
                    </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
    </div>
</div>


@endsection