@extends('layouts.default')
@section('content')
<form action="{{route('user.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nickname</label>
                    <input type="text" class="form-control" name="name" value="{{$user['name']}}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
@endsection