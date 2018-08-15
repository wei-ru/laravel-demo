<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('home')}}">Demo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('user.index')}}">User List</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    @auth
                        <a href="{{route('user.edit', auth()->user())}}" class="btn btn-info my-2 my-sm-0 mr-2">Edit</a>
                        <a href="{{route('logout')}}" class="btn btn-danger my-2 my-sm-0 mr-2">Log out</a>
                    @else
                        <a href="{{route('user.create')}}" class="btn btn-danger my-2 my-sm-0 mr-2">Sign Up</a>
                        <a href="{{route('login')}}" class="btn btn-success my-2 my-sm-0">Login</a>
                    @endauth
                    
                </form>
            </div>
        </nav>
        @include('layouts._errors')
        @include('layouts._message')
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>

</html>
