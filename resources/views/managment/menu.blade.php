@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        @include('managment.inc.sidebar')
        <div class="col-md-8">
        <i class='fas fa-hamburger'></i> Menu
        <a href="/managment/menu/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create Menu</a>
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
                    <th scole="col">Price</th>
                    <th scole="col">Picture</th>
                    <th scole="col">Description</th>
                    <th scole="col">Category</th>
                    <th scole="col">Edit</th>
                    <th scole="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->id}}</td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->price}}$</td>
                        <td>
                            <img src="{{asset('menu_images')}}/{{$menu->image}}" 
                            alt="{{$menu->name}}" 
                            width="90px" height="90px" class="img-thumbnail">
                        </td>
                        <td>{{$menu->description}}</td>
                        <td>{{$menu->category->name}}</td>
                        <td><a href="/managment/menu/{{$menu->id}}/edit" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="/managment/menu/{{$menu->id}}" method="post">
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