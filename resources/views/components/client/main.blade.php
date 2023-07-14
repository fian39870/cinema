<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendorClient/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assetsClient/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/templatemo-lugx-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    


</head>

<body>
    @include('layouts.client.header')
    @yield('content')
    @include('layouts.client.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendorClient/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendorClient/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('assetsClient/js/owl.js') }}"></script>
    <script src="{{ asset('assetsClient/js/accordions.js') }}"></script>
    <script src="{{ asset('assetsClient/js/main.js') }}"></script>

</body>

</html>