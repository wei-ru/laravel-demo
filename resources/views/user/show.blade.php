@extends('layouts.default') @section('content')
<div class="card">
    <div class="card-header">
        <h1 class="text-center">{{$user->name}}</h1>
    </div>
    <div class="card-body">
        <label>Email</label>
        <h3>{{$user->email}}</h3>
    </div>
</div>
@endsection
