@extends('layouts.default') @section('content')

<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Log in
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">Log in</button>
        </div>
    </div>
</form>
@endsection
