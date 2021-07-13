@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">active</th>
                        <th scope="col">role</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->active}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <button type="button" class="btn btn-primary">update</button>
                                <button type="button" class="btn btn-primary">{{$user->active == 0 ? 'reactivate' : 'deactivate'}}</button>
                                <button type="button" class="btn btn-danger">delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
