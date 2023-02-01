<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="/{{'template'}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css')}}" rel="stylesheet">
</head>
<body>
    <div class="wrapper animated slideInDown">
        <div class="logo">
            <img src="/{{'template'}}/img/logo djpb-1.png" alt="Logo DJPB" width="70px" height="70px">
        </div>
        <div class="text-center mt-4 name">
            Admin
        </div>
        <form method="POST" class="pt-3 mt-3" action="{{ route('login') }}">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" placeholder="Email">
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" placeholder="Password">
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Change password?</a>
        </div>
    </div>
</body>
</html>