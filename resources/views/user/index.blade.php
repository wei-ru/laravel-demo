@extends('layouts.default') @section('content')
<div class="card">
    <div class="card-header">
        User List
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nickname</th>
                    <th width='100px'>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @admin
                                <form action="{{route('user.destroy', $user)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endadmin
                            <button type="button" class="btn btn-info">Edit</button>
                            <a href="{{route('user.show', $user)}}" class="btn btn-secondary">Look Up</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <div class="card-footer text-muted">
        {{$users->links()}}
    </div>
</div>
@endsection
