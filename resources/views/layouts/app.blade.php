<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Test</title>

    {{-- Bootstrap CSS--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{--Fontawesome CDN--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .form-control {
            border-color: rgba(126, 239, 104, 0.6);
            /*box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);*/
            outline: 0 none;
        }

        .form-select {
            border-color: rgba(126, 239, 104, 0.6);
            /*box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);*/
            outline: 0 none;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex" style="list-style: none;">
                @guest
                    <li class="p-2">
                        <form action="{{ route('login') }}" method="GET">
                            @csrf
                            <button style="border:none; cursor: pointer" class="bg-light">Login</button>
                        </form>
                    </li>
                @endguest
                @auth
                    <li class="p-2">
                        <form>
                            <button style="border:none; cursor: pointer"
                                    class="bg-light">{{ \Illuminate\Support\Facades\Auth::user()->name }}</button>
                        </form>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                        <li class="p-2">
                            <form action="{{ route('register') }}" method="GET">
                                <button style="border:none; cursor: pointer" class="bg-light">User Registration</button>
                            </form>
                        </li>
                    @endif
                    <li class="p-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button style="border:none; cursor: pointer" class="bg-light">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@yield('content')

{{--Bootstrap JS--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"--}}
{{--        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"--}}
{{--        crossorigin="anonymous"></script>--}}
</body>
</html>
