@extends('layouts.default') @section('content')

<form action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Sign Up
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Nickname</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">Sign up</button>
        </div>
    </div>
</form>
@endsection
