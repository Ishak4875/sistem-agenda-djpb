
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/{{'template'}}/img/logo djpb-1.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/{{'template'}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/{{'template'}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/{{'template'}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/{{'template'}}/css/style.css" rel="stylesheet">
    <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <link href="{{ asset('css/toastr.min.css')}}" rel="stylesheet" />
</head>

<body class="{{ str_contains(request()->url(), '/jadwal') ? 'bg-light' : '' }}">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('layout.v_nav')
    <!-- Navbar End -->


    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/{{'template'}}/lib/wow/wow.min.js"></script>
    <script src="/{{'template'}}/lib/easing/easing.min.js"></script>
    <script src="/{{'template'}}/lib/waypoints/waypoints.min.js"></script>
    <script src="/{{'template'}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/{{'template'}}/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="/{{'template'}}/js/main.js"></script>
</body>

</html>