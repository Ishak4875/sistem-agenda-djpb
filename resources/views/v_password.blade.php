<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link href="/{{'template'}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="icon" type="image/x-icon" href="/{{'template'}}/img/logo djpb-1.png">

    <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <link href="{{ asset('css/toastr.min.css')}}" rel="stylesheet" />
</head>
<body>
    @if (session('success'))
        <script>
            $(function () { //ready
            toastr.success("{{session('success')}}");
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            $(function () { //ready
            toastr.error("{{session('error')}}");
            });
        </script>
    @endif
    <div class="registration-form animated slideInDown">
        <form action="/change-password/update" method="POST">
            @csrf
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>

            <div class="form-group">
                <input type="email" class="form-control item @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control item @error('old_password') is-invalid @enderror" id="old_password" name="old_password" placeholder="Old Password">
                @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control item @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="New Password">
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control item @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" placeholder="New Password Confirmation">
                @error('new_password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Submit</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{asset('js/login.js')}}"></script>
</body>
</html>
